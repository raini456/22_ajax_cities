<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING);

if(!$city){
  exit();
}
$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('lat, lng, pop, province');
//$db->setGroupBy('city');
//$db->setStatement();
//$db->setOrderBy('city ASC');
$db->setWhere("city='$city'");
$data=$db->getData();//liefert ein Array in JSON-Notation
echo json_encode($data);
//$countries=[];
//foreach($data as $key=>$row){
//  $countries[]=$row['iso2'].';'.$row['country'];  
//}
//echo implode(',',$countries);


