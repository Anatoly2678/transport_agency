<?php
require $_SERVER['DOCUMENT_ROOT'] . "/connect/db_connect.php";
// require $_SERVER['DOCUMENT_ROOT'] . "/route/route/routeModel.php";
// $db = new DbConnectClass();
// $route = new RouteModel();
?>
<html lang="ru">

<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>
    <title>Личный кабинет</title>
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/menu.php"); ?>
    <h2>ЛИЧНЫЙ КАБИНЕТ ТУТ БУДЕТ</h2>
    <?php
    if (isset($_POST["submit"])) {
        $route->city_from = $_POST['city_from'];
        $route->city_to = $_POST['city_to'];
        $route->description_from = $_POST['description_from'];
        $route->description_to = $_POST['description_to'];
        $route->Create($db);
        echo $transport->displayInfo();
    } else {
        ?>
     <!--    <div class="container-md">
            <form class="row g-3" method="POST">
                <div class="col-6">
                    <label for="inputName" class="form-label">Город (откуда)</label>
                    <input type="text" class="form-control" id="city_from" name="city_from" placeholder="Город (откуда)"
                        required>
                </div>
                <div class="col-6">
                    <label for="inputName" class="form-label">Дополнение</label>
                    <input type="text" class="form-control" id="description_from" name="description_from" required>
                </div>
                <div class="col-6">
                    <label for="inputName" class="form-label">Город (куда)</label>
                    <input type="text" class="form-control" id="city_to" name="city_to" placeholder="Город (куда)" required>
                </div>
                <div class="col-6">
                    <label for="inputName" class="form-label">Дополнение</label>
                    <input type="text" class="form-control" id="description_to" name="description_to"
                        placeholder="Название ТС" required>
                </div>
                <div class="col-6">
                    <input type="hidden" name="is_submit" value="true">
                    <button type="submit" class="btn btn-primary" name="submit">Добавить</button>
                </div>
            </form>
        </div>-->
    <?php } ?> 

    <!-- https://examples.bootstrap-table.com/#methods/filter-by.html#view-source -->
    <!-- <table id="table" data-toggle="table" data-url="routeJson.php" data-pagination="true" data-height="660"
        data-page-size="25">
        <thead>
            <tr>
                <th data-field="from">Откуда</th>
                <th data-field="to">Куда</th>
                <th data-field="disabled" data-formatter="boolFormatter">Отключен</th>
            </tr>
        </thead>
    </table> -->
</body>

</html>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>


<script>
    const $table = $('#table')

    window.boolFormatter = (value) => {
        return (value != 0 ? "Да" : "Нет");
    }

</script>