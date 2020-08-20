<!DOCTYPE html>
<html>
  
<style> 
input[type=submit] {
  background-image:url("LabTechApp.ico");
  background-repeat: no-repeat;
  border: groove;
  color: white;
  text-decoration: none;
  height:55px;
  width: 105px;
  margin: 4px 2px;
  cursor: pointer;


}
ul {
  text-align:center;
  list-style-type: none;

}

ul a {
  background-color: #eee;
  color: black;
  text-decoration: none;
  border: solid grey;
  padding: 6px;
}

ul a:hover {
  background-color: #ccc;
}

ul a.active {
  background-color: #ff0000;
  color: white;  

}
li {
  display: inline;
}
 table, th, td {
 border: 2px solid red;
 margin-left: auto;
 margin-right: auto;
 }
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
    
</style>
<body>
 <form action="index.php">
 <input type="submit" value="" />
 <ul>
  <li><a href="clients.php" >Clients</a></li>
  <li><a href="locations.php">Locations</a></li>
  <li><a href="computers.php">Computers</a></li>
  <li><a href="cloudberry.php">Cloudberry Backups</a></li>
  <li><a href="malwarebytes.php">Malwarebytes</a></li>
  <li><a href="ms365.php" >Microsoft 365 Emails</a> </li>
  <li><a href="sentinel.php" >Sentinel One Agents</a></li>
  <li><a href="monthlies.php" >Monthlies</a></li>
  </ul>
</form>
	<!-- Display All Locations-->
<h1 align="center">Locations</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 20%;margin-right: 20%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from locations";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "LocationID" . "</th>";
        echo "<th>" . "ClientID" . "</th>";
        echo "<th>" . "Name" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "City" . "</th>";
        echo "<th>" . "State" . "</th>";
        echo "<th>" . "Zip" . "</th>";
		echo "<th>" . "Phone" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["LocationID"].  "</td>";
        echo "<td>" . $row["ClientID"].  "</td>";
        echo "<td>" . $row["Name"]. "</td>";
        echo "<td>" . $row["Address"]. "</td>";
        echo "<td>" . $row["City"]. "</td>";
        echo "<td>" . $row["State"]. "</td>";
        echo "<td>" . $row["Zip"]. "</td>";
        echo "<td>" . $row["Phone"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
</div>
<!-- Search--> 
   <h1 align = "center">Locations Per City</h1>
	<h2 align = "center"> Please select the City</h2>
    <form action="" method="post" align="center">
		<input type="radio" name="City"
		<?php if (isset($City) && $City=="North Haven") echo "checked";?>
		value="North Haven">North Haven
		<br>
        <input type="radio" name="City"
		<?php if (isset($City) && $City=="New Haven") echo "checked";?>
		value="New Haven">New Haven
		<br>
		<input type="radio" name="City"
		<?php if (isset($City) && $City=="Hamden") echo "checked";?>
		value="Hamden">Hamden
		<br>
        <input type="submit" value="Search" style="background-image: none; background-color:red; height: 25px; width: 60px;">
        </form>
    
    <table >
<?php

if(isset($_POST['City'])){
include "connect.php";
$input = $_POST['City'];

$sql = "select clients.Name cName, locations.Name lName, locations.Address address from locations join clients on clients.clientID=locations.clientID where locations.City like '%$input%'";
$result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Location" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cName"].  "</td>";
        echo "<td>" . $row["lName"]. "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}
}
?>
    </table>
	
<!-- Display All Computer Counts-->
    <h1 align="center">Computers Per Location</h1>
	    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 35%;margin-right: 35%;">
    <table >
<?php
    include "connect.php";
    $sql = "select clients.Name cName, locations.Name lName, count(computers.ClientID) comps from locations inner join computers on locations.locationID=computers.locationID inner join clients on clients.ClientID=locations.ClientID group by locations.LocationID order by clients.Name";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company Name" . "</th>";
        echo "<th>" . "Location Name" . "</th>";
        echo "<th>" . "Computers" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row["cName"]. "</td>";
        echo "<td>" . $row["lName"].  "</td>";
        echo "<td>" . $row["comps"].  "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
	</div>

 <form action="index.php">
 <input type="submit" value="" />
</form>
    	<ul>
  <li><a href="clients.php" >Clients</a></li>
  <li><a href="locations.php">Locations</a></li>
  <li><a href="computers.php">Computers</a></li>
  <li><a href="cloudberry.php">Cloudberry Backups</a></li>
  <li><a href="malwarebytes.php">Malwarebytes</a></li>
  <li><a href="ms365.php" >Microsoft 365 Emails</a> </li>
  <li><a href="sentinel.php" >Sentinel One Agents</a></li>
  <li><a href="monthlies.php" >Monthlies</a></li>
  </ul>
</body>
</html>