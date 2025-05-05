<?php
$msg = null;
$is_success = false;
$db = new DbConnectClass();
if (class_exists('LoginModel') == false || isset($login) == false) {
    $login = new LoginModel();
}
$checkToken = $login->CheckToken();
if (isset($_POST["submit"])) {
    $loginToken = $login->login($db, $_POST["inn"], $_POST["password"]);
    if (isset($loginToken)) {
        setcookie($auth_token, $loginToken, time() + $expires_token, "/");
        $checkToken = $login->CheckToken();
        $msg = (String) "Поздравляем! <br />" . $_POST["inn"] . " - Вы успешно вошли в систему";
        $_SESSION[$success_msg] = $msg;
        $is_success = true;
        exit(header("Location: /index.php"));
    } else {
        $msg = "Логин или пароль указаны неверно";
    }
}