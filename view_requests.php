<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Access denied. Please log in.";
    exit;
}

$conn = new mysqli("localhost", "root", "", "helping_paws");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Include status in your query
$sql = "SELECT name, location, details, created_at, status FROM requests ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Requests</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f9f9f9; }
        .request-box {
            background: white; border: 1px solid #ccc; border-radius: 10px;
            padding: 15px; margin-bottom: 15px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .status {
            font-weight: bold;
            color: #fff;
            background-color: #888;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
        .status.approved {
            background-color: green;
        }
        .status.pending {
            background-color: orange;
        }
    </style>
</head>
<body>
    <h2>All Requests</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='request-box'>";
            echo "<strong>Name:</strong> " . htmlspecialchars($row['name']) . "<br>";
            echo "<strong>Location:</strong> " . htmlspecialchars($row['location']) . "<br>";
            echo "<strong>Details:</strong> " . nl2br(htmlspecialchars($row['details'])) . "<br>";
            echo "<small><em>Submitted on: " . $row['created_at'] . "</em></small><br>";
            
            // ✅ Show status with color
            $status = htmlspecialchars($row['status']);
            echo "<div class='status $status'>Status: $status</div>";

            echo "</div>";
        }
    } else {
        echo "No requests found.";
    }
    ?>
</body>
</html>
