<?php
session_start();
include_once("dbcon.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $st =  "SELECT * FROM students_table WHERE id='$id'";
    $result = $conn->query($st);
    if($result ->num_rows == 1){
    $row=$result-> fetch_assoc();
    //print_r($row);
} else
echo "Student does not exist,please check details";
};


?>


<!DOCTYPE html>

<html lang="en" >
<head>
<title>Edit page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
     <link href="./style.css" rel="stylesheet" />
    <link href="./login529.css" rel="stylesheet" />
    <body>
    
    
    
    <div style="padding:2%; display: flex; justify-content: space-between;">

        <div onclick="openmenu()">
        <i class="fa-solid fa-bars fa-lg"></i>
        </div>
        <span>Admin <input type ="button" onclick=";" class="logoutbtn" value="Logout"  ></input> </span>
        
        


    </div>
    <p></p>
  <div class = sidenav id ='side-menu'>
      
    <div onclick="slideclose()" >
      <i class="fa-solid fa-angle-left fa-lg"></i>
      <p></p>
    </div>

    
  
      <span >
        <div style="display: flex; padding-left:5% ;"  >
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
 <div style = "padding-left: 10%;">
     <form id="myForm" class="form" action='Includes/edit.inc.php' method="POST" onSubmit="return confirm('Save changes?')";>
          <h2>Student's details </h2> 
          <label for="Name"> Name:</label><br>
          <input class = "input" type="text"  name="name"  required  value ="<?php echo $row['name'];?>"  > <br>
          
          <label for="ID">ID:</label><br>
          <input class = "input" type="text" name="id"  required value ="<?php echo $row['id'];?>"     >  <br>
          
          <label for="Address">Address:</label><br>
          <input class = "input" type="text" name="address"  required    value ="<?php echo $row['address'];?>"> <br>
          
          <label for="Age">Age:</label><br>
          <input class = "input" type="text" name="age"  required    value ="<?php echo $row['age'];?>"> <br>
          
           <div style="display: flex; ">
          <a href="delete.php?id=<?php echo $row['id'];?>"><button class="logoutbtn"  style="display: flex; margin-right:2%; background-color:red"  type="button" onclick="return confirm('Are you sure you want to delete this student?')">Delete </button></a>
          <br>
          <input type ="submit" class="logoutbtn" value="Edit"  ></input>
         </div>
</form>
 </div>



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