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

	<!-- Display All Clients-->
<h1 align="center">Clients</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 10%;margin-right: 10%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from clients";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "ClientID" . "</th>";
        echo "<th>" . "Name" . "</th>";
        echo "<th>" . "FirstName" . "</th>";
        echo "<th>" . "LastName" . "</th>";
        echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Address1" . "</th>";
        echo "<th>" . "Address2" . "</th>";
        echo "<th>" . "City" . "</th>";
		echo "<th>" . "State" . "</th>";
		echo "<th>" . "Zip" . "</th>";
		echo "<th>" . "Phone" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ClientID"].  "</td>";
        echo "<td>" . $row["Name"].  "</td>";
        echo "<td>" . $row["FirstName"]. "</td>";
        echo "<td>" . $row["LastName"]. "</td>";
        echo "<td>" . $row["Company"]. "</td>";
        echo "<td>" . $row["Address1"]. "</td>";
        echo "<td>" . $row["Address2"]. "</td>";
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
   <h1 align = "center">Client Search</h1>
    <form action="" method="post" align="center">
            <input type="text" placeholder="Enter Client ID..." name="lookup">
            <input type="submit" value="Search" style="background-image: none; background-color:red; height: 25px; width: 60px;">
        </form>
    <table >
<?php

if(isset($_POST['lookup'])){
include "connect.php";
$input = $_POST['lookup'];

$sql = "select clients.ClientID cID, clients.Name cName, count(computers.ClientID) comps from computers join clients on computers.ClientID=clients.ClientID where computers.ClientID like '%$input%'";
$result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "ClientID" . "</th>";
		echo "<th>" . "Company Name" . "</th>";
        echo "<th>" . "Computers" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<td>" . $row["cID"].  "</td>";
		echo "<td>" . $row["cName"].  "</td>";
        echo "<td>" . $row["comps"].  "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}
}
?>
    </table>

<!-- Display All Computer Counts-->
    <h1 align="center">Computers Per Client</h1>
	<div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 35%;margin-right: 35%;">
    <table >
<?php
    include "connect.php";
    $sql = "select clients.Name name, count(computers.ClientID) comps from clients inner join
	computers on clients.ClientID=computers.ClientID group by computers.ClientID order by clients.Name";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Company Name" . "</th>";
        echo "<th>" . "Computers" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>" . $row["name"].  "</td>";
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