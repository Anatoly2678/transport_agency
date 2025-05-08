<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . "/includes/authorise-jwt.php";
class LoginModel
{
    public $inn, $password, $uniq_id;

    public function Login($db, $inn, $password): ?string
    {
        $db->connectDb();
        $sql = "SELECT inn, name, email,is_confirm, disabled, password, uniq_id FROM agency WHERE inn='$inn' and password='$password' and is_confirm and disabled = false;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "LoginModel");
        if ($data == null) {
            // setcookie ("auth_token", "", time() - 3600,"/");
            return null;
        }
        $token = generateToken($data[0]->uniq_id);
        // setcookie("auth_token", $token, time() + 3600,"/"); 
        return $token;
    }

    public static function GetToken(): ?string {
        if (!isset($_COOKIE["auth_token"])) {
            return null;
        }
        $receivedToken = $_COOKIE["auth_token"];
        return validateToken($receivedToken);
    }

    public function CheckToken(): bool
    {
        if (!isset($_COOKIE["auth_token"])) {
            return false;
        }
        $receivedToken = $_COOKIE["auth_token"];
        $authenticatedUserId = validateToken($receivedToken);
        if ($authenticatedUserId !== null) {
            // Пользователь успешно аутентифицирован, продолжаем выполнение запроса
            // echo "Доступ к защищенному ресурсу для пользователя с ID: $authenticatedUserId  <br>";
            return true;
        } else {
            // Пользователь не аутентифицирован, возвращаем ошибку или перенаправляем на страницу входа
            echo "Ошибка: Пользователь не аутентифицирован!  <br>";
            return false;
        }
    }
}