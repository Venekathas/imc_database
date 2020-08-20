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
	<!-- Display All Emails-->
<h1 align="center">Microsoft 365 Emails</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 4%;margin-right: 4%;">
<table >
	<?php
    include "connect.php";
    $sql = "SELECT * from ms365";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "DisplayName" . "</th>";
        echo "<th>" . "FirstName" . "</th>";
        echo "<th>" . "LastName" . "</th>";
        echo "<th>" . "Licenses" . "</th>";
        echo "<th>" . "UserPrincipalName" . "</th>";
        echo "<th>" . "WhenCreated" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["DisplayName"].  "</td>";
        echo "<td>" . $row["FirstName"].  "</td>";
        echo "<td>" . $row["LastName"]. "</td>";
        echo "<td>" . $row["Licenses"]. "</td>";
        echo "<td>" . $row["UserPrincipalName"]. "</td>";
        echo "<td>" . $row["WhenCreated"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
	</div>
	<!-- How many Emails per Domain-->
<h1 align="center">Emails Per Domain</h1>
<table >
	<?php
    include "connect.php";
    // column
    echo "<tr>";
	echo "<th>" . "Domain" . "</th>";
	echo "<th>" . "Licenses" . "</th>";
    echo "</tr>";
    // output each row from the database
    echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%nehds.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@nehds.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%amiboston.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@amiboston.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%acranommasonry.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@acranommasonry.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%flombardo@fmonarcamasonry.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "Monarca Enterprises" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%fmonarcamasonry.com%' and UserPrincipalName not like '%flombardo@fmonarcamasonry.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@fmonarcamasonry.com " . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%ewsystems.net%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@ewsystems.net " . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%wallingfordha.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@wallingfordha.com " . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%romaniakenworthy.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@romaniakenworthy.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%gillislawfirm.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@gillislawfirm.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%finalmileleasing.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@finalmileleasing.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%network355.net%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@network355.net" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%acfnet.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@acfnet.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%tpaddictiontreatment.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@tpaddictiontreatment.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%imcinternet.net%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@imcinternet.net" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%commercialfoundry.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@commercialfoundry.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%northhavenha.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@northhavenha.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%familybusinessinsurance.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@familybusinessinsurance.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%hawkeye1.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@hawkeye1.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%billerassociates.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@billerassociates.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%vrnutmeg.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@vrnutmeg.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%jjfinc.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@jjfinc.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%mettlerrealty.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@mettlerrealty.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%mabarchitect.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@mabarchitect.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%oakleafconsultants.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@oakleafconsultants.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%sylvanct.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@sylvanct.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
	echo "<tr>";
		$sql = "select count(Licenses) num from ms365 where Licenses like '%e%' and UserPrincipalName like '%wynnelawllc.com%'";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc();
		echo "<td>" . "@wynnelawllc.com" . "</td>";
		echo "<td>" . $row["num"] . "</td>";
    echo "</tr>";
?>

</table >
	<!--Unlicensed Emails-->
<h1 align="center">Unlicensed Emails</h1>
    <div style="overflow-y: auto; height: 800px; border: 2px solid grey;margin-left: 25%;margin-right: 25%;">
<table >
	<?php
	$sql = "SELECT count(*) total from ms365 where Licenses not like '%e%' and UserPrincipalName not like '%onmicrosoft%'";
    $result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	echo "<tr>";
	echo "<th>" . "Total Emails" . "</th>";
	echo "<th>" . $row["total"] . "</th>";
	echo "</tr>";
	
    include "connect.php";
    $sql = "SELECT * from ms365 where Licenses not like '%e%' and UserPrincipalName not like '%onmicrosoft%'";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "DisplayName" . "</th>";
        echo "<th>" . "UserPrincipalName" . "</th>";
        echo "<th>" . "WhenCreated" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["DisplayName"].  "</td>";
        echo "<td>" . $row["UserPrincipalName"]. "</td>";
        echo "<td>" . $row["WhenCreated"]. "</td>";
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