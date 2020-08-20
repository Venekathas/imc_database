<!DOCTYPE html>
<html>
  
<style> 
input[type=submit] {
  background-color:#4169E1;
  border: groove;
  color: white;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  

}
 table, th, td {
  border: 2px solid blue;

    
</style>
<body>

<!-- Display All Hosts-->
    <h1 align="center">Hosts</h1>
    <table >
<?php
    include "connect.php";
    $sql = "SELECT * from host";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Host ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "DOB" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "City" . "</th>";
        echo "<th>" . "Sex" . "</th>";
        echo "<th>" . "State" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["host_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"]. "</td>";
        echo "<td>" . $row["dob"]. "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["city"]. "</td>";
        echo "<td>" . $row["sex"]. "</td>";
        echo "<td>" . $row["state"]. "</td>";
        echo "<td><a href='deletehost.php?id=".$row['host_ID']."'>Delete</a></td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
   
    
<!-- Search--> 
   <h1 align = "center">Search By Host</h1>
    <h2 align = "center"> by using :name, id, state, sex, city</h2>
    <form action="" method="post" align="center">
            <input type="text" name="lookup">
            <input type="submit" value="search">
        </form>
    
    <table >
<?php
    
if(isset($_POST['lookup'])){
include "connect.php";
$input = $_POST['lookup'];
    
//search host information
$sql = "SELECT * FROM host WHERE host.host_ID LIKE '%$input%' or host.fname LIKE '%$input%' or host.lname LIKE '%$input%' or host.state LIKE '%$input%' or host.sex LIKE '%$input%' or host.city LIKE '%$input%' GROUP BY host.host_ID " ;
$result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Host ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "DOB" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "City" . "</th>";
        echo "<th>" . "Sex" . "</th>";
        echo "<th>" . "State" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["host_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"]. "</td>";
        echo "<td>" . $row["dob"]. "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["city"]. "</td>";
        echo "<td>" . $row["sex"]. "</td>";
        echo "<td>" . $row["state"]. "</td>";
        echo "</tr>";     
    }
} else {
    echo "0 results";
}
}
?>
    </table>
    
<!-- All records with amount collected-->
<h1 align = "center">Amount Collected By Host</h1>
<table >
<?php
    $sql = "SELECT DISTINCT host.host_ID, host.fname, host.lname, host.dob , host.address , host.city, host.sex, .host.state, sum(amount) as amount FROM donation INNER JOIN events ON donation.event_ID = events.event_ID INNER JOIN host ON host.host_ID = events.host_ID inner join venue ON venue.venue_ID = events.venue_ID inner join charity on charity.charity_ID = events.charity_ID group by host.host_ID ORDER BY amount DESC";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Host ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "Amount Collected" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<td>" . $row["host_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"]. "</td>";
        echo "<td>" . $row["amount"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>

 <form action="index.php">
 <input type="submit" value="Back" />
</form>
    
</body>
</html>

