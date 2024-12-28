<?php
// Include the database connection file
include('connect.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the data from the form
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_image = $_POST['book_image'];

    // Update query to modify the book's details
    $update_query = "UPDATE books SET title = '$book_title', image_path = '$book_image' WHERE id = $book_id";

    if ($conn->query($update_query) === TRUE) {
        echo "Book updated successfully!";
        header('Location: index.php'); // Redirect to the main page to show the updated list
    } else {
        echo "Error: " . $con->error;
    }
}

// Close the database connection
$con->close();
?>
