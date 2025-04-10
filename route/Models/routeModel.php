<?php
class RouteTransportCreateModel
{ 
    public $route_id, $transport_id, $price;
     
    function __construct($route_id, $transport_id, $price)
    {
        $this->route_id = $route_id;
        $this->transport_id = $transport_id;
        $this->price = $price;
    }

    function makeSqlCreate($uuid) 
    {
        $sql = "INSERT INTO travel.transport_route (route_id, transport_type_id, price) VALUES($this->route_id, $this->transport_id, $this->price);";
        return $sql;
    }
}


?>