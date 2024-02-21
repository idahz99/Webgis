<?php
session_start();
if(isset($_SESSION["Email"])){
include_once("dbcon.php");
function getpositions(){
global $conn;    
$qry = "SELECT * FROM students_table";
$record= $conn->query($qry);
//count
$rC = $record->num_rows;
if($rC>0){
    //Array
    $rows = array();
    //get the sqlresults
    while($row=$record->fetch_array()){
        $longi = $row["longi"];
        $lat = $row["lat"];
        $age = $row["age"];
    $rows[]=array(
        "longi"=>$longi,
        "lat"=>$lat,
        "age"=>$age
        );
        
    }
    echo "var datapoint = ";
    echo json_encode($rows);
    echo ";\n";
    echo ' for(var i=0; i < datapoint.length; i++) {
    if(datapoint[i].age > 13){
    L.circleMarker( [datapoint[i].lat , datapoint[i].longi],{
        fillColor: "#f03",
        fillOpacity: 0.5,
        radius: 30,
         weight:0,
    }).addTo(map);
    console.log(datapoint[i].age);
    }else{
    L.circleMarker( [datapoint[i].lat , datapoint[i].longi],{
        fillColor: "#D8BFD8",
        fillOpacity: 0.5,
        radius: 30,
         weight:0,
    }).addTo(map);    
    }
    }';
}
//close
$record->free();
$conn->close();

}

}else{
    echo "Not admin";
}

?>
<!DOCTYPE html>

<html lang="en" >
<head>
<title>Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
    <link href="./style.css" rel="stylesheet" />
    <link href="./login529.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
   <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <div style="padding-left:5% ;"  >
    <body>
    <div style="padding:2%; display: flex; justify-content: space-between;">
        
        <div onclick="openmenu()">
        <i class="fa-solid fa-bars fa-lg"></i>
        </div>
        <span>Admin <input type ="button" onclick="window.location='Homepage.php'" class="logoutbtn" value="Logout"  ></input> </span>
        </div>
    <p></p>
    
  <div class = sidenav id ='side-menu' >
      
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
   
                    
              </div>
                <br>
               <div id="map" style="height: 70vh; width:100vh; "  ">

               <script>
                
                var openstr= L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                });

                var satelite = L.tileLayer('https://api.maptiler.com/maps/hybrid/{z}/{x}/{y}.jpg?key=Zcnb7gZcFZaxuZkPjdmh',{
                tileSize: 512,
                zoomOffset: -1,
                minZoom: 1,
                attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
                crossOrigin: true
              });
              var map = L.map('map',{layers: [openstr]}).setView([6.1184, 100.3685], 13);
              var basemaps = {
              "Openstreet":openstr,
              "Satelite" :satelite
              };
              L.control.layers(basemaps).addTo(map);
              L.Control.geocoder().addTo(map);
              L.control.locate().addTo(map);
               <?php getpositions(); ?>               

                 
    
               </script>

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
