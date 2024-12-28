<?php
session_start();
include('connect.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the book title and image from the form
    $book_title = $_POST['book_title'];
    $book_image = $_POST['book_image'];

    // Prepare the SQL query to insert the book into the database
    $query = "INSERT INTO books (title, image_path) VALUES (?, ?)";
    $stmt = $con->prepare($query);

    // Bind parameters and execute the query
    $stmt->bind_param("ss", $book_title, $book_image);
    if ($stmt->execute()) {
        // Set a session variable to store the success message
        $_SESSION['success_message'] = "Book successfully added to your collection!";
    } else {
        // Set a session variable to store the error message
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();

    // Redirect to collection.php
    header("Location: collection.php");
    exit;
}
?>
