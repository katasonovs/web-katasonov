<?php
require "news_db.php";

$requestSize = $_GET['frequestSize'];
$current = $_GET['fcurrent'];

$_header = array();
$_desc = array();
$_img = array();
$_link = array();
$data = array();
$range=0;

$range=$current+$requestSize;
$_header = array_slice($header,$current,$range);
$_desc = array_slice($desc,$current,$range);
$_img = array_slice($img,$current,$range);
$_link = array_slice($link,$current,$range);
	
$data['header']=$_header;
$data['desc']=$_desc;
$data['img']=$_img;
$data['link']=$_link;

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>