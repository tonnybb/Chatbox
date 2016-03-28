<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
// load database configuration file 
require_once('config.php'); 

// Establish database connection
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

// Build query. Get total number of rows in database
$sql = "SELECT * FROM chat";
// Execute query
$result = mysqli_query($con, $sql);
// Assign the value for the total number of rows to $totalRows
$totalRows = mysqli_num_rows($result);


// Build query. Get 20 last entries from database
if ($totalRows > 20) {
	$sql = "SELECT posted_on, user_name, message FROM chat WHERE chat_id >= " . $totalRows . "-19";
} else {
	$sql = "SELECT posted_on, user_name, message from chat";
}

// Execute SQL query
$result = mysqli_query($con,$sql);

//Echo database rows
while($row = mysqli_fetch_array($result)) {
    echo $row['posted_on'] . " <b>" . $row['user_name'] . "</b>: " . $row['message'] . "<br/>";
}

// Close the database connection
mysqli_close($con);
?>
</body>
</html>