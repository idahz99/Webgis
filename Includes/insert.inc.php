<?php
 session_start();
$_SESSION["Email"];
include_once("dbcon.php");
$dob = $_POST['year'];
$today = date("d-m-Y");
$diff = date_diff(date_create($dob), date_create($today));
 
$address = $_POST['address'];
$name = $_POST['name'];
$id = $_POST['id'];
$age = $diff->format('%y');
print_r($address);

$searchQuery = $address;
$buildQuery = http_build_query([
  'access_key' => 'd2d9b621c491c8fa23b05cdc60853d1d',
  'query' => $searchQuery,
  'country'=> 'MY',
  'limit'=> 1,
 
]);

$ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $buildQuery));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response,true);


print_r($result);
$lat=$result['data'][0]['latitude'];
$lng = $result['data'][0]['longitude'];



$insert = "INSERT INTO students_table(name,address,id,lat,longi,age)VALUES ('$name','$address','$id','$lat','$lng','$age') ";
if ($conn->query($insert) === TRUE){
    ob_start();
    header("location:https://crimsonwebs.com/s269349/Webgis/insert.php?in=success");
   exit();
}else{
ob_start();
 header("location:https://crimsonwebs.com/s269349/Webgis/insert.php?in=fail");
    exit();
 }
?>







