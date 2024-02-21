<?php
include_once("dbcon.php");

if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    
    $loginuser = "SELECT * FROM admin_user WHERE Email='$email' AND password = '$pwd' AND code ='0' ";
    $result = $conn->query($loginuser);
        if ($result ->num_rows > 0){
    while ($row= $result-> fetch_assoc()){
    session_start();
    $_SESSION["Email"] = $row["Email"];
    header("location:../dashboard.php");
    exit();
}
   }else
   echo"failed1";
}

?>