<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "complaint_management_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$complaint = $_POST['complaint'];
}


// Insert complaint into database
$sql = "INSERT INTO `complaints` (name, email, department, complaint) VALUES ('$name', '$email', '$department', '$complaint')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Complaint submitted successfully!');</script>";
    header('location:view_complaints.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
