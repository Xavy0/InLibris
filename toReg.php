<?php
require "connect.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $birthdate = mysqli_real_escape_string($con, $_POST["birthdate"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    // Ensure all fields are filled
    if (empty($firstname) || empty($lastname) || empty($gender) || empty($birthdate) || empty($email) || empty($username) || empty($password)) {
        echo "<script>alert('Please fill all the fields.');</script>";
        header("refresh: 0; url=Login.php");
        exit;
    }

    // Check if email or username already exists
    $checkQuery = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $result = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email or username already exists. Please choose another.');</script>";
        header("refresh: 0; url=Login.php");
        exit;
    }

    // Insert user data into the database
    $query = "INSERT INTO users (firstname, lastname, gender, birthdate, email, username, password) 
              VALUES ('$firstname', '$lastname', '$gender', '$birthdate', '$email', '$username', '$password')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Registration successful! Please log in.');</script>";
        header("refresh: 0; url=Login.php");
    } else {
        echo "<script>alert('Error: Could not register user.');</script>";
        header("refresh: 0; url=Login.php");
    }

    // Close the connection
    mysqli_close($con);
}
?>
