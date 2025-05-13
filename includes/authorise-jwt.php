<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Секретный ключ для подписи токена
global $secretKey;
$secretKey = 'ma_secret_key';

// Функция для генерации токена
function generateToken($userId, $role): string {
    global $secretKey;
    $tokenId    = base64_encode(random_bytes(32));
    $issuedAt   = time();
    $notBefore  = $issuedAt;
    $expire     = $issuedAt + 3600; // токен действителен 1 час
    $serverName = 'your_server_name'; // измените на имя вашего сервера

    $token = [
        'iat'  => $issuedAt,         // время создания токена
        'jti'  => $tokenId,          // уникальный идентификатор токена
        'iss'  => $serverName,       // издатель токена
        'nbf'  => $notBefore,        // не раньше этого времени
        'exp'  => $expire,           // время истечения токена
        'data' => [
            'userId' => $userId,     // дополнительные данные о пользователе
            'role' => $role
        ]
    ];

    return JWT::encode($token, $secretKey, 'HS256');
}

// Функция для проверки токена
function validateToken($token) {
    global $secretKey;

    try {
        $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
        return $decoded->data->userId; // возвращаем идентификатор пользователя
    } catch (Throwable $e) {
        // var_dump($e->getMessage());
        return null; // токен недействителен
    }
}

function getRole($token) {
    global $secretKey;

    try {
        $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
        return $decoded->data->role; // возвращаем роль
    } catch (Throwable $e) {
        return null; // токен недействителен
    }
}