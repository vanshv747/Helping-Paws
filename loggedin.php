<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: animals.php"); // Redirect to main if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome - Helping Paws</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: lightgoldenrodyellow;
            padding: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background: lightseagreen;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .card a:hover {
            background: teal;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>Your ID: <?php echo $_SESSION['user_id']; ?></p>

        <a href="logout.php">Logout</a>

        <h3>Services</h3>
        <a href="rescue.php">Animal Rescue</a>
        <a href="treatment.php">Medical Treatment</a>
        <a href="adoption.php">Adoption Services</a>
        <a href="view_requests.php">View Requests</a>        
    </div>
</body>
</html>
