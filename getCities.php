<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$province = filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING);

if(!$province){
  exit();
}
$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('id, city');
$db->setGroupBy('city');
//$db->setStatement('DISTINCT');
$db->setOrderBy('city ASC');
$db->setWhere("province='$province'");
$data=$db->getData();//liefert ein Array in JSON-Notation
echo json_encode($data);
//$countries=[];
//foreach($data as $key=>$row){
//  $countries[]=$row['iso2'].';'.$row['country'];  
//}
//echo implode(',',$countries);


