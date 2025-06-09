<?php
session_start();
$conn = new mysqli("localhost", "root", "", "helping_paws");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "You must log in to submit a request.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $details = $_POST['details'];

    $stmt1 = $conn->prepare("INSERT INTO adoption_requests ( id, name, location, details) VALUES (?, ?, ?, ?)");
    $stmt1->bind_param("isss", $id, $name, $location, $details);

    $stmt2 = $conn->prepare("INSERT INTO requests ( id, name, location, details) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("isss", $id, $name, $location, $details);

    if ($stmt1->execute() && $stmt2->execute()) {
        echo "Rescue request submitted successfully!";
    } else {
        echo "Error submitting request.";
    }

    $stmt1->close();
    $stmt2->close();
    $conn->close();
}
?>
