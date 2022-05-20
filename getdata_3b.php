<?php
$linkmy = @mysqli_connect("localhost", "f0672935_otzivi", "parol", "f0672935_otzivi") or die ('@mysqli_connect error');
mysqli_select_db($linkmy, "f0672935_otzivi") or die("Базы данных нет");
 
$names = array();
$emails = array();
$messages = array();
$data = array();
$i=0;

$result=mysqli_query($linkmy, "SELECT * FROM reviews");
while ($row=mysqli_fetch_array($result)){
	$names[$i]=$row['name'];
	$emails[$i]=$row['email'];
	$messages[$i]=$row['message'];
	$i++;
}
$data['names']=$names;
$data['emails']=$emails;
$data['messages']=$messages;
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>