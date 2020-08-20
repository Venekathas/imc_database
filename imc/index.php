<!DOCTYPE html>
<html>
  
<style> 
input[type=submit] {
  background-color:#4169E1;
  border: groove;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  

    
}
    
.vertical-menu {
  width: 10%;
  margin-left: 45%;
  overflow-y: auto;
  text-align:center;

}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
  border: solid grey;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #ff0000;
  color: white;
}
.title {
  font-family: "Times New Roman", Times, serif;
  font-size: 50px;
  font-weight: bold;
  color: #cc0000;
  
}
 img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

    
</style>
<body>


<div class = "title"><h1 align="center">IMC Database</h1></div>
<img src="LabTechApp.ico" alt="IMC Logo">
  
<div class="vertical-menu" align="center">
  <a href="clients.php" >Clients</a>
  <a href="locations.php">Locations</a>
  <a href="computers.php">Computers</a>
  <a href="cloudberry.php">Cloudberry Backups</a>
  <a href="malwarebytes.php">Malwarebytes</a>
  <a href="ms365.php" >Microsoft 365 Emails</a> 
  <a href="sentinel.php" >Sentinel One Agents</a>
  <a href="monthlies.php" >Monthlies</a>
</div>
    
    
  


</body>
</html>