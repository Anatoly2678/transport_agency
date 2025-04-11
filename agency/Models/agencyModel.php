<?php
class AgencyModel
{
    public $name, $inn, $email, $phone, $manager;

    public function __construct()
    {
        $this->name = $_POST['inputName'];
        $this->inn = $_POST['inputInn'];
        $this->email = $_POST['inputEmail'];
        $this->phone = $_POST['inputPhone'];
        $this->manager = $_POST['inputManager'];
    }

    function displayInfo()
    {
        echo ('<div class="container-md">');
        echo ('<h3>Агентство успешно зарегистрировано!</h3>');
        echo "Наименование: " . $this->name . ";<br> ИНН: " . $this->inn . ";<br>";
        echo "Email: " . $this->email . ";<br> Телефон: " . $this->phone . ";<br>";
        echo "Менеджер: " . $this->manager . "<br>";
        echo ('<a href="/" class="btn btn-success">На главную</a>');
        echo ('</div>');
    }

    function insertSqlCreate($uuid)
    {
        $sql = "INSERT INTO travel.agency (name, inn, email, phone, manager, uniq_id) VALUES('$this->name', '$this->inn', '$this->email', '$this->phone', '$this->manager', '$uuid');";
        return $sql;
    }

    function insertSql($db)
    {
        $db->connectDb();
        $uuid = $db->create_uuid();
        $sql = "INSERT INTO travel.agency (name, inn, email, phone, manager, uniq_id) VALUES('$this->name', '$this->inn', '$this->email', '$this->phone', '$this->manager', '$uuid');";
        $db->select($sql);
    }
}