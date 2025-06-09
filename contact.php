<?php
$server = "localhost";
$username = "root";
$password = "";
$dbName = "helping_paws";

$conn = new mysqli($server, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    $imagePath = NULL;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $filename = basename($_FILES["image"]["name"]);
        // Clean filename and add timestamp to avoid collisions
        $filename = time() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", $filename);
        $targetFile = $targetDir . $filename;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($_FILES['image']['type'], $allowedTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
            } else {
                die("Error: Could not move uploaded file.");
            }
        } else {
            die("Error: Only JPG, PNG, and GIF images are allowed.");
        }
    } else {
        // No image uploaded or upload error (optional image allowed)
        $imagePath = NULL;
    }

    // Prepare and execute query securely
    $stmt = $conn->prepare("INSERT INTO contact (name, mobile, message, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $mobile, $message, $imagePath);

    if ($stmt->execute()) {
        echo "<p>Request submitted successfully!</p>";
        echo '<button onclick="window.history.back()" style="padding:10px 20px; background-color:lightseagreen; color:white; border:none; border-radius:5px;">Go Back</button>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
