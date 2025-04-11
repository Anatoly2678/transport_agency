<?php
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
    require $_SERVER['DOCUMENT_ROOT']."/route/transport/transportModel.php";
    $db = new DbConnectClass();
    $transport = new TransportModel();
?>
<html lang="ru">

<head>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>
    <title>Регистрация ТС</title>
</head>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>
    <?php
        if(isset($_POST["submit"]))
        {
           $transport->name = $_POST["inputName"];           
           $transport->Create($db);
           echo $transport->displayInfo();     
        }
        else 
        {
    ?>
    <div class="container-md">
        <form class="row g-3" method="POST">
            <div class="col-12">
                <label for="inputName" class="form-label">Наименование ТС</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Название ТС"
                    required>
            </div>
            <div class="col-12">
                <input type="hidden" name="is_submit" value="true">
                <button type="submit" class="btn btn-primary" name="submit">Добавить</button>
            </div>
        </form>
    </div>
    <?php } ?>

    <!-- https://examples.bootstrap-table.com/#methods/filter-by.html#view-source -->
    <table id="table" data-toggle="table" data-url="transportJson.php" data-pagination="true" data-height="660" data-page-size="25">
        <thead>
            <tr>
                <th data-field="name">Наименование</th>
                <th data-field="disabled" data-formatter="boolFormatter">Отключен</th>
            </tr>
        </thead>
    </table>
</body>

</html>

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>


<script>
const $table = $('#table')

window.boolFormatter = (value) => {
    return (value != 0 ? "Да" : "Нет");
}

</script>