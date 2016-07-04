<?php

require '../resources/config.php';

$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : false;

switch($action){
    case 'getMateriales':
        getMateriales();
    break;
    default:
        echo "API";
    break;
}


/* API DEPLOYMENTS METHODS */

function getMateriales(){
    $data = [];

    $sql= "SELECT * FROM materiales ORDER BY material ASC";

    $result = mysql_query($sql);

    while($r = mysql_fetch_object($result)){
        array_push($data, $r);
    }

    echo json_encode($data);
}