<!DOCTYPE html>

<html lang="en" >
<head>
<title>Reset page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">






<div>
    <link href="./login529.css" rel="stylesheet" />
  
      <body style="background-color:#8CE892;">
        <div style="text-align:right">
        <input class="Mapbutton" type="button" value="Map" onclick="Homepage.html">
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
          
        <p class="login529-text01">Reset password</p>
        <p >Please  enter valid Admin email to receive the secret code.</p> 
          
         <form class="form" action='Includes/reset.inc.php' method="POST">
          <div style="text-align:left">
          <label for="adminemail"> Email:</label><br>
          <input class = "input" type="email" id = "email" placeholder="Admin@xyz.com" name="email" required  > <br>
          
          <input class="input" type="submit" value = "submit" />

         
          </form><br>
          
        
             </div>
    </div>
  </div>
</head>
</html>
         
          
        