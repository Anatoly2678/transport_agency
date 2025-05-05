<!DOCTYPE html>
<?php
//use App\JWT;
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
$db = new DbConnectClass();

if (class_exists('LoginModel') == false || isset($login) == false) {
    $login = new LoginModel();
}

$checkToken = $login->CheckToken();
if ($checkToken == false) {
    exit(header("Location: /login/login.php"));
}
?>


<?php $title = "ТурАгентство";
include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); ?>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Транспорт</a></li>
            <!-- <li><a href="#tabs-2">Направления</a></li> -->
            <li><a href="#tabs-3">Маршрут</a></li>
        </ul>
        <div id="tabs-3">
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
        <div id="tabs-1">
            <?php
            $route = new TransportModel();
            $list = $route->GetActiveList($db);
            echo ("<ul>");
            foreach ($list as $k => $v) {
                echo ("<li>" . $v->name . "</li>");
            }
            echo ("</ul>");
            ?>
        </div>
        <!-- <div id="tabs-2">
            <?php
            // $person = new PersonModel();
            // $list = $person->GetPersonsByApplicationId(1);
            // echo ("<ul>");            
            // foreach ($list as $k => $v) {
            //     $date=date_create($v->dob);
            //     $txt = sprintf("<li> %s %s Дата рожд. %s </li>", $v->firstName, $v->lastName,  date_format($date,"d.m.Y"));
            //     echo ($txt);
            // }
            // echo ("</ul>");
            ?>
        </div> -->
    </div>
</body>

</html>
<!-- https://metanit.com/php/mysql/2.7.php -->
<!-- https://metanit.com/php/tutorial/6.1.php -->
<!-- https://examples.bootstrap-table.com/#extensions/key-events.html -->

<!-- https://forum.diamondrp.ru/threads/jwt-avtorizacija-v-veb-prilozhenii-na-php.1526859/ -->

<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>

<script>
    $(function () {
        $("#tabs").tabs();
    });
</script>