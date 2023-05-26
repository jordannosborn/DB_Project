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
    echo $startTable;
    while($record = $result->fetch_array())
    {
        array_push($array, $record); 
    }
}
else
    echo "no results";

function updateCabin(){
    $dbName = "SunnySpot"; 
    $serverName = "localhost"; 
    $serverUser = "root"; 
    $serverPassword = ""; 
    $conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
    if($conn -> connect_error){
        die("Connection error to $dbName, " . $conn->connect_error);
    }

    $id = intval($_POST['id']);
    $sql = "UPDATE Cabin SET cabinType='{$_POST['cabin-type']}', cabinDescription='{$_POST['cabin-description']}', pricePerNight='{$_POST['price-per-night']}', pricePerWeek='{$_POST['price-per-week']}', photo='{$_POST['photo']}' WHERE cabinID={$id};";

    $result = $conn->query($sql);
}

if(isset($_POST['cabin-type'])){
    if(intval($_POST['price-per-week']) <= 5 * intval($_POST['price-per-night'])){
        updateCabin();
    }
    else
    echo("price per week cannot be more than 5 times price per night");
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
    <h1>Sunnyspot Accomodation</h1>
  </header>

  <h2 style="text-align:center;">Update cabin</h2>
  <section>
        <?php foreach ($array as $cabin) : ?>
        <form action="updateCabin.php" method="POST"> 
            <input type="hidden" id="id" name="id" value="<?php echo $cabin[0] ?>">

            <!-- Cabin type -->
                <label>Cabin type: </label>
                <input type="text" id="cabin-type" name="cabin-type" value="<?php echo $cabin[1] ?>">

    
            <!-- Cabin description -->
                <label>Cabin description: </label>
                <input type="text" id="cabin-description" name="cabin-description" value="<?php echo $cabin[2] ?>">
    
            <!-- Price per night -->
                <label>Price per night: </label>
                <input type="text" id="price-per-night" name="price-per-night" value="<?php echo $cabin[3] ?>">
    
            <!-- Price per week -->
                <label>Price per week</label>
                <input type="text" id="price-per-week" name="price-per-week" value="<?php echo $cabin[4] ?>">

            <!-- Photo -->
                <label>Photo: </label>
                <input type="text" id="photo" name="photo" value="<?php echo $cabin[5] ?>">

            <button id="row">Update cabin</button>
        </form>

        <?php endforeach; ?>
  </section>

  <a href="index.php"><h2>All cabins</h2>
  <a href="admin/processLogin.php"><h2>Menu</h2>
  
  <footer> 
    <a href="admin/login.php">Admin</a> 
    <a href="index.php">Home</a> 
  </footer>
</body>
</html>
