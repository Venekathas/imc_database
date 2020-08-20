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
	<!-- Display All Computers-->
<h1 align="center">Computers</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 2%;margin-right: 2%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from computers";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "ComputerID" . "</th>";
        echo "<th>" . "ClientID" . "</th>";
        echo "<th>" . "LocationID" . "</th>";
        echo "<th>" . "Name" . "</th>";
        echo "<th>" . "Domain" . "</th>";
        echo "<th>" . "OS" . "</th>";
        echo "<th>" . "Version" . "</th>";
        echo "<th>" . "ServiceVersion" . "</th>";
		echo "<th>" . "LastContact" . "</th>";
		echo "<th>" . "LocalAddress" . "</th>";
		echo "<th>" . "RouterAddress" . "</th>";
		echo "<th>" . "WindowsUpdate" . "</th>";
		echo "<th>" . "UpTime" . "</th>";
		echo "<th>" . "MAC" . "</th>";
		echo "<th>" . "DateAdded" . "</th>";
		echo "<th>" . "LastUsername" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ComputerID"].  "</td>";
        echo "<td>" . $row["ClientID"].  "</td>";
        echo "<td>" . $row["LocationID"]. "</td>";
        echo "<td>" . $row["Name"]. "</td>";
        echo "<td>" . $row["Domain"]. "</td>";
        echo "<td>" . $row["OS"]. "</td>";
        echo "<td>" . $row["Version"]. "</td>";
        echo "<td>" . $row["ServiceVersion"]. "</td>";
		echo "<td>" . $row["LastContact"]. "</td>";
		echo "<td>" . $row["LocalAddress"]. "</td>";
		echo "<td>" . $row["RouterAddress"]. "</td>";
		echo "<td>" . $row["WindowsUpdate"]. "</td>";
		echo "<td>" . $row["UpTime"]. "</td>";
		echo "<td>" . $row["MAC"]. "</td>";
		echo "<td>" . $row["DateAdded"]. "</td>";
		echo "<td>" . $row["LastUsername"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
	</div>
<!-- Search--> 
   <h1 align = "center">Computers per OS</h1>
	<h2 align = "center"> Please enter the OS</h2>
    <form action="" method="post" align="center">
		<input type="radio" name="OS"
		<?php if (isset($OS) && $OS=="Microsoft Windows 7 Professional x64") echo "checked";?>
		value="7">Microsoft Windows 7 Professional x64
		<br>
        <input type="radio" name="OS"
		<?php if (isset($OS) && $OS=="Microsoft Windows 10 Home x64") echo "checked";?>
		value="10 Home">Microsoft Windows 10 Home x64
		<br>
		<input type="radio" name="OS"
		<?php if (isset($OS) && $OS=="Microsoft Windows 10 Pro x64") echo "checked";?>
		value="10 Pro">Microsoft Windows 10 Pro x64
		<br>
        <input type="submit" value="Search" style="background-image: none; background-color:red; height: 25px; width: 60px;">
        </form>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 25%; margin-right: 25%;">
    <table >
<?php

if(isset($_POST['OS'])){
include "connect.php";
$input = $_POST['OS'];

$sql = "select clients.Name cName, locations.Name lName, computers.Name comp, computers.OS cOS, computers.Version vers from computers join clients on clients.clientID=computers.clientID join locations on locations.clientID=computers.clientID where computers.OS like '%$input%' group by computers.Name order by clients.Name";
$result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Location" . "</th>";
        echo "<th>" . "Computer" . "</th>";
        echo "<th>" . "OS" . "</th>";
        echo "<th>" . "Version" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cName"].  "</td>";
        echo "<td>" . $row["lName"].  "</td>";
        echo "<td>" . $row["comp"]. "</td>";
        echo "<td>" . $row["cOS"]. "</td>";
        echo "<td>" . $row["vers"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}
}
?>
    </table>
	</div>
	<!-- Display All Computers with out of date ConnectWise-->
<h1 align="center">Out of Date Computers (CW)</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 30%; margin-right: 30%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT clients.Name cName, locations.Name lName, computers.Name comp, computers.ServiceVersion vers from computers join clients on clients.clientID=computers.clientID join locations on locations.clientID=computers.clientID where computers.ServiceVersion < 200.172";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Location" . "</th>";
		echo "<th>" . "Computer" . "</th>";
        echo "<th>" . "ServiceVersion" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cName"].  "</td>";
		echo "<td>" . $row["lName"].  "</td>";
        echo "<td>" . $row["comp"]. "</td>";
        echo "<td>" . $row["vers"]. "</td>";
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