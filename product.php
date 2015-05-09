<?php
$servername = "localhost";
$username = "root";
$password = "mysql94";
$dbname = "grocery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT product_key, description FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "key: " . $row["product_key"] . " description: " . $row["description"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>