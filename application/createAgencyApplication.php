<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$newApp = new Application();
$db = new DbConnectClass();
// Creating an object
$app = new stdClass();

// Property added to the object
$app->createdAt = GetPostValue('createdAt');
$app->agencyId = GetPostValue('agency_id');
$app->comment = GetPostValue('comment');

$app->routeTo = GetPostValue('routeTo');;
$app->transportTo = GetPostValue('transportTo');
$app->flightTo =GetPostValue('flightTo');
$app->cityTo = GetPostValue('cityTo');
$app->dateTo = GetPostValue('dateTo');
$app->timeTo = GetPostValue('timeTo');

$app->routeFrom = GetPostValue('routeFrom');
$app->transportFrom = GetPostValue('transportFrom');
$app->flightFrom = GetPostValue('flightFrom');
$app->cityFrom = GetPostValue('cityFrom');
$app->dateFrom = GetPostValue('dateFrom');
$app->timeFrom = GetPostValue('timeFrom');
$app->passengersFam = GetPostArrayValue('fam');
$app->passengersName = GetPostArrayValue('name');
$app->passengersDOB = GetPostArrayValue('dob');

$newApp->insert($db,$app);
// echo("<hr>");

// foreach (array_filter($_POST['fam'], 'strlen') as $key => $value) {
//     echo $value . "(".$key.")" . "<br />";
//     var_dump($_POST['name'][$key]);
//     echo "<br />";
//     var_dump($_POST['dob'][$key]);
//     echo "<br />";
// }

// http://transport.local/agency-cabinet
exit(header("Location: /agency-cabinet"));

function GetPostValue($field) {
    return isset($_POST[$field]) ? $_POST[$field] : 'null';
}

function GetPostArrayValue($field) {
    return isset($_POST[$field]) ? array_filter($_POST[$field], 'strlen') : null;
}


?>
<!-- <hr>
<a href="/application/applicationAgency.php" >URL</a> -->