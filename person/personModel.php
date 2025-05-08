<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
class PersonModel
{
    public $firstName, $lastName, $dob, $applicationId;

    public function GetPersonsByApplicationId($applicationId):array   
    {
        $db = new DbConnectClass();
        $db->connectDb();
        $sql = "SELECT first_name firstName, last_name lastName, dob FROM person where application_id=$applicationId;";
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "PersonModel");
        return $data;
    }

    public function Insert($applicationId): bool|PDOStatement   
    {
        $db = new DbConnectClass();
        $db->connectDb();
        $sql = "INSERT INTO person(first_name, last_name, dob, application_id) VALUES('$this->firstName', '$this->lastName', '$this->dob', $applicationId);";
        $result = $db->select($sql);
        // echo ($result);

        return $result;
    }
}