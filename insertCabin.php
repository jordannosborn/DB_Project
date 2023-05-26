<?php


// function to insert cabin
function insertCabin(){
    //$dbName = "epiz_33158280_sunnyspot"; 
    //$serverName = "localhost"; 
    //$serverUser = "epiz_33158280"; 
    //$serverPassword = "Shinerpie2006!";
    $dbName = "SunnySpot"; 
    $serverName = "localhost";
    $serverUser = "root";
    $serverPassword = "";
    $conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
    if($conn -> connect_error){
        die("Connection error to $dbName, " . $conn->connect_error);
    }    
    $sql = "INSERT INTO Cabin (cabinType, cabinDescription, pricePerNight, pricePerWeek, photo) VALUES ('{$_POST['cabin-type']}', '{$_POST['cabin-description']}', '{$_POST['price-per-night']}', '{$_POST['price-per-week']}', '{$_POST['photo']}');";

    $result = $conn->query($sql);
}

if(isset($_POST['cabin-type'])){
    if(intval($_POST['price-per-week']) <= 5 * intval($_POST['price-per-night'])){
        insertCabin();
        echo("Record has been inserted");
    } else 
        echo("Price per week cannot be more than 5 times price per night");
}

?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunnspot Accommodation</title>
    <link href="https://fonts.googleapis.com/css?family=Quando&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <header> <img src="images/accommodation.png" alt="Accommodation">
    <h1>Administration Menu</h1>
  </header>

  <h2 style="text-align:center;">Insert a cabin</h2>
        <form action="insertCabin.php" method="POST"> 
            <!-- Cabin type -->
                <label>Cabin type: </label>
                <input type="text" id="cabin-type" name="cabin-type">

    
            <!-- Cabin description -->
                <label>Cabin description: </label>
                <input type="text" id="cabin-description" name="cabin-description">
    
            <!-- Price per night -->
                <label>Price per night: </label>
                <input type="text" id="price-per-night" name="price-per-night">
    
            <!-- Price per week -->
                <label>Price per week</label>
                <input type="text" id="price-per-week" name="price-per-week">

            <!-- Photo -->
                <label>Photo: </label>
                <input type="text" id="photo" name="photo">

            <button id="row">Insert cabin</button>
        </form>

    <a href="index.php"><h2>All cabins</h2>
    <a href="admin/processLogin.php"><h2>Menu</h2>

  <footer> 
    <a href="admin/login.php">Admin</a> 
    <a href="index.php">Home</a> 
  </footer>
</body>
</html>