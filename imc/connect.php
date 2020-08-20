
<?php
// This file connects to the database
$host = "localhost";
$username="root";
$user_psswd="";
$database_used="imc";
    

$mysqli = new mysqli($host, $username, $user_psswd, $database_used);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>