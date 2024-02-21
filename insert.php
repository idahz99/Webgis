 <?php 
   session_start();
    include_once("dbcon.php");
    $students = "SELECT * FROM students_table ";
    $result = $conn->query($students);
    $_SESSION["Email"];
    
    if(isset($_GET['in'])){
    if($_GET['in']== "success"){
    echo '<script>alert("New student successfully added ")</script>';
    }else
     echo '<script>alert(" failed.please try again ")</script>';
    }
    
    ?>
<!DOCTYPE html>

<html lang="en" >
<head>
<title>Insert page</title>
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
         <span>Admin <input type ="button" onclick="window.location='Homepage.php'" class="logoutbtn" value="Logout"  ></input> </span>
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
     <form class="form" action='Includes/insert.inc.php' method="POST" onsubmit="return confirm('Are you sure you want to add new student ?')">
          <h2>Insert new student </h2> 
          <label for="Name"> Name:</label><br>
          <input class = "input" type="text" id = "name"  name="name" required  > <br>
          
          <label for="ID">ID:</label><br>
          <input class = "input" type="text" name="id"  required> <br>

          <label for="address">Address:</label><br>
          <input class = "input" type="text" name="address"  required> <br>
          
          <label for="DOB">DOB:</label><br>
          <input class = "input" type="date" id="year" name="year"  required>

         <div style="display: flex; ">
          <input type ="submit"class="logoutbtn" value="Insert"  ></input>
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
