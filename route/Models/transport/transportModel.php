<?php
class TransportModel
{ 
    public $name;
     
    public function displayInfo()
    {
        echo('<div class="container-md">');
        echo('<h3>ТС успешно зарегистрировано!</h3>');
        echo "Наименование: " . $this->name. ";<br>";
        echo('<a href="/route/Models/transport/transportReg.php" class="btn btn-success">ЕЩЕ</a>');
        echo('<a href="/" class="btn btn-success">На главную</a>');
        echo('</div>');
    }

    public function Create($db) 
    {
        $db->connectDb();
        $sql = "INSERT INTO travel.transport_type (name) VALUES('$this->name');";
        $db->select($sql);
    }

    public function GetActiveList($db) 
    {
        $db->connectDb();
        $sql = "SELECT id, name, disabled, data_create FROM travel.transport_type where disabled=false order by data_create;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "TransportModel");
        return $data;
    }

    public function GetAllList($db) 
    {
        $db->connectDb();
        $sql = "SELECT id, name, disabled, data_create FROM travel.transport_type where 1=1 order by data_create;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "TransportModel");
        return $data;
    }
}
?>