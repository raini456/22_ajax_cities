<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$iso3 = filter_input(INPUT_GET, 'iso3', FILTER_SANITIZE_STRING);

if(strlen($iso3)!==3){
  exit();
}
$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('iso3, province');
$db->setGroupBy('province');
//$db->setStatement('DISTINCT');
$db->setOrderBy('province ASC');
$db->setWhere("iso3='$iso3'");
$data=$db->getData();//liefert ein Array in JSON-Notation
echo json_encode($data);
//$countries=[];
//foreach($data as $key=>$row){
//  $countries[]=$row['iso2'].';'.$row['country'];  
//}
//echo implode(',',$countries);


