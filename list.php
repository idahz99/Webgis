<?php

session_start();
?>
<!doctype html>


<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css" rel="stylesheet"/>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"/>
<!--<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
<!--<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
<script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
 <link href="./style.css" rel="stylesheet" />
    <link href="./login529.css" rel="stylesheet" />






<title>StudentsList</title>
 


<body>
  <div style="padding-left:40px;padding-top:60px" onclick="openmenu()">
        <i class="fa-solid fa-bars fa-lg"></i>
        </div>    
 <div class = sidenav id ='side-menu'>
      
    <div onclick="slideclose()" >
      <i class="fa-solid fa-angle-left fa-lg"></i>
      <p></p>
    </div>
      <span >
        <div style="display: flex; padding-:5% ;"  >
        <div></div>
            <img
               src="Images\maplogo.png"
               alt="map732"
               class="login529-image"
             />          
               <div class="login529-text01" style="text-align: left;  font-size: 3.5vw;">DyslexiaMap </div>  
           
           </div>
          <div style="padding-left:5%; display:flex; "  >Admin</div> 
 
  </span>
  <ul >
  <a href="dashboard.php" class=" close">Dashboard</a>
  <a href="list.php" class=" close">Students List</a>
  <a href="insert.php" class=" close">Insert</a>
  </ul>
  </div>        
<div style= "padding-left: 90px;padding-right:90px ;">
<h1 style="text-align: center">Students List</h1>

<table id= "myTable"  class="ui celled table" style="width:100%" >
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>ID</th>
        <th>Action</th>
      
    </tr>
    </thead>
    <tbody>
    <?php 
    session_start();
    include_once("dbcon.php");
    $students = "SELECT * FROM students_table ";
    $result = $conn->query($students);
    $_SESSION["Email"];
    
    if(isset($_GET['con'])){
    if($_GET['con']== "success"){
    echo '<script>alert("Edit successfully ")</script>';
    }else
     echo '<script>alert("Edit failed.please try again ")</script>';
    }
     if(isset($_GET['delete'])){
    if($_GET['delete']== "success"){
    echo '<script>alert("Student has been deleted ")</script>';}};
    ?>
    
   <?php while($row=$result-> fetch_assoc()){ ?>
        <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['id'] ?></td>
               <td> <a href="view.php?id=<?php echo $row['id'];?>"><i class="fa-regular fa-pen-to-square"></i></a>
               </td>
                </tr>
    <?php }?>
    
    
</tbody>  
</table>
</div>
<br>
<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
} ); 
</script>
  <script>
function openmenu(){
document.getElementById("side-menu").style.width = "25%";
}
function slideclose(){
  
  document.getElementById("side-menu").style.width = "0";

}
  </script>
</body>
</head>
</html>