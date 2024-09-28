<?php
    $title = "Узнать размер файла";
    require_once("header.php");
    
    // Функции для расчета размера
    function getDirectorySize($dir) {
        $size = 0;

        // Открываем каталог и проходим по каждому элементу
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $file) {
            $size += $file->getSize();
        }

        return $size;
    }

    function getFileSize($file) {
        return filesize($file);
    }

    // Получаем параметр из GET-запроса
    $relativePath = isset($_GET['path']) ? $_GET['path'] : '';

    // Определяем корневую папку сайта (на один уровень выше папки pages)
    $rootDir = realpath(__DIR__ . '/../'); // Переход на уровень выше

    // Определяем полный путь
    $fullPath = realpath($rootDir . '/' . $relativePath);

    // Проверяем, что путь находится внутри корневой папки
    if ($fullPath && strpos($fullPath, $rootDir) === 0) {
        if (is_dir($fullPath)) {
            $size = getDirectorySize($fullPath);
            $type = "папки";
        } elseif (is_file($fullPath)) {
            $size = getFileSize($fullPath);
            $type = "файла";
        } else {
            $size = null;
            $type = "указанного пути";
        }
    } else {
        $size = null;
        $type = "недопустимого пути";
    }
?>

<div class="container">
    <p class="title">О нас</p>
</div>

<div class="container">
    <div>
        <form method="GET">
            <label for="path">Введите относительный путь к файлу или папке:</label>
            <input type="text" id="path" name="path" placeholder="например, img/logo.png" required>
            <button type="submit">Посчитать</button>
        </form>

        <?php if ($relativePath): ?>
            <h2>Результат:</h2>
            <?php if ($size !== null): ?>
                <p>Размер <?= htmlspecialchars($type) ?>: <?= number_format($size / 1024, 2) ?> KB</p>
            <?php else: ?>
                <p>Ошибка: <?= htmlspecialchars($type) ?></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php
    require_once("footer.php");
?>
