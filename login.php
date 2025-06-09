<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helping_paws";

// DB connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Input values
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Fetch user including is_admin
$sql = "SELECT id, name, password, is_admin FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $name, $hashed_password, $is_admin);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['is_admin'] = $is_admin;

        // Redirect based on role
        if ($is_admin == 1) {
            header("Location: admin_panel.php");
        } else {
            header("Location: loggedin.php");
        }
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ Email not registered.";
}

$stmt->close();
$conn->close();
?>
