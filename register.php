<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname     = $_POST['fullname'];
    $college_name = $_POST['college_name'];
    $college_id   = $_POST['college_id'];
    $branch       = $_POST['branch'];
    $year         = $_POST['year'];
    $username     = $_POST['username'];
    $password     = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, college_name, college_id, branch, year, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $college_name, $college_id, $branch, $year, $username, $password);

    if ($stmt->execute()) {
        // Save details in session
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;

        // 🔹 Redirect to your main site page
        header("Location: homepage.php");  
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
