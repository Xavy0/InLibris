<?php
require "connect.php"; // Include your database connection file
session_start();


mysqli_close($con);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>In Libris</title>
    <link rel="stylesheet" type="text/css" href="Aboutus.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>

  <body>
    <div>

    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="container">
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


<!-- Main content (Login + Mission Vision) -->
<div id="bg-collage">
<div class="cover">
<section class="main-content">


    <!-- Mission and Vision Section -->
    <div class="mission-vision-section">
    <div class="account-container">

    <h1>Vision</h1><br><br><br>
<p>To create a vibrant and inclusive virtual library that inspires a lifelong love for reading, <br>
    empowers learning, and connects individuals through the transformative power of books.</p>
    </div>
</div>

    <!-- Mission and Vision Section -->
    <div class="mission-vision-section">
    <div class="account-container">

    <h1>Mission</h1><br><br><br>
<p>Our mission is to provide a comprehensive and user-friendly platform <br>
    where readers can explore, share, and contribute to a growing collection of books. <br>
    We aim to foster a vibrant community of book enthusiasts by promoting accessibility, <br>
    diversity, and collaboration in the pursuit of knowledge and imagination.</p>
    </div>
</div>

</section>

</div>
<div class="About">
    <div class="account-container">

    <h1>About Us</h1><br><br><br>
<p>Welcome to our library collection, your online haven for book lovers, lifelong learners, <br>
    and curious minds! This is a platform meant to unite readers from all walks of life by offering <br>
    space to explore, add to, and enjoy the richest variety of books.</p><br>
<p>We believe in the magic of stories and knowledge that transforms lives, brings people closer, and <br>
    changes perspectives. If you're searching for your next great read, want to share your favorites <br>
    with a friend, or build out your personal digital library, our online space is designed to ease and <br>
    inspire the journey.</p><br>
    <p>Let us be able to form a lively community, wherein books cross the barriers of one's self and evoke <br>
        thought-provoking conversations. With one heart and all, let us build that library of learning and discovery!</p>
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

  <script>


// Logout confirmation
function logout() {
    if (confirm("Do you really want to log out?")) {
        window.location = "tologout.php";
    }
}

</script>

</body>
</html>
