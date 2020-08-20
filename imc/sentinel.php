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
 height: 50%;
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

	<!-- Display All Sentinels-->
<h1 align="center">Sentinel One</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 4%;margin-right: 4%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from sentinels";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Endpoint" . "</th>";
        echo "<th>" . "LastUser" . "</th>";
        echo "<th>" . "GroupName" . "</th>";
        echo "<th>" . "Domain" . "</th>";
        echo "<th>" . "AgentVersion" . "</th>";
        echo "<th>" . "LastActive" . "</th>";
		echo "<th>" . "SubscribedOn" . "</th>";
		echo "<th>" . "HealthStatus" . "</th>";
		echo "<th>" . "DeviceType" . "</th>";
		echo "<th>" . "MAC" . "</th>";
		echo "<th>" . "ManagementConnectivity" . "</th>";
		echo "<th>" . "NetworkStatus" . "</th>";
		echo "<th>" . "UpdateStatus" . "</th>";
		echo "<th>" . "ScanStatus" . "</th>";
		echo "<th>" . "PendingUninstall" . "</th>";
		echo "<th>" . "VulnerabilityStatus" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Endpoint"].  "</td>";
        echo "<td>" . $row["LastUser"].  "</td>";
        echo "<td>" . $row["GroupName"]. "</td>";
        echo "<td>" . $row["Domain"]. "</td>";
        echo "<td>" . $row["AgentVersion"]. "</td>";
        echo "<td>" . $row["LastActive"]. "</td>";
        echo "<td>" . $row["SubscribedOn"]. "</td>";
		echo "<td>" . $row["HealthStatus"]. "</td>";
		echo "<td>" . $row["DeviceType"]. "</td>";
		echo "<td>" . $row["MAC"]. "</td>";
		echo "<td>" . $row["ManagementConnectivity"]. "</td>";
		echo "<td>" . $row["NetworkStatus"]. "</td>";
		echo "<td>" . $row["UpdateStatus"]. "</td>";
		echo "<td>" . $row["ScanStatus"]. "</td>";
		echo "<td>" . $row["PendingUninstall"]. "</td>";
		echo "<td>" . $row["VulnerabilityStatus"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>

    </table>
	</div>
	<!-- How many licenses belong to each client?-->
<h1 align="center">Licenses Per Location</h1>
<table >
	<?php
    include "connect.php";
    $sql = "select clients.Name cName, locations.Name lName, count(computers.ClientID) licenses from locations inner join computers on locations.locationID=computers.locationID inner join clients on locations.ClientID=clients.ClientID inner join sentinels on computers.Name=sentinels.Endpoint group by locations.LocationID order by clients.Name";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Location" . "</th>";
        echo "<th>" . "Licenses" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cName"].  "</td>";
        echo "<td>" . $row["lName"]. "</td>";
        echo "<td>" . $row["licenses"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>

</table >

	<!-- Display All Computers with Remidiation Required-->
<h1 align="center">At Risk Machines</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 35%;margin-right: 35%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT GroupName, Endpoint, HealthStatus, VulnerabilityStatus from sentinels where HealthStatus != 'Healthy' or VulnerabilityStatus != 'Up to date' order by GroupName";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
		echo "<th>" . "Endpoint" . "</th>";
        echo "<th>" . "Heatlh Status" . "</th>";
        echo "<th>" . "Vulnerability Status" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["GroupName"].  "</td>";
		echo "<td>" . $row["Endpoint"].  "</td>";
        echo "<td>" . $row["HealthStatus"]. "</td>";
        echo "<td>" . $row["VulnerabilityStatus"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>
</table >
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