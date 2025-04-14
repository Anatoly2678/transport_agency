<?php
//use App\JWT;
// error_reporting(0);
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
    require $_SERVER['DOCUMENT_ROOT']."/route/Models/routeTransportListModel.php";
    require $_SERVER['DOCUMENT_ROOT']."/route/transport/transportModel.php";
    // require $_SERVER['DOCUMENT_ROOT']."/login/loginModel.php";
    $db = new DbConnectClass();

    // $login = new LoginModel();
    // $loginResult = $login->login($db, '053320079694', '1');

    // if($loginResult == false) {
    //     echo "Ошибка: Пользователь не найден в бд!! <br>";
    //     exit();
    // }

    // echo "Пользователь найден в бд! <br>";

    // $login->CheckToken();

?>
<html lang="ru">
<?php $title ="ТурАгентство"; include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Транспорт</a></li>
            <li><a href="#tabs-2">Направления</a></li>
            <li><a href="#tabs-3">Маршрут</a></li>
        </ul>
        <div id="tabs-3">
            <?php              
              $route = new RouteTransportListModel();
              $list = $route->getActiveList($db);
            //   var_dump($list);
              echo ("<ul>");
                foreach ($list as $k => $v) {
                    echo ("<li>".$v->route_full);
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
                    echo ("<li>".$v->name."</li>");
                }
                echo ("</ul>");
            ?>
        </div>
        <div id="tabs-2">
            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula
                accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent
                taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu
                urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem
                enim, pretium nec, feugiat nec, luctus a, lacus.</p>
            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla
                facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti.
                Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio.
                Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat
                porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas
                commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
        </div>
    </div>
</body>

</html>
<!-- https://metanit.com/php/mysql/2.7.php -->
<!-- https://metanit.com/php/tutorial/6.1.php -->
<!-- https://examples.bootstrap-table.com/#extensions/key-events.html -->

<!-- https://forum.diamondrp.ru/threads/jwt-avtorizacija-v-veb-prilozhenii-na-php.1526859/ -->

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>

<script>
$(function() {
    $("#tabs").tabs();
});
</script>