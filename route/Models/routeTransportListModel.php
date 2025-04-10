<?php
class RouteTransportListModel
{ 
    public $route, $transport, $price, $city_from, $city_to, $description_from, $description_to;

    public string $route_full;

    public function __construct()
    {
        $from = $this->city_from;            
        if(!empty($this->description_from)) {
            $from = $from . "(".$this->description_from.")";
        }

        $to = $this->city_to;
        if(!empty($this->description_to)) {
            $to = $to . "(".$this->description_to.")";
        }
        $this->route_full = ($from."-".$to);
    } 
     
    function getActiveList($db) 
    {
        $sql="SELECT tr.id, r.city_from, r.city_to, r.description_from, r.description_to, tt.name as transport, price FROM travel.transport_route tr
            inner join travel.route r on r.id = tr.route_id
            inner join travel.transport_type tt on tt.id = tr.transport_type_id
            where r.disabled = false 
            and tt.disabled  = false
            and tr.disabled  = false";

        $db->connectDb();
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "RouteTransportListModel");
        // echo json_encode($data);
        return $data;
    }
}
?>