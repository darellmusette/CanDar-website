<?php

ini_set('display_errors',true);
error_reporting(E_ALL);

require_once('nusoap.php');
$error='';
$result=array();

$wsdl="http://localhost/canDar Sports Tech/soap_products_Service.php?wsdl";

$client= new nusoap_client($wsdl,true);
$err=$client->getError();
if($err){
    echo '<h2>Constructor error</h2>' .$err;
    exit();
}
try{
    $result=$client->call('fetchProducts',array());

    $result=json_decode($result,true);
}catch(Exception $e){
    echo 'caught exception', $e->getMessage(),"\n";
}
