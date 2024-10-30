<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);

$errors = [];

// Функция для проверки email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Функция для проверки пароля
function validatePassword($password) {
    return preg_match('/^[a-zA-Z0-9!@#$%^&*()_+{}:;<>,.?\\-]{8,}$/', $password);
}

// Проверка уникальности email в базе данных
function isEmailUnique($email, $pdo) {
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
    $stmt->execute([$email]);
    return $stmt->fetchColumn() == 0;
}

try {
    // Проверка предварительного запроса (OPTIONS)
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);

        // Получаем данные и обрабатываем их
        $email = trim($postData['registration-email'] ?? '');
        $password = trim($postData['registration-password'] ?? '');
        $confirmPassword = trim($postData['confirm-password'] ?? '');

        // Проверка email
        if (empty($email) || !validateEmail($email)) {
            $errors['registration-email'] = 'Введите корректный e-mail.';
        } else {
            // Проверка уникальности email в базе данных
            // if (!isEmailUnique($email, $pdo)) {
            //     $errors['registration-email'] = 'Этот e-mail уже используется.';
            // }
        }

        // Проверка пароля
        if (empty($password) || !validatePassword($password)) {
            $errors['registration-password'] = 'Пароль должен содержать не менее 8 символов. Допускается ввод символов латинского алфавита, цифр и спецсимволов';
        }

        // Проверка совпадения паролей
        if ($password !== $confirmPassword) {
            $errors['confirm-password'] = 'Пароли не совпадают.';
        }

        // Если есть ошибки
        if (!empty($errors)) {
            echo json_encode(['errors' => $errors]);
            exit();
        }

        // Хэширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Вставка нового пользователя в базу данных
        // $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
        // $stmt->execute([$email, $hashedPassword]);

        echo json_encode(['success' => 'Регистрация прошла успешно!']);
        exit();
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}
