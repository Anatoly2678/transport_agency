<?php
class AgencyModel
{ 
    public $name, $inn, $email, $phone, $manager;
     
    function displayInfo()
    {
        echo('<div class="container-md">');
        echo('<h3>Агентство успешно зарегистрировано!</h3>');
        echo "Наименование: " . $this->name .";<br> ИНН: " . $this->inn . ";<br>";
        echo "Email: " . $this->email .";<br> Телефон: " . $this->phone . ";<br>";
        echo "Менеджер: " . $this->manager ."<br>";
        echo('<a href="/" class="btn btn-success">На главную</a>');
        echo('</div>');   
        
    }

    function insertSqlCreate() 
    {
        $sql = "INSERT INTO travel.agency (name, inn, email, phone, manager) VALUES('$this->name', '$this->inn', '$this->email', '$this->phone', '$this->manager');";
        return $sql;
    }
}
?>