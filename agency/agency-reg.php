<?php
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
    require $_SERVER['DOCUMENT_ROOT']."/agency/agencyModel.php";
?>
<html lang="ru">

<head>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>
    <title>Регистрация агентства</title>
</head>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>
    <?php
        if(isset($_POST["submit"]))
        {
            $agency = new AgencyModel();
            $agency->name = $_POST["inputName"];
            $agency->inn = $_POST["inputInn"];
            $agency->email = $_POST["inputEmail"];
            $agency->phone = $_POST["inputPhone"];
            $agency->manager = $_POST["inputManager"];

            $db = new DbConnectClass;
            $db->connectDb();
            $db->select($agency->insertSqlCreate());

            echo $agency->displayInfo();           
        }
        else 
        {
    ?>
    <div class="container-md">
        <form class="row g-3" method="POST">
            <div class="col-6">
                <label for="inputName" class="form-label">Наименование</label>
                <input type="text" class="form-control" id="inputName" name="inputName"
                    placeholder="Название организации" required>
            </div>
            <div class="col-6">
                <label for="inputInn" class="form-label">ИНН</label>
                <input type="text" class="form-control" id="inputInn" name="inputInn" placeholder="ИНН" required minlength="10" maxlength="12" pattern="\d{10,12}">
            </div>
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="xxxx@xxxxx.ru"
                    required>
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Телефон</label>
                <input type="tel" class="form-control" id="inputPhone" name="inputPhone" placeholder="+7xxxxxxxxxx" required pattern="\+7\d{10}" minlength="12" maxlength="12" oninvalid="this.setCustomValidity('Укажите формат +7xxxxxxxxxx')" oninput="setCustomValidity('')">
            </div>
            <div class="col-12">
                <label for="inputManager" class="form-label">Фио Менеджера</label>
                <input type="text" class="form-control" id="inputManager" name="inputManager"
                    placeholder="Иванов Иван Иванович (пример)" required>
            </div>
            <div class="col-12">
                <input type="hidden" name="is_submit" value="true">
                <button type="submit" class="btn btn-primary" name="submit">Зарегистрировать</button>
            </div>
        </form>
    </div>
    <?php } ?>
</body>

</html>

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>