<?php
$linkmy = @mysqli_connect("localhost", "f0672935_otzivi", "parol", "f0672935_otzivi") or die ('@mysqli_connect error');
mysqli_select_db($linkmy, "f0672935_otzivi") or die("Базы данных нет");

$name=json_decode($_GET['name']);
$email=json_decode($_GET['email']);
$message=json_decode($_GET['message']);
 
$sql_add = "INSERT INTO reviews SET name='".$name."', email='".$email."', message='".$message. "'";
mysqli_query($linkmy, $sql_add);
if (mysqli_affected_rows($linkmy)>0)
{
	print "Готово! Ваш отзыв сохранен в БД и будет виден после обновления страницы";
}
else
{
	print "Неудачно"; 
}
?>