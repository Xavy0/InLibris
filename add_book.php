<?php
// Include the database connection file
include('connect.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the book title and image URL from the form
    $book_title = $_POST['book_title'];
    $book_image = $_POST['book_image'];

    // Insert the new book into the database
    $query = "INSERT INTO books (title, image_path) VALUES ('$book_title', '$book_image')";

    if ($con->query($query) === TRUE) {
        echo "New book added successfully!";
        header('Location: display_books.php'); // Redirect to the books page after adding
    } else {
        echo "Error: " . $con->error;
    }
}

// Close the database connection
$con->close();
?>
