<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Website</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eef2f7;
      padding: 20px;
    }
    .welcome-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="welcome-box">
    <h2>Welcome, <?php echo $_SESSION['fullname']; ?> 🎉</h2>
    <p>You are now registered and logged in to the website.</p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
