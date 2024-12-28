<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['success_message'])) {
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']); // Clear the message after displaying it
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Libris</title>
    <link rel="stylesheet" type="text/css" href="collection.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>

    <!-- Header -->
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
              <li><a href="info.php" class="signup-btn">Account</a></li>
              <li><a href="#" class="signup-btn" onclick="logout()">Logout</a></li>
            <?php else: ?>
              <li><a href="Login.php" class="signup-btn">Login</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Category Section -->
    <section id="collections" class="coll-section">
      <div class="container">
        <h2>Book Categories</h2>
        <p>Explore our wide range of book categories to find your favorite reads.</p>

        <div class="box">
          <div class="container-img">
            <img src="Ref.gif" alt="Reference" class="gif-icon">
            <img src="Ref.png" alt="Reference Static" class="static-icon">
          </div>
          <a href="#" class="button" onclick="handleClick('Reference')">Reference</a>
        </div>

        <div class="box">
          <div class="container-img">
            <img src="fiction.gif" alt="Fiction" class="gif-icon">
            <img src="fiction.png" alt="Fiction Static" class="static-icon">
          </div>
          <a href="#" class="button" onclick="handleClick('Fiction')">Fiction</a>
        </div>

        <div class="box">
          <div class="container-img">
            <img src="Bul.gif" alt="Bulacaniana" class="gif-icon">
            <img src="Bul.png" alt="Bulacaniana Static" class="static-icon">
          </div>
          <a href="#" class="button" onclick="handleClick('E-Bulacaniana')">Bulacaniana</a>
        </div>

        <div class="box">
          <div class="container-img">
            <img src="Fil.gif" alt="Filipiniana" class="gif-icon">
            <img src="Fil.png" alt="Filipiniana Static" class="static-icon">
          </div>
          <a href="#" class="button" onclick="handleClick('Filipiniana')">Filipiniana</a>
        </div>
      </div>
    </section>


          <!-- Collections Section -->
          <section id="collections" class="collections-section">
          <div class="container">
              
<!-- Catalog Section -->
<section id="catalog" class="collections-section">

<h2>Reference</h2>
<div class="book-slider-container">
    <button class="arrow left-arrow" onclick="scrollSlider('top-picks-slider', -1)">&#10094;</button>
    <div id="top-picks-slider" class="book-slider">
<!-- Book 1 -->
<div class="book">
    <img src="STUDENT ATLAS.png" alt="Book 1">
    <h4>Student Atlas</h4>
    <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Student Atlas">
        <input type="hidden" name="book_image" value="STUDENT ATLAS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
</div>
        <!-- Book 2 -->
        <div class="book">
            <img src="Timelines.png" alt="Book 2">
            <h4>Timelines from Indian History</h4>
            <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Timelines from Indian History">
        <input type="hidden" name="book_image" value="Timelines.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
        </div>
        <!-- Book 3 -->
        <div class="book">
            <img src="WAR2.png" alt="Book 3">
            <h4>The World War II Book</h4>
            <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="The World War II Book">
        <input type="hidden" name="book_image" value="WAR2.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
        </div>
        <!-- Book 4 -->
        <div class="book">
            <img src="History.png" alt="Book 4">
            <h4>Smithsonian History of the World Map</h4>
            <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Smithsonian History of the World Map">
        <input type="hidden" name="book_image" value="History.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
        </div>
        <!-- Book 5 -->
        <div class="book">
            <img src="ASYLUM SPEAKERS.png" alt="Book 5">
            <h4>Asylum Speakers</h4>
            <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Asylum Speakers">
        <input type="hidden" name="book_image" value="ASYLUM SPEAKERS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
        </div>
        <!-- Book 6 -->
        <div class="book">
            <img src="HUMAN BODY.png" alt="Book 6">
            <h4>The Human Body</h4>
            <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="The Human Body">
        <input type="hidden" name="book_image" value="HUMAN BODY.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
        </div>
        <!-- Book 1 -->
<div class="book">
    <img src="STUDENT ATLAS.png" alt="Book 1">
    <h4>Student Atlas</h4>
    <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Student Atlas">
        <input type="hidden" name="book_image" value="STUDENT ATLAS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
</div>
    </div>
    <button class="arrow right-arrow" onclick="scrollSlider('top-picks-slider', 1)">&#10095;</button>
</div>

    <h2>Fiction</h2>
    <div class="book-slider-container">
        <button class="arrow left-arrow" onclick="scrollSlider('just-arrived-slider', -1)">&#10094;</button>
        <div id="just-arrived-slider" class="book-slider">

            <div class="book">
            <img src="REWITCHED.png" alt="Rewitched">
                <h4>Rewitched</h4>
    <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Rewitched">
        <input type="hidden" name="book_image" value="REWITCHED.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Tips.png" alt="When the World Tips Over">
                <h4>When the World Tips Over</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="When the World Tips Over">
        <input type="hidden" name="book_image" value="Tips.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Yellow.png" alt="Yellowface">
                <h4>Yellowface</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Yellowface">
        <input type="hidden" name="book_image" value="Yellow.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Green.png" alt="Green Dot">
                <h4>Green Dot</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Green Dot">
        <input type="hidden" name="book_image" value="Green.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Him.png" alt="REMINDERS OF HIM">
                <h4>REMINDERS OF HIM</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="REMINDERS OF HIM">
        <input type="hidden" name="book_image" value="Him.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Dollhouse.png" alt="THE LIBRARY OF LOST DOLLHOUSES">
                <h4>THE LIBRARY OF LOST DOLLHOUSES</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="THE LIBRARY OF LOST DOLLHOUSES">
        <input type="hidden" name="book_image" value="Dollhouse.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Him.png" alt="REMINDERS OF HIM">
                <h4>REMINDERS OF HIM</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="REMINDERS OF HIM">
        <input type="hidden" name="book_image" value="Him.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
                <img src="Timelines.png" alt="Book 2">
                <h4>Timelines from Indian History</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Timelines from Indian History">
        <input type="hidden" name="book_image" value="Timelines.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="Dollhouse.png" alt="THE LIBRARY OF LOST DOLLHOUSES">
                <h4>THE LIBRARY OF LOST DOLLHOUSES</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="THE LIBRARY OF LOST DOLLHOUSES">
        <input type="hidden" name="book_image" value="Dollhouse.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>

        </div>
        <button class="arrow right-arrow" onclick="scrollSlider('just-arrived-slider', 1)">&#10095;</button>
    </div><br><br>

    <h2>Bulacaniana</h2>
    <div class="book-slider-container">
        <button class="arrow left-arrow" onclick="scrollSlider('top-picks-slider', -1)">&#10094;</button>
        <div id="top-picks-slider" class="book-slider">

            <div class="book">
            <img src="MALOLOS.png" alt="Student Atlas">
                <h4>Women in Malolos</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Women in Malolos">
        <input type="hidden" name="book_image" value="MALOLOS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="PULILAN.png" alt="Timelines from Indian History">
                <h4>Pulilan: The Blessed Land</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Pulilan: The Blessed Land">
        <input type="hidden" name="book_image" value="PULILAN.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="CRISIS.png" alt="The World War II Book">
                <h4>Malolos: The Crisis of the Republic</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Malolos: The Crisis of the Republic">
        <input type="hidden" name="book_image" value="CRISIS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="PHILIPPINES.png" alt="Smithsonian History of the World Map">
                <h4>Frailocracy in the Philippines</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Frailocracy in the Philippines">
        <input type="hidden" name="book_image" value="PHILIPPINES.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="THE MALOLOS CONGRESS.png" alt="THE MALOLOS CONGRESS">
                <h4>THE MALOLOS CONGRESS</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="THE MALOLOS CONGRESS">
        <input type="hidden" name="book_image" value="THE MALOLOS CONGRESS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="La Soberanía.png" alt="La Soberanía">
                <h4>La Soberanía</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="La Soberanía">
        <input type="hidden" name="book_image" value="La Soberanía.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="PHILIPPINES.png" alt="Smithsonian History of the World Map">
                <h4>Frailocracy in the Philippines</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Frailocracy in the Philippines">
        <input type="hidden" name="book_image" value="PHILIPPINES.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="THE MALOLOS CONGRESS.png" alt="THE MALOLOS CONGRESS">
                <h4>THE MALOLOS CONGRESS</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="THE MALOLOS CONGRESS">
        <input type="hidden" name="book_image" value="THE MALOLOS CONGRESS.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="La Soberanía.png" alt="La Soberanía">
                <h4>La Soberanía</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="La Soberanía">
        <input type="hidden" name="book_image" value="La Soberanía.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>

        </div>
        <button class="arrow right-arrow" onclick="scrollSlider('top-picks-slider', 1)">&#10095;</button>
    </div>
    <br><br>
    <h2>Filipiniana</h2>
    <div class="book-slider-container">
        <button class="arrow left-arrow" onclick="scrollSlider('just-arrived-slider', -1)">&#10094;</button>
        <div id="just-arrived-slider" class="book-slider">
            <div class="book">
            <img src="THE REIGN OF GREED.png" alt="Rewitched">
                <h4>The Reign of Greed</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="The Reign of Greed">
        <input type="hidden" name="book_image" value="THE REIGN OF GREED.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="THE SOCIAL CANCER.png" alt="When the World Tips Over">
                <h4>The Social Cancer</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="The Social Cancer">
        <input type="hidden" name="book_image" value="THE SOCIAL CANCER.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="NOLI ME TANGERE.png" alt="Yellowface">
                <h4>Noli Me Tangere</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="Noli Me Tangere">
        <input type="hidden" name="book_image" value="NOLI ME TANGERE.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="EL FILIBUSTERISMO.png" alt="Green Dot">
                <h4>EL FILIBUSTERISMO</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="EL FILIBUSTERISMO">
        <input type="hidden" name="book_image" value="EL FILIBUSTERISMO.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="BARANGAY.png" alt="BARANGAY">
                <h4>BARANGAY</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="BARANGAY">
        <input type="hidden" name="book_image" value="BARANGAY.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="BOXER CODEX.png" alt="BOXER CODEX">
                <h4>BOXER CODEX</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="BOXER CODEX">
        <input type="hidden" name="book_image" value="BOXER CODEX.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="EL FILIBUSTERISMO.png" alt="Green Dot">
                <h4>EL FILIBUSTERISMO</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="EL FILIBUSTERISMO">
        <input type="hidden" name="book_image" value="EL FILIBUSTERISMO.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="BARANGAY.png" alt="BARANGAY">
                <h4>BARANGAY</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="BARANGAY">
        <input type="hidden" name="book_image" value="BARANGAY.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>
            <div class="book">
            <img src="BOXER CODEX.png" alt="BOXER CODEX">
                <h4>BOXER CODEX</h4>
                <form action="save_book.php" method="POST">
        <!-- Hidden fields to store book title and image -->
        <input type="hidden" name="book_title" value="BOXER CODEX">
        <input type="hidden" name="book_image" value="BOXER CODEX.png">
        <button type="submit" class="read-btn">Add Book</button>
    </form>
            </div>

        </div>
        <button class="arrow right-arrow" onclick="scrollSlider('just-arrived-slider', 1)">&#10095;</button>
    </div>
</section>

</div>
</section>

</section>


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
    function scrollSlider(sliderId, direction) {
        const slider = document.getElementById(sliderId);
        const itemWidth = slider.querySelector('.book').offsetWidth;
        const gap = 10; // Adjust for the margin between books
        slider.scrollLeft += direction * (itemWidth + gap);
    }

    function logout() {
        var choice = confirm("Do you really want to log out?");
        if(choice == true) {
            window.location = "tologout.php"; // Redirect to logout page if confirmed
        }
    }
</script>

  </body>
</html>