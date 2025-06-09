<?php
session_start();

// ✅ Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    echo "Access denied. Admins only.";
    exit;
}

$conn = new mysqli("localhost", "root", "", "helping_paws");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Approve request if button clicked
if (isset($_GET['approve_id'])) {
    $approve_id = intval($_GET['approve_id']);
    $update = $conn->prepare("UPDATE requests SET status = 'approved' WHERE id = ?");
    $update->bind_param("i", $approve_id);
    $update->execute();
    echo "<p style='color: green;'>Request ID $approve_id approved!</p>";
    
}

// ✅ Fetch all rescue requests
$sql = "SELECT * FROM requests";
$result = $conn->query($sql);

echo "<h2>Admin Panel - Rescue Requests</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Location</th><th>Details</th><th>Status</th><th>Action</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
    echo "<td>" . htmlspecialchars($row['details']) . "</td>";
    echo "<td>" . $row['status'] . "</td>";

    if ($row['status'] == 'pending') {
        echo "<td><a href='admin_panel.php?approve_id=" . $row['id'] . "'>Approve</a></td>";
    } else {
        echo "<td>✅ Approved</td>";
    }

    echo "</tr>";
}

echo "</table>";

$conn->close();
?>
