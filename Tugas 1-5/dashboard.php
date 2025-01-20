<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: signup_option.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestApp-Welcome</title>
    <link rel="stylesheet" href="assets/style.css"/>
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css" />
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="asset/insight.png" alt="VoluntApp Logo">
        </div>
        <div class="title">Welcome, <?= htmlspecialchars($_SESSION['name']) ?></div>
        <div class="subtitle"><?= htmlspecialchars($_SESSION['email']) ?></div>
        <a href="logout.php" class="button">Logout</a>
    </div>

    <footer>
    <p>&copy; 2025 Dwiki Nur Setiyanto. All rights reserved.</p>
  </footer>
</body>
</html>