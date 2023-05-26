<?php
// connect to database 
//$dbName = "epiz_33158280_sunnyspot"; 
//$serverName = "localhost"; 
//$serverUser = "epiz_33158280"; 
//$serverPassword = "Shinerpie2006!";

$dbName = "SunnySpot"; 
$serverName = "localhost";
$serverUser = "root";
$serverPassword = "";

// function to display cabin details
$conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
if($conn -> connect_error){
    die("Connection error to $dbName, " . $conn->connect_error);
}    
$cabinSqlStmt = "SELECT * from Cabin";

$result = $conn->query($cabinSqlStmt);
$array = array();
if($result->num_rows > 0){
    while($record = $result->fetch_array())
    {
        array_push($array, $record); 
    }
}
else
    echo "no results";

function login(){
    $dbName = "SunnySpot"; 
    $serverName = "localhost"; 
    $serverUser = "root"; 
    $serverPassword = ""; 
    $conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
    if($conn -> connect_error){
        die("Connection error to $dbName, " . $conn->connect_error);
    }

    $sql = "SELECT password FROM Admin WHERE userName = '{$_POST['username']}'";

    $result = $conn->query($sql);
    $user = $result->fetch_array();

    if($_POST['password'] == $user[0]){
        header("Location: processLogin.php");
    }
    else{
        echo("incorrect password");
    }

}

if(isset($_POST['username'])){
    login();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Accommodation</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <header> <img src="../images/accommodation.png" alt="Accommodation">
    <h1>Sunnyspot Accomodation</h1>
  </header>

  <h2 style="text-align:center;">Login</h2>
  <section>
        <form action="login.php" method="POST"> 

            <!-- Username -->
                <label>Username: </label>
                <input type="text" id="username" name="username" value="jordannosborn">

    
            <!-- Password -->
                <label>Password</label>
                <input type="password" id="password" name="password">

            <button id="row">Login</button>
        </form>
  </section>
  
  <footer> 
    <a href="login.php">Admin</a> 
    <a href="../index.php">Home</a> 
  </footer>
</body>
</html>
