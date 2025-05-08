<?php
class RouteTransportListModel
{ 
    public $route_id, $transport_id, $transport, $price, $showName;

 
    public function getActiveList($db) 
    {
        $sql="SELECT r.id route_id, tt.name as transport, tt.id as transport_id, price, CONCAT (tt.name, ' (', price,' руб)') showName FROM transport_route tr
            inner join route r on r.id = tr.route_id
            inner join transport_type tt on tt.id = tr.transport_type_id
            where r.disabled = false 
            and tt.disabled  = false
            and tr.disabled  = false";

        $db->connectDb();
        $result = $db->select($sql);
        $data = $result->fetchAll(PDO::FETCH_CLASS, "RouteTransportListModel");
        return $data;
    }
}