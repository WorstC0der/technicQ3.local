<?php
$title = "Отзывы";
require_once("header.php");
?>

<div class="container">
    <p class="title">Отзывы</p>
</div>

<div class="container">
    <div>
        <form id="dataForm" method="POST" action="diagram.php" enctype="multipart/form-data">
            <label for="dataFile">Загрузите файл с данными:</label>
            <input type="file" id="dataFile" name="dataFile" accept=".csv,.txt" required>
            <br><br>
            <label for="chartType">Выберите тип диаграммы:</label>
            <select id="chartType" name="chartType">
                <option value="bar">Гистограмма</option>
                <option value="line">График</option>
            </select>
            <br><br>
            <button type="submit" name="submit">Построить диаграмму</button>
        </form>
    </div>
</div>

<div class="container">
    <div id="chartOutput">
        <?php
        // Проверяем, был ли передан параметр "chart" для отображения диаграммы
        if (isset($_GET['chart']) && isset($_GET['labels']) && isset($_GET['values']) && isset($_GET['xAxisLabel']) && isset($_GET['yAxisLabel'])) {
            $chartType = $_GET['chart'];
            $labels = unserialize(urldecode($_GET['labels']));
            $values = unserialize(urldecode($_GET['values']));
            $xAxisLabel = urldecode($_GET['xAxisLabel']);
            $yAxisLabel = urldecode($_GET['yAxisLabel']);
            echo generateSVG($chartType, $labels, $values, $xAxisLabel, $yAxisLabel);
        }
        ?>
    </div>
</div>

<?php require_once("footer.php"); ?>

<?php
function generateSVG($chartType, $labels, $values, $xAxisLabel, $yAxisLabel) {
    $width = 800; // Ширина SVG
    $height = 500; // Высота SVG
    $barWidth = ($width - 100) / count($values); // Размер столбцов с учётом отступов
    $maxValue = max($values);
    $topPadding = 30; // Отступ сверху
    $leftPadding = 60; // Отступ слева для оси количества
    $bottomPadding = 40; // Отступ снизу для оси оценки
    $yStep = $maxValue / 5; // Шаг для отметок на оси Y (5 отметок)

    // Высота доступного пространства для диаграммы после учёта отступов
    $availableHeight = $height - $topPadding - $bottomPadding;

    // Создание SVG
    $svg = '<svg width="' . $width . '" height="' . $height . '" xmlns="http://www.w3.org/2000/svg">';
    $svg .= '<rect width="100%" height="100%" fill="white" />';

    // Линия оси Y (Количество)
    $svg .= '<line x1="' . $leftPadding . '" y1="' . $topPadding . '" x2="' . $leftPadding . '" y2="' . ($height - $bottomPadding) . '" stroke="black" stroke-width="2" />';
    
    // Линия оси X (Оценка)
    $svg .= '<line x1="' . $leftPadding . '" y1="' . ($height - $bottomPadding) . '" x2="' . ($width - 20) . '" y2="' . ($height - $bottomPadding) . '" stroke="black" stroke-width="2" />';

    // Добавление отметок на ось Y
    for ($i = 0; $i <= 5; $i++) {
        $yValue = $yStep * $i;
        $yPosition = $height - $bottomPadding - ($yValue / $maxValue) * $availableHeight;

        // Отмечаем отметки на оси Y
        $svg .= '<line x1="' . ($leftPadding - 5) . '" y1="' . $yPosition . '" x2="' . $leftPadding . '" y2="' . $yPosition . '" stroke="black" stroke-width="1" />';
        
        // Добавляем текстовые метки для оси Y
        $svg .= '<text x="' . ($leftPadding - 10) . '" y="' . ($yPosition + 5) . '" fill="black" text-anchor="end" font-size="12">' . round($yValue, 2) . '</text>';
    }

    // Отображение гистограммы
    if ($chartType === 'bar') {
        foreach ($values as $index => $value) {
            // Применение отступа сверху и уменьшение высоты столбцов
            $barHeight = ($value / $maxValue) * $availableHeight;
            $x = $leftPadding + $index * $barWidth;
            $y = $height - $barHeight - $bottomPadding;  // Столбцы рисуются снизу с учётом отступа сверху

            // Рисуем столбец
            $svg .= '<rect x="' . $x . '" y="' . $y . '" width="' . ($barWidth - 10) . '" height="' . $barHeight . '" fill="rgba(75, 192, 192, 0.7)" />';
            
            // Подпись над столбцом с отступом на 5 пикселей выше верхушки столбца
            $svg .= '<text x="' . ($x + ($barWidth - 10) / 2) . '" y="' . ($y - 5) . '" fill="black" text-anchor="middle">' . htmlspecialchars($value) . '</text>';
            
            // Подпись под столбцом (оценка)
            $svg .= '<text x="' . ($x + ($barWidth - 10) / 2) . '" y="' . ($height - $bottomPadding + 20) . '" fill="black" text-anchor="middle">' . htmlspecialchars($labels[$index]) . '</text>';
        }
    } elseif ($chartType === 'line') {
        $svg .= '<polyline fill="none" stroke="rgba(75, 192, 192, 1)" stroke-width="2" points="';
        foreach ($values as $index => $value) {
            $x = $leftPadding + $index * ($width - $leftPadding - 20) / (count($values) - 1);
            $y = $height - (($value / $maxValue) * $availableHeight) - $bottomPadding;
            $svg .= $x . ',' . $y . ' ';
        }
        $svg .= '" />';

        // Добавляем подписи под точками
        foreach ($values as $index => $value) {
            $x = $leftPadding + $index * ($width - $leftPadding - 20) / (count($values) - 1);
            $svg .= '<text x="' . $x . '" y="' . ($height - $bottomPadding + 20) . '" fill="black" text-anchor="middle">' . htmlspecialchars($labels[$index]) . '</text>';
        }
    }

    // Добавляем подписи для осей
    // Подпись оси X (Оценка)
    $svg .= '<text x="' . ($width / 2) . '" y="' . ($height - 5) . '" fill="black" text-anchor="middle" font-size="14">' . htmlspecialchars($xAxisLabel) . '</text>';

    // Подпись оси Y (Количество) - вращаем текст на 90 градусов
    $svg .= '<text x="' . 20 . '" y="' . ($height / 2) . '" fill="black" text-anchor="middle" font-size="14" transform="rotate(-90, 20, ' . ($height / 2) . ')">' . htmlspecialchars($yAxisLabel) . '</text>';

    $svg .= '</svg>';
    
    return $svg;
}
?>

