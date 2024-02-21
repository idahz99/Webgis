<?php
include_once("dbcon.php");

$address = $_POST['address'];
$name = $_POST['name'];
$id = $_POST['id'];
$age = $_POST['age'];
$searchQuery = $address;
$buildQuery = http_build_query([
  'access_key' => 'd2d9b621c491c8fa23b05cdc60853d1d',
  'query' => $searchQuery,
  'limit'=> 1,
 
]);

$ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $buildQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response,true);
$lat=$result['data'][0]['latitude'];
$lng = $result['data'][0]['longitude'];

$sqlcheck = "SELECT * FROM students_table WHERE id ='$id'";
$result = $conn->query($sqlcheck);

$set = " UPDATE students_table SET name = '$name' ,address = '$address' ,age = '$age' ,lat =  '$lat' ,longi = '$lng'  WHERE id = '$id' ";

if ($conn->query($set) === TRUE){
   
   header("location:../list.php?con=success");
  
}else
 header("location:../list.php?con=failed");



?>