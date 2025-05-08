<?php
class RouteModel
{
    public $city_from, $city_to, $description_from, $description_to, $disabled, $from, $to;
    public string $showName;

    public function __construct()
    {
        $this->from = $this->city_from;            
        if(!empty($this->description_from)) {
            $this->from = $this->from . " (".$this->description_from.")";
        }

        $this->to = $this->city_to;
        if(!empty($this->description_to)) {
            $this->to = $this->to . " (".$this->description_to.")";
        }
        $this->showName = ($this->from." - ".$this->to);
    }

    public function displayInfo()
    {
        echo('<div class="container-md">');
        echo('<h3>Маршрут успешно зарегистрировано!</h3>');
        echo "Откуда: " . $this->city_from."(".$this->description_from.")".";<br>";
        echo "Куда: " . $this->city_to."(".$this->description_to.")".";<br>";
        echo('<a href="/route/route/routeReg.php" class="btn btn-success">ЕЩЕ</a>');
        echo('<a href="/" class="btn btn-success">На главную</a>');
        echo('</div>');
    }

    public function Create($db) 
    {
        $db->connectDb();
        $sql = "INSERT INTO route (city_from, city_to, description_from, description_to) VALUES('$this->city_from', '$this->city_to', '$this->description_from', '$this->description_to');";
        $db->select($sql);
    }

    public function GetActiveList($db) 
    {
        $db->connectDb();
        $sql = "SELECT id, city_from, city_to, description_from, description_to, disabled, data_create FROM route where disabled=false order by data_create;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "RouteModel");
        return $data;
    }

    public function GetAllList($db) 
    {
        $db->connectDb();
        $sql = "SELECT id, city_from, city_to, description_from, description_to, disabled, data_create FROM route where 1=1 order by data_create;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "RouteModel");
        return $data;
    }
}