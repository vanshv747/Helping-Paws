<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helping_paws";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize inputs
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$sql = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Email already registered.";
} else {
    // Insert user
    $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $name, $email, $hashed_password);
    if ($insert->execute()) {
        echo "Signup successful!";
        echo "<br><br><a href='animals.php'><button>Go Back</button></a>";

    } else {
        echo "Error: " . $insert->error;
    }
    $insert->close();
}

$stmt->close();
$conn->close();
?>
