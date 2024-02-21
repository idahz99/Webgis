<!DOCTYPE html>

<html lang="en" >
<head>
<title>Login page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">



<div>
    <link href="./login529.css" rel="stylesheet" />
  
      <body style="background-color:#8CE892;">
        <div style="text-align:right">
        <input class="Mapbutton" type="button" value="Map" onclick="document.location='Homepage.php'">
        </div>

       <div style="display: flex; justify-content: center; align-items: center;" >
       <img
          src="Images\maplogo.png"
          alt="map732"
          class="login529-image"
        />  
        
          <div class="login529-text01">DyslexiaMap </div>  
      
      </div>
     <div style="text-align:center ;">Admin</div>

        <div class ="container">
          
        <p class="login529-text01">Login</p>
         
          
         <form class="form" action='Includes/login.inc.php' method="POST">
          <div style="text-align:left">
          <label for="adminemail"> Email:</label><br>
          <input class = "input" type="email" id = "email" placeholder="Admin@xyz.com" name="email" required  > <br>
          
          <label for="adminpassowrd">Password:</label><br>
          <input class = "input" type="password" name="password"  required> <br>  
          </div>

          <div style="text-align:right">
          <a href="">forgot password </a><br>
          
          <input class="input" type="submit" name="submit" value = "login" />
         </div>
          </form><br>
          
        
             </div>
    </div>
  </div>
</head>
</html>