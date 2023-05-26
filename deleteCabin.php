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

function deleteCabin(){
    $dbName = "SunnySpot"; 
    $serverName = "localhost"; 
    $serverUser = "root"; 
    $serverPassword = ""; 
    $conn = new mysqli($serverName, $serverUser, $serverPassword, $dbName);
    if($conn -> connect_error){
        die("Connection error to $dbName, " . $conn->connect_error);
    }

    $id = intval($_POST['id']);
    $sql = "DELETE FROM Cabin WHERE cabinID = {$id};";
    $result = $conn->query($sql);
}

if(isset($_POST['id'])){
    deleteCabin();
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

  <h2 style="text-align:center;">Delete cabin</h2>

        <?php foreach ($array as $cabin) : ?>
        <div>
            <form action="deleteCabin.php" method="POST"> 
                <input type="hidden" id="id" name="id" value="<?php echo $cabin[0] ?>">

                    <p><?php echo $cabin[1] ?></p>

                <button id="row">Delete cabin</button>
            </form>
        </div>

        <?php endforeach; ?>

    <a href="index.php"><h2>All cabins</h2>
    <a href="admin/processLogin.php"><h2>Menu</h2>
  
  <footer> 
    <a href="admin/login.php">Admin</a> 
    <a href="index.php">Home</a> 
  </footer>
</body>
</html>
