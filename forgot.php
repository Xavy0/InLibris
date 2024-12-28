<!DOCTYPE html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assume you have a function to verify username and password
    if (verify_user($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username']; // Set session variable
        header("Location: index.php"); 
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>
<html>
  <head>
    <title>In Libris</title>
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>

    <!-- Navigation Bar -->
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
                    <li><a href="login.php" class="signup-btn">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="bg-collage">
  <section class="container-wrapper">
    <div class="container" id="container">

      <div class="form-container sign-in">
      <form action="changePassword.php" method="POST">
    <h1>Forgot Password</h1>
    <div class="social-icons">
        <a href="#" class="icon"><i class='bx bxl-google-plus'></i></a>
        <a href="#" class="icon"><i class='bx bxl-facebook'></i></a>
        <a href="#" class="icon"><i class='bx bxl-vk'></i></a>
        <a href="#" class="icon"><i class='bx bxl-linkedin'></i></a>
    </div>
    <span>or use your username and password</span>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="New Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
    <button type="submit">Reset Password</button>
</form>

      </div>


      <div class="toggle-container">
        <div class="toggle">

            <div class="toggle-panel toggle-right">
            <h1>Forgot Your Password?</h1>
            <p>To regain access, please enter your registered username, and we'll help you reset your password.</p>
            <img src="In Libris library logo.png" alt="Logo" class="centered-logo">           
                Already Change the Pasword? <button class="hidden" id="register"> <a href="Login.php">Back to login</a></button>
            </div>
        </div>
      </div>
    </div>
  </section>
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

</script>

  </body>
</html>
