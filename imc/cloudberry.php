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
	<!-- Display All Cloudberry Backups-->
<h1 align="center">Cloudberry Backups</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 2%;margin-right: 2%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from cloudberry";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Company" . "</th>";
        echo "<th>" . "User" . "</th>";
        echo "<th>" . "Email" . "</th>";
        echo "<th>" . "Computer" . "</th>";
        echo "<th>" . "BackupPlan" . "</th>";
        echo "<th>" . "PlanType" . "</th>";
        echo "<th>" . "ProductVersion" . "</th>";
		echo "<th>" . "StorageQuota" . "</th>";
		echo "<th>" . "SpaceUsed" . "</th>";
		echo "<th>" . "LastSuccessfulStart" . "</th>";
		echo "<th>" . "LastStart" . "</th>";
		echo "<th>" . "Duration" . "</th>";
		echo "<th>" . "NextRun" . "</th>";
		echo "<th>" . "Overdue" . "</th>";
		echo "<th>" . "DataScanned" . "</th>";
		echo "<th>" . "FilesCopied" . "</th>";
		echo "<th>" . "DataCopied" . "</th>";
		echo "<th>" . "Status" . "</th>";
		echo "<th>" . "Error" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Company"].  "</td>";
        echo "<td>" . $row["User"].  "</td>";
        echo "<td>" . $row["Email"]. "</td>";
        echo "<td>" . $row["Computer"]. "</td>";
        echo "<td>" . $row["BackupPlan"]. "</td>";
        echo "<td>" . $row["PlanType"]. "</td>";
        echo "<td>" . $row["ProductVersion"]. "</td>";
        echo "<td>" . $row["StorageQuota"]. "</td>";
		echo "<td>" . $row["SpaceUsed"]. "</td>";
		echo "<td>" . $row["LastSuccessfulStart"]. "</td>";
		echo "<td>" . $row["LastStart"]. "</td>";
		echo "<td>" . $row["Duration"]. "</td>";
		echo "<td>" . $row["NextRun"]. "</td>";
		echo "<td>" . $row["Overdue"]. "</td>";
		echo "<td>" . $row["DataScanned"]. "</td>";
		echo "<td>" . $row["FilesCopied"]. "</td>";
		echo "<td>" . $row["DataCopied"]. "</td>";
		echo "<td>" . $row["Status"]. "</td>";
		echo "<td>" . $row["Error"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
	</div>
	<!-- Display All Computers with out of date Software-->
<h1 align="center">Out of Date Software (CB)</h1>
<table >
	<?php
    include "connect.php";
    $sql = "SELECT Company, Computer, ProductVersion from cloudberry where ProductVersion < '6.3.0.275'";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Computer" . "</th>";
        echo "<th>" . "ProductVersion" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Company"].  "</td>";
        echo "<td>" . $row["Computer"]. "</td>";
        echo "<td>" . $row["ProductVersion"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>

</table >

	<!-- Display All Computers with failed Status-->
<h1 align="center">Failed Backups</h1>
<table >
	<?php
    include "connect.php";
    $sql = "SELECT Company, Computer, Status, Error from cloudberry where Status != 'Success'";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Computer" . "</th>";
        echo "<th>" . "Status" . "</th>";
		echo "<th>" . "Error" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Company"].  "</td>";
        echo "<td>" . $row["Computer"]. "</td>";
        echo "<td>" . $row["Status"]. "</td>";
		echo "<td>" . $row["Error"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>
</table >

<!-- Display Data totals per Client-->
    <h1 align="center">Data Totals Per Client</h1>
    <table >
<?php
    include "connect.php";
    $sql = "select Company,  sum(DataScanned) backup from cloudberry group by Company order by Company";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
		echo "<th>" . "Company" . "</th>";
        echo "<th>" . "Data Total (GBs)" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row["Company"]. "</td>";
        echo "<td>" . $row["backup"].  "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>


</table >
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