<?php
// connect to database 
//$dbName = "epiz_33158280_sunnyspot"; 
//$serverName = "localhost"; 
//$serverUser = "epiz_33158280"; 
//$serverPassword = "";

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

  <section>
        <?php foreach ($array as $cabin) : ?>

        <article>
            <h2><?php echo $cabin[1] ?></h2>
            <img src="images/<?php echo $cabin[5] ?>" alt="<?php echo $cabin[1] ?>">
            <p><span>Details: </span><?php echo $cabin[2] ?></p>
            <p><span>Price per night: </span><?php echo $cabin[3] ?></p>
            <p><span>Price per week: </span><?php echo $cabin[4] ?></p>
        </article>

        <?php endforeach; ?>
  </section>
  
  <footer> 
    <a href="admin/login.php">Admin</a> 
    <a href="index.php">Home</a> 
  </footer>
</body>
</html>
