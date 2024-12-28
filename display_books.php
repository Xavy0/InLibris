<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
// Include the database connection file
include('connect.php');

// Fetch all books from the database
$query = "SELECT * FROM books";
$result = $con->query($query);

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM books WHERE id = $delete_id";
    if ($con->query($delete_query) === TRUE) {
        echo "<script>alert('Book deleted successfully!'); window.location.href = 'display_books.php';</script>";
    } else {
        echo "Error: " . $con->error;
    }
}
// Handle book update
if (isset($_POST['update_book'])) {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_image = $_POST['book_image'];

    $update_query = "UPDATE books SET title = '$book_title', image_path = '$book_image' WHERE id = $book_id";
    
    if ($con->query($update_query) === TRUE) {
        echo "<script>alert('Book updated successfully!'); window.location.href = 'display_books.php';</script>";
    } else {
        echo "<script>alert('Error updating book.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Collection - Edit/Delete</title>
    <link rel="stylesheet" type="text/css" href="display_books.css"> <!-- Link to your stylesheet -->
</head>

<body>

<header>
    <nav class="navbar">
        <div class="containers">
            <br>
            <a href="#" class="logo">In Libris</a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="collection.php">Collection</a></li>
                <li><a href="display_books.php">My Books</a></li>
                <li><a href="Aboutus.php">About Us</a></li>

                <?php if (isset($_SESSION["username"])): ?>
                    <!-- Display Account and Logout buttons if user is logged in -->
                    <li><a href="info.php" class="signup-btn">Account</a></li> <!-- Account button -->
                    <li><a href="#" class="signup-btn" onclick="logout()">Logout</a></li> <!-- Logout button -->
                <?php else: ?>
                    <!-- Display login button if user is not logged in -->
                    <li><a href="Login.php" class="signup-btn">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>
<div id="bg-collage">
    <section>
<div class="container">
    <!-- Add Book Section (Top of the Left Section) -->
    <div class="add-book-section">
        <button id="addBookBtn" class="add-btn">Add Book</button>
        <div id="addBookModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h3>Add New Book</h3>
                <form action="add_book.php" method="POST">
                    <label for="book_title">Book Title:</label><br>
                    <input type="text" id="book_title" name="book_title" required><br><br>

                    <label for="book_image">Book Image (URL):</label><br>
                    <input type="text" id="book_image" name="book_image" required><br><br>

                    <button type="submit">Add Book</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Display books in the left column -->
    <div class="books-list">
        <?php
        // Check if there are any books in the database
        if ($result->num_rows > 0) {
            // Loop through the books and display them
            while ($row = $result->fetch_assoc()) {
                $book_id = $row['id'];          // Get the book ID
                $book_title = $row['title'];    // Get the book title
                $book_image = $row['image_path']; // Get the book image path
                echo "
                <div class='book'>
                    <img src='$book_image' alt='$book_title'>
                    <h4>$book_title</h4>
                    <p>ID: $book_id</p>
                    <a href='?edit_id=$book_id' class='edit-btn'>Edit</a>
                    <a href='?delete_id=$book_id' class='delete-btn'>Delete</a>
                </div>";
            }
        } else {
            echo "No books found!";
        }
        ?>
    </div>

<?php
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $edit_query = "SELECT * FROM books WHERE id = $edit_id";
    $edit_result = $con->query($edit_query);

    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
        $book_title = $edit_row['title'];
        $book_image = $edit_row['image_path'];
        echo "
        <!-- Edit Book Modal (Pop-up) -->
        <div id='editBookModal' class='modal' style='display:block;'>
            <div class='modal-content'>
                <span class='close' onclick='closeEditModal()'>&times;</span>
                <h3>Edit Book</h3>
                <form method='POST'>
                    <input type='hidden' name='book_id' value='$edit_id'>
                    <label for='book_id'>Book ID:</label><br>
                    <input type='text' id='book_id' name='book_id' value='$edit_id' readonly><br><br>

                    <label for='book_title'>Book Title:</label><br>
                    <input type='text' id='book_title' name='book_title' value='$book_title' required><br><br>

                    <label for='book_image'>Book Image (URL):</label><br>
                    <input type='text' id='book_image' name='book_image' value='$book_image' required><br><br>

                    <button type='submit' name='update_book'>Update Book</button>
                </form>
            </div>
        </div>";
    }
}
?>
</div>
</div>
</div>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section" id="hours">
            <h3>Library Hours</h3>
            <p>Mon-Fri: 8:00 AM - 5:00 PM </p>
            <p>Saturday : 10:00 AM - 4:00 PM </p>
            <p>Sunday : Closed </p>
        </div>
        <div class="footer-section" id="contact">
            <h3>Contact Us</h3>
            <p>Email: InLibris@gmail.com 
            <p>Phone: (123) 456-7890</p>
            </br></br></br></br>
            <p>&copy; 2024 In Libris. All rights reserved.</p>
        </div>
        <div class="footer-section" id="social-media">

        </div>
    </div>
</footer>

<!-- Close the database connection -->
<?php
$con->close();
?>
</div>
<script>
// Get modals
var addBookModal = document.getElementById("addBookModal");
var editBookModal = document.getElementById("editBookModal");

// Get buttons that open the modals
var addBookBtn = document.getElementById("addBookBtn");

// Get the <span> elements that close the modals
var closeAddModalBtn = document.getElementsByClassName("close")[0];
var closeEditModalBtn = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the add book modal
addBookBtn.onclick = function() {
    addBookModal.style.display = "block";
}

// When the user clicks on <span> (x), close the corresponding modal
closeAddModalBtn.onclick = function() {
    addBookModal.style.display = "none";
}

closeEditModalBtn.onclick = function() {
    editBookModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == addBookModal) {
        addBookModal.style.display = "none";
    } else if (event.target == editBookModal) {
        editBookModal.style.display = "none";
    }
}

// Function for logout confirmation
function logout() {
    var choice = confirm("Do you really want to log out?");
    if (choice == true) {
        window.location = "tologout.php"; // Redirect to logout page if confirmed
    }
}
// Function to close the modal
function closeEditModal() {
    document.getElementById("editBookModal").style.display = "none";
}

// When the user clicks anywhere outside the modal, close it
window.onclick = function(event) {
    var modal = document.getElementById("editBookModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>

</body>
</html>
