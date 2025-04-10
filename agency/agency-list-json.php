<?php
    header('Content-type: application/json; charset=UTF-8');
    require $_SERVER['DOCUMENT_ROOT']."/connect/db_connect.php";
    
    Class AgencyEntity {
        public string $name;
        public string $inn;
        public string $email;
        public string $phone;
        public string $manager;
        public string $uniq_id;

        public bool $is_confirm;
        public bool $disabled;

        public string $data_create;
        public string $data_create_str;

        public function __construct()
        {
            $this->data_create_str = ($this->data_create);
            $this->data_create = strtotime($this->data_create);
        } 
    }
    
    $sql="SELECT name, inn, email, phone, manager, uniq_id, data_create, is_confirm, disabled FROM travel.agency order by data_create";

    $db = new DbConnectClass;
    $db->connectDb();
    $result = $db->select($sql);
    $data = $result->fetchAll(PDO::FETCH_CLASS, "AgencyEntity");

    echo json_encode($data); #JSON_UNESCAPED_UNICODE JSON_PRETTY_PRINT
?>