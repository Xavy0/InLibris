<?php
require "connect.php"; // Include your database connection file
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];

// Fetch user data from the database
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Handle profile updates and password change
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve and sanitize form inputs
    $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $birthdate = mysqli_real_escape_string($con, $_POST["birthdate"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    
    // Handle profile image upload
    $profile_image = $user["profile_image"]; // Keep existing image if no new one is uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_image_name = $_FILES['profile_picture']['name'];
        $profile_image_tmp = $_FILES['profile_picture']['tmp_name'];
        $profile_image_ext = pathinfo($profile_image_name, PATHINFO_EXTENSION);
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($profile_image_ext), $allowed_exts)) {
            // Remove old image if it exists
            if ($profile_image && file_exists($profile_image)) {
                unlink($profile_image); // Delete the old profile image from the server
            }
            // Save new image
            $profile_image = 'uploads/' . uniqid() . '.' . $profile_image_ext;
            if (!move_uploaded_file($profile_image_tmp, $profile_image)) {
                echo "<script>alert('Error: Unable to upload profile image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid image format. Only JPG, PNG, and GIF files are allowed.');</script>";
        }
    }

    // Update the user information in the database
    $updateQuery = "UPDATE users SET firstname='$firstname', lastname='$lastname', gender='$gender', birthdate='$birthdate', email='$email', profile_image='$profile_image' WHERE username='$username'";
    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Account updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not update account information.');</script>";
    }

    // Handle password update if password fields are filled
    $new_password = mysqli_real_escape_string($con, $_POST["new_password"]);
    $confirm_password = mysqli_real_escape_string($con, $_POST["confirm_password"]);

    if (!empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            // Update the password directly in the database
            $updatePasswordQuery = "UPDATE users SET password='$new_password' WHERE username='$username'";
            if (mysqli_query($con, $updatePasswordQuery)) {
                echo "<script>alert('Password updated successfully!');</script>";
            } else {
                echo "<script>alert('Error: Could not update password. " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match.');</script>";
        }
    }

    // Redirect to the same page after updates
    header("refresh: 0; url=info.php");
    exit;
}
// Handle account deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_account'])) {
    // Delete the user's profile image from the server if it exists
    if ($user['profile_image'] && file_exists($user['profile_image'])) {
        unlink($user['profile_image']);
    }

    // Delete user data from the database
    $deleteQuery = "DELETE FROM users WHERE username='$username'";

    if (mysqli_query($con, $deleteQuery)) {
        // Unset session and redirect to login page after deletion
        session_unset();
        session_destroy();
        echo "<script>alert('Account deleted successfully!'); window.location = 'login.php';</script>";
    } else {
        echo "<script>confirm('Error: Could not delete account.');</script>";
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html>
  <head>
    <title>In Libris</title>
    <link rel="stylesheet" type="text/css" href="info.css">
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
<div class="info">
<img src="In Libris library logo.png" alt="Logo" class="centered-logo"><br><br><br><br>
<h1>TELL US ABOUT<br>YOURSELF</h1><br><br><br>
<p>Our website uses this information to verify<br>
your identity and to keep our community safe</p>
</div>


    <!-- Mission and Vision Section -->
    <div class="mission-vision-section">
    <div class="account-container">

        <h1>Personal Details</h1>
        <?php if ($user['profile_image'] && file_exists($user['profile_image'])): ?>
            <img src="<?php echo $user['profile_image']; ?>" alt="Profile Image">
        <?php else: ?>
            <p>No profile image uploaded.</p><br><br>
        <?php endif; ?>
        <form id="profileForm" action="info.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>
    </div>

    <div class="form-row">
        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male" <?php if ($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select>

        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" value="<?php echo htmlspecialchars($user['birthdate']); ?>" required>
    </div>

    <div class="form-row">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="profile_picture">Profile Picture:</label>
        <input type="file" name="profile_picture" accept="image/*">
    </div>

    <div class="form-row">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" >

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" >
    </div>


    <button type="submit" name="update">Change</button>
</form>


<!-- Modify toggle button to include password functionality -->
<button id="toggleButton" onclick="toggleForms()"></button>



        <div id="infoDisplay">
    <h2>Your Information</h2>
    <p>First Name: <?php echo htmlspecialchars($user['firstname']); ?></p>
    <p>Last Name: <?php echo htmlspecialchars($user['lastname']); ?></p>
    <p>Gender: <?php echo htmlspecialchars($user['gender']); ?></p>
    <p>Birthdate: <?php echo htmlspecialchars($user['birthdate']); ?></p>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Password: <?php echo htmlspecialchars($user['password']); ?></p>
    <form action="info.php" method="POST">
        <button type="submit" name="delete_account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">Delete Account</button>
    </form>
</div>
    </div>
</div>


</section>
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
// Grab elements
const profileForm = document.getElementById('profileForm');
const infoDisplay = document.getElementById('infoDisplay');
const toggleButton = document.getElementById('toggleButton');
const passwordFormDisplay = document.getElementById('passwordFormDisplay');

// Add toggle functionality to switch between forms and user info
function toggleForms() {
    if (profileForm.style.display === 'none') {
        profileForm.style.display = 'block'; // Show the profile form
        infoDisplay.style.display = 'none'; // Hide the information display
        passwordFormDisplay.style.display = 'block'; // Show the password form
        toggleButton.textContent = 'Back'; // Change button text to 'Back'
    } else {
        profileForm.style.display = 'none'; // Hide the profile form
        infoDisplay.style.display = 'block'; // Show the information display
        passwordFormDisplay.style.display = 'none'; // Hide the password form
        toggleButton.textContent = 'Edit'; // Change button text back to 'Edit Info'
    }
}

// Initialize the default view
window.onload = function () {
    profileForm.style.display = 'none'; // Start with the form hidden
    infoDisplay.style.display = 'block'; // Show user information by default
    toggleButton.textContent = 'Edit'; // Set button text for initial state
};

// Logout confirmation
function logout() {
    if (confirm("Do you really want to log out?")) {
        window.location = "tologout.php";
    }
}

</script>

</body>
</html>
