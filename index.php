<?php
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
    require $_SERVER['DOCUMENT_ROOT']."/route/Models/routeTransportListModel.php";
?>
<html lang="ru">
<?php $title ="ТурАгентство"; include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">routeTransportListModel</a></li>
            <li><a href="#tabs-2">Proin dolor</a></li>
            <li><a href="#tabs-3">Aenean lacinia</a></li>
        </ul>
        <div id="tabs-1">
            <?php
              $db = new DbConnectClass();
              $route = new RouteTransportListModel();
              $list = $route->getActiveList($db);
              print_r ($list);

            ?>
        </div>
        <div id="tabs-2">
            <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id
                nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie
                lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula
                suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur
                ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque
                convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare
                leo nisi vel felis. Mauris consectetur tortor et purus.</p>
        </div>
        <div id="tabs-3">
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

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>

<script>
$(function() {
    $("#tabs").tabs();
});
</script>