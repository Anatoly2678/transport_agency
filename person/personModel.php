<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
class PersonModel
{
    public $firstName, $lastName, $dob, $applicationId;

    public function GetPersonsByApplicationId($applicationId):array   
    {
        $db = new DbConnectClass();
        $db->connectDb();
        $sql = "SELECT first_name firstName, last_name lastName, dob FROM travel.person where application_id=$applicationId;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "PersonModel");
        return $data;
    }

    public function Insert($applicationId): bool|PDOStatement   
    {
        $db = new DbConnectClass();
        $db->connectDb();
        $sql = "INSERT INTO travel.person(first_name, last_name, dob, application_id) VALUES('$this->firstName', '$this->lastName', '$this->dob', $applicationId);";
        $result = $db->select($sql);
        // echo ($result);

        return $result;
    }


    // public function Login($db, $inn, $password): ?string
    // {
    //     $db->connectDb();
    //     $sql = "SELECT inn, name, email,is_confirm, disabled, password, uniq_id FROM travel.agency WHERE inn='$inn' and password='$password' and is_confirm and disabled = false;";
    //     $result = $db->select($sql);
    //     $data = $result->fetchAll(PDO::FETCH_CLASS, "LoginModel");
    //     if ($data == null) {
    //         // setcookie ("auth_token", "", time() - 3600,"/");
    //         return null;
    //     }
    //     $token = generateToken($data[0]->uniq_id);
    //     // setcookie("auth_token", $token, time() + 3600,"/"); 
    //     return $token;
    // }

    // public static function GetToken(): ?string {
    //     if (!isset($_COOKIE["auth_token"])) {
    //         return null;
    //     }
    //     $receivedToken = $_COOKIE["auth_token"];
    //     return validateToken($receivedToken);
    // }

    // public function CheckToken(): bool
    // {
    //     if (!isset($_COOKIE["auth_token"])) {
    //         return false;
    //     }
    //     $receivedToken = $_COOKIE["auth_token"];
    //     $authenticatedUserId = validateToken($receivedToken);
    //     if ($authenticatedUserId !== null) {
    //         // Пользователь успешно аутентифицирован, продолжаем выполнение запроса
    //         // echo "Доступ к защищенному ресурсу для пользователя с ID: $authenticatedUserId  <br>";
    //         return true;
    //     } else {
    //         // Пользователь не аутентифицирован, возвращаем ошибку или перенаправляем на страницу входа
    //         echo "Ошибка: Пользователь не аутентифицирован!  <br>";
    //         return false;
    //     }
    // }
}