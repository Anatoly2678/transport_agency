<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$db = new DbConnectClass();
// $userId = LoginModel::GetToken();
// if (empty($userId)) {
//     exit(header("Location: /login/login.php"));
// }
?>
<!DOCTYPE html>
<html lang="ru">
<?php $title = "Маршрут";
include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); ?>
    <div class="container-md">
        <div class="row">
            <div class="col-12">
                <?php
                $route = new RouteTransportListModel();
                $list = $route->getActiveList($db);
                echo ("<ul>");
                foreach ($list as $k => $v) {
                    echo ("<li>" . $v->showName);
                }
                echo ("</ul>");
                ?>
            </div>
            </в>
        </div>
</body>

</html>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>