<?php
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
?>
<html lang="ru">

<head>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/head-contents.php");?>
    <title>Агентство!!!</title>
</head>

<body>
    <?php include( $_SERVER['DOCUMENT_ROOT']."/includes/menu.php");?>

    <?php
  #  phpinfo();
  print_r(apache_get_modules());

    //connnect_db();

    $db = new DbConnectClass;
    $db->connectDb();
    $db->test();
    $sqlAgency = "select * from travel.agency";
    $resultIems = $db->select($sqlAgency);
    // if($stmt->rowCount() > 0){
    // foreach($result as $row){
            // echo "<tr>";
                // echo "<td>" . $row["name"] . "</td>";
            // echo "</tr>";
        // }
    // }
    ?>
</body>

</html>
<!-- https://metanit.com/php/mysql/2.7.php -->

<!-- https://metanit.com/php/tutorial/6.1.php -->

<?php include( $_SERVER['DOCUMENT_ROOT']."/includes/footer-content.php");?>