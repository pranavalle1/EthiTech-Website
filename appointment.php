<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ethitech"; 

// connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $appointment_time = $_POST["appointment_time"];
    $message = $_POST["message"];

    $sql = "INSERT INTO appointments (fullname, phone, email, appointment_time, message)
    VALUES ('$fullname', '$phone', '$email', '$appointment_time', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html#contact");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
