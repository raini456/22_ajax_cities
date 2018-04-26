<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if(!is_int($id)){
  exit();
}
$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('city, pop, iso3, lat, lng, country, province');
//$db->setGroupBy('city');
//$db->setStatement();
//$db->setOrderBy('city ASC');
$db->setWhere("id='$id'");
$data=$db->getData();//liefert ein Array in JSON-Notation
echo json_encode($data[0]);
//$countries=[];
//foreach($data as $key=>$row){
//  $countries[]=$row['iso2'].';'.$row['country'];  
//}
//echo implode(',',$countries);


