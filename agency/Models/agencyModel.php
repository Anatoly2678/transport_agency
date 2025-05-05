<?php
class AgencyModel
{
    public $id, $name, $inn, $email, $phone, $manager, $password;

    public function __construct()
    {

    }

    function displayInfo()
    {
        echo ('<div class="container-md">');
        echo ('<h3>Агентство успешно зарегистрировано!</h3>');
        echo "Наименование: " . $this->name . ";<br> ИНН: " . $this->inn . ";<br>";
        echo "Email: " . $this->email . ";<br> Телефон: " . $this->phone . ";<br>";
        echo "Менеджер: " . $this->manager . "<hr>";        
        echo ('<div>');
        echo ('Для входа используйте ваш ИНН и пароль, указанный при регистрации');
        echo ('</div>');
        echo ('<a href="/" class="btn btn-success">На главную</a>');
        echo ('</div>');
    }

    public function displayTextInfo():string   
    {
        return $this->name . "; (" . $this->inn . ") тел.".$this->phone." Email.". $this->email;
    }


    public function insertSql($db)
    {
        try {
        $db->connectDb();
        $conn = $db->getConnect();
        $conn->beginTransaction();
        $uuid = $db->create_uuid();
        $sql = "INSERT INTO travel.agency (name, inn, email, phone, manager, uniq_id, password, is_confirm) VALUES('$this->name', '$this->inn', '$this->email', '$this->phone', '$this->manager', '$uuid', '$this->password', 1);";
        $conn->exec($sql);
        $conn->commit();
        }
        catch (Exception $e) {
            $conn->rollback();
            // var_dump( $e->getMessage());
            exit(header("Location: /login/login.php"));
        }
    }

    public function GetAgencyInfoByUid($db, $uid) {

        $sql = "Select id, name, inn, email, phone, manager from travel.agency where uniq_id='$uid' limit 1;";
        $db->connectDb();
        $result = $db->getConnect()->query($sql);
        foreach($result as $row) {
            $this->id = $row["id"];
            $this->name = $row["name"];
            $this->inn = $row["inn"];
            $this->email = $row["email"];
            $this->phone = $row["phone"];
            $this->manager = $row["manager"];
        }
    }
}