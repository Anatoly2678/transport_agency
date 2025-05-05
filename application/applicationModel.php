<?php

class Application {

    public function insert($db, $application){

        $num = $this->generateNumber();
        $db->connectDb();
        $conn = $db->getConnect();
        $agency = new AgencyModel();
        $agency->GetAgencyInfoByUid($db,$application->agencyId);
        $conn->beginTransaction();
        $sql_old = "INSERT INTO travel.application ( `number`, agency_id, route_to, route_from, transport_to, transport_from, date_from, time_from, city_arrival_from, flight_number_from, date_to, time_to, city_arrival_to, flight_number_to, comment)
        VALUES('$num', $agency->id, $application->routeTo, $application->routeFrom, $application->transportTo, $application->transportFrom, '$application->dateFrom', '$application->timeFrom', '$application->cityFrom', '$application->flightFrom', 
        '$application->dateTo', '$application->timeTo', '$application->cityTo','$application->flightTo', '$application->comment')";

        $sql_old = str_replace("''","null", $sql_old);
        $conn->exec($sql_old);
        $lastInsert = $conn->lastInsertId();

        foreach ($application->passengersFam as $key => $value) {
            $name = $application->passengersName[$key];
            $dob = $application->passengersDOB[$key];
            $sql_person= "INSERT INTO travel.person (first_name, last_name, dob, application_id) VALUES('$value', '$name', '$dob', $lastInsert);";
            echo $sql_person . "<br />";
            $conn->exec($sql_person);
        }
        echo("<hr>");
        $conn->commit();
        
        echo( $sql_old );
        echo("<hr>");
        print $lastInsert;
        echo("<hr>");
        var_dump( $application );
       
    }

    function generateNumber() : string {
        $now = new DateTime();
        $num = $now->format('YmdHis');
        return "TR$num";
    }

}