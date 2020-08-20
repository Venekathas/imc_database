<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{	
	echo "Successfully connected<br>";
} 

// Let's show one of the tables.


/*$sql = "SELECT * from computers<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Computer Name: " . $row["Name"]. " - Username: " . $row["Username"]. " - LocationID" . $row["LocationID"]. "<br>";
  }
} else {
  echo "0 results<br>";
}


echo "Out of date computers.<br>";

$sql = "SELECT * from computers where OS = 'Microsoft Windows 10 Pro x64' and version != '10.0.18363'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Computer Name:" . $row["Name"]. " - Location ID " . $row["LocationID"]."<br>";
  }
} else {
  echo "0 results";
}

*/
echo "What client owns each location?<br>";

$sql = "SELECT * from clients c, locations l where c.ClientID = l.ClientID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Location " . $row["Name"]." belongs to the company " . $row["Company"]."<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>