<?
include_once("dbcon.php");
$qry = "SELECT * FROM students_table";
$record= $conn->query($qry);
$rC = $record->num_rows;
if ($rC > 0) {
   while($row = $record->fetch_assoc()) {
        echo "<br> id: ". $row["lat"]. " - Name: ". $row["longi"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();  


?>