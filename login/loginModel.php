<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . "/includes/authorise-jwt.php";

enum Roles: string
{
    case Agency = "Агентство";
    case Manager = "Менеджер";
    case Admin = "Администратор";
    case User = "Пользователь";
    case Nobody = "НИКТО";
}

class LoginModel
{
    public $inn, $password, $uniq_id;

    public function Login($db, $inn, $password): ?string
    {
        $db->connectDb();
        $sql = "SELECT inn, name, email,is_confirm, disabled, password, uniq_id, role FROM agency WHERE inn='$inn' and password='$password' and is_confirm and disabled = false;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "LoginModel");
        if ($data == null) {
            return null;
        }
        $token = generateToken($data[0]->uniq_id, $data[0]->role);
        return $token;
    }

    public static function GetToken(): ?string
    {
        if (!isset($_COOKIE["auth_token"])) {
            return null;
        }
        $receivedToken = $_COOKIE["auth_token"];
        return validateToken($receivedToken);
    }

    public function CheckToken($token = null): bool
    {
        if (!isset($_COOKIE["auth_token"]) && !isset($token)) {
            return false;
        }
        
        if (isset($token) && !isset($receivedToken))
            $receivedToken = $token;
        else
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

    public function GetRole($token = null): Roles
    {
        if (!isset($_COOKIE["auth_token"]) && !isset($token)) {
            return Roles::Nobody;
        }

        if (isset($token) && !isset($receivedToken))
            $receivedToken = $token;
        else
            $receivedToken = $_COOKIE["auth_token"];

        $roleId = getRole($receivedToken);

        if ($roleId == 0)
            return Roles::Agency;
        else if ($roleId == 1)
            return Roles::Manager;
        else if ($roleId == 10)
            return Roles::Admin;
        else
            return Roles::Nobody;
    }
}