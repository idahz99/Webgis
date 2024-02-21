<?php

$servername="localhost";
$username= "crimsonw_269349_gis";
$password= "4ZF5Q6!Kbpn8";
$dbname = "crimsonw_gisdb";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
    die("Connection failed : ".$conn-> connect_error );
    

}
return $conn;

?>