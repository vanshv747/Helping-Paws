<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    die("Access Denied");
}

$conn = new mysqli("localhost", "root", "", "helping_paws");

$id = (int)$_GET['id'];
$conn->query("DELETE FROM rescue_requests WHERE id = $id");

header("Location: admin_panel.php");
exit;
?>
