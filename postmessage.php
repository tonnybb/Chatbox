<html>
<body>

<?php
// load database configuration file 
require_once('config.php'); 

// Create database connection connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br />";

// Build INSERT statement
$query = 'INSERT INTO chat(posted_on, user_name, message) ' . 'VALUES (DATE_FORMAT(NOW(),"%h:%i %p"), "' . $_POST["username"] . '" , "' . $_POST["message"] . '")'; 

// execute the SQL query 
if ($conn->query($query) === TRUE) {
    echo "New record created successfully <br />";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

?>

</body>
</html>