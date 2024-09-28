<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');


ini_set('display_errors', 1);
error_reporting(E_ALL);

$errors = [];
$email = '';
$password = '';

// Функция для проверки email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Функция для проверки пароля
function validatePassword($password) {
    return preg_match('/^[a-zA-Z0-9!@#$%^&*()_+{}:;<>,.?\\-]{8,}$/', $password);
}

try {
    // Проверка предварительного запроса (OPTIONS)
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postData = json_decode(file_get_contents('php://input'), true);
        $email = trim($postData['login-email']);
        $password = trim($postData['login-password']);

        // Проверка email
        if (empty($email) || !validateEmail($email)) {
            $errors['login-email'] = 'Введите корректный e-mail.';
        }

        // Проверка пароля
        if (empty($password) || !validatePassword($password)) {
            $errors['login-password'] = 'Пароль должен содержать не менее 8 символов. Допускается ввод символов латинского алфавита, цифр и спецсимволов';
        }

        // Если есть ошибки
        if (!empty($errors)) {
            echo json_encode(['errors' => $errors]);
            exit();
        }

        // Пример успешного ответа
        echo json_encode(['success' => 'Успешный вход!']);
        exit();
    }

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}
