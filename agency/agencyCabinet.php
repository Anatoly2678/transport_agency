<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="ru">
<?php $title = "Личный кабинет";
include($_SERVER['DOCUMENT_ROOT'] . "/includes/head-contents.php"); ?>

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

    <?php } ?> 

</body>

</html>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/footer-content.php"); ?>