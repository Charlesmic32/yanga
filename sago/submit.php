<?php
// Establish a connection to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "tracking";

$conn = new mysqli($servername, $username, $password, $tracking);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the data for a specific student (assuming you have a student ID)
$studentId = $_GET['id'];

$sql = "SELECT * FROM student_files WHERE student_id = '$studentId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $fileType = $row['file_type'];
  $fileStatus = $row['file_status'];
} else {
  echo "No data found for the student ID: $studentId";
}

$conn->close();
?>

