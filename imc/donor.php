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
    <!-- Display All Donors-->
<h1 align="center">Donor Information</h1>
<table >
    <?php
    include "connect.php";
    $sql = "SELECT * from donor";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Donor ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "City" . "</th>";
        echo "<th>" . "State" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["donor_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"].  "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["city"]. "</td>";
        echo "<td>" . $row["state"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}

?>
    </table>
    
<!-- Search Donor Information--> 
   <h1 align = "center">Search By Donor</h1>
    <h2 align = "center"> by using :Name, ID, Address, City, State </h2>
    <form action="" method="post" align="center">
            <input type="text" name="lookup">
            <input type="submit" value="search">
        </form>
    
    <table >
<?php
    
if(isset($_POST['lookup'])){
include "connect.php";
$input = $_POST['lookup'];
    

$sql = "SELECT * FROM donor WHERE donor.fname LIKE '%$input%' or donor.lname LIKE '%$input%' or donor.donor_ID LIKE '%$input%' or donor.address LIKE '%$input%' or donor.city LIKE '%$input%' or donor.state LIKE '%$input%' GROUP BY donor.donor_ID";
$result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Donor ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "City" . "</th>";
        echo "<th>" . "State" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["donor_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"].  "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["city"]. "</td>";
        echo "<td>" . $row["state"]. "</td>";
        echo "</tr>";    
    }
} else {
    echo "0 results";
}
}
?>
    </table>
<!-- Display All records with amount donated-->
<h1 align="center">Donation Amount for each Donor</h1>

    <table >
    <?php
    include "connect.php";
    $sql = "SELECT DISTINCT donor.donor_ID, donor.fname, donor.lname, donor.address, events.event_ID, charity.name , sum(amount) as amount FROM donation INNER JOIN events ON donation.event_ID = events.event_ID inner join venue ON venue.venue_ID = events.venue_ID inner join charity on charity.charity_ID = events.charity_ID inner join donor on donor.donor_ID = donation.donor_ID group by donor.donor_ID ORDER BY amount desc";
    $result = $mysqli->query($sql);
    
if ($result->num_rows > 0) {
    // column
    echo "<tr>";
        echo "<th>" . "Donor ID" . "</th>";
        echo "<th>" . "First Name" . "</th>";
        echo "<th>" . "Last Name" . "</th>";
        echo "<th>" . "Address" . "</th>";
        echo "<th>" . "Event Donated To" . "</th>";
        echo "<th>" . "Organization Hosting the Event" . "</th>";
        echo "<th>" . "Amount Donated" . "</th>";
        echo "</tr>";
    // output each row from the database
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["donor_ID"].  "</td>";
        echo "<td>" . $row["fname"].  "</td>";
        echo "<td>" . $row["lname"].  "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["event_ID"]. "</td>";
        echo "<td>" . $row["name"]. "</td>";
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