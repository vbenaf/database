<?php
// set server,db,username and password to connect to database
$servername = "localhost";
$database = "municipis";
$username = "root";
$password = "";
$goodConnection = false;

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

//Set the encoode to UTF8
mysqli_set_charset($conn, 'utf8');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //if the connection is successfully then get the 'comarca'
    echo "STATE OF DATABASE CONNECTION: Connected successfully";
    $goodConnection = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table style="border:1px solid black">
        <th>CODI</th>
        <th>MUNICIPI</th>
        <?php
        if ($goodConnection) {
            $sql = $conn->query("SELECT * FROM municipi");
            while ($fila = $sql->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='border:1px solid black'>";
                echo "<a>$fila[id]</a>";
                echo "</td>";
                echo "<td style='border:1px solid black'>";
                echo "<a href='$fila[link]'>$fila[nom]</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>