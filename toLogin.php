<?php
require "connect.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Ensure fields are not empty
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill both username and password.');</script>";
        header("refresh: 0; url=login.php");
        exit;
    }

    // Check if the username exists
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        session_start();
        $_SESSION["username"] = $username; // Store session variable for username
        header("Location: index.php"); // Redirect to homepage
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
        header("refresh: 0; url=login.php");
    }

    // Close the connection
    mysqli_close($con);
}
?>
