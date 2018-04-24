<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setTable('tb_cities');
$db->setColumns('iso2, country');
$db->setStatement('DISTINCT');
$db->setOrderBy('country ASC');
$data=$db->getData();
$countries=[];
foreach($data as $key=>$row){
  $countries[]=$row['iso2'].';'.$row['country'];  
}
echo implode(',',$countries);


