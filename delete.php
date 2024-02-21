<?php

include_once("dbcon.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $st =  "SELECT * FROM students_table WHERE id='$id'";
    $result = $conn->query($st);
    if($result ->num_rows == 1){
    $sqldelete = "DELETE FROM students_table WHERE  id = '$id'";
    $r = $conn->query($sqldelete);
    header('location:list.php?delete=success');
    exit();
} 

}
?>

          