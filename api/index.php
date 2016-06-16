<?php
require "../resources/config.php";

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : false;

switch($action){
    case 'getAlimentos':
        getAlimentos();
    break;
    default:
        echo "API";
    break;
}


/* API DEPLOYMENTS METHODS */

function getAlimentos(){
    $data = [];

    $sql= "SELECT * FROM alimentos";

    $result = mysql_query($sql);

    while($r = mysql_fetch_object($result)){
        array_push($data, $r);
    }

    echo json_encode($data);
}