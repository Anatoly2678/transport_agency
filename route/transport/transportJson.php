<?php
header('Content-type: application/json; charset=UTF-8');
require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
require $_SERVER['DOCUMENT_ROOT']."/route/transport/transportModel.php";

    $db = new DbConnectClass();
    $transport = new TransportModel();
    $list = $transport->GetAllList($db);
    
    echo json_encode($list);