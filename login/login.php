<?php
require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
require $_SERVER['DOCUMENT_ROOT']."/login/loginModel.php";
$db = new DbConnectClass();

$login = new LoginModel();
$loginResult = $login->login($db, '053320079694', '1');

if($loginResult == false) {
    echo "Ошибка: Пользователь не найден в бд!! <br>";
    exit();
}

echo "Пользователь найден в бд! <br>";
