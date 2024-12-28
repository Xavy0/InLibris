<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>In Libris</title>
    <link rel="stylesheet" type="text/css" href="Homepage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>

  <body>
<div>

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

<!-- Home Section -->
<section class="home" id="home">
    <div class="home-text">
        <h1>Welcome to In Libris<br> Exclusives</h1>
        <p>Discover, learn, and connect: the library is your <br> partner in lifelong exploration</p>
        <a href="#" class="home-btn">Let's read now</a> 
    </div>
</section> 


<!-- Category Section -->
<section id="collections" class="collections-section">
    <div class="container">
        <h2>Book Categories</h2>
        <p>Explore our wide range of book categories to find your favorite reads.</p>

        <!-- Category Box 1 -->
        <div class="box">
            <div class="container-img">
                <img src="Ref.gif" alt="Reference" class="gif-icon">
                <img src="Ref.png" alt="Reference Static" class="static-icon">
            </div>
            <a href="collection.php#catalog" class="button" onclick="handleClick('Reference')">Reference</a>
        </div>

        <!-- Category Box 2 -->
        <div class="box">
            <div class="container-img">
                <img src="fiction.gif" alt="Fiction" class="gif-icon">
                <img src="fiction.png" alt="Fiction Static" class="static-icon">
            </div>
            <a href="collection.php#catalog" class="button" onclick="handleClick('Fiction')">Fiction</a>
        </div>

        <!-- Category Box 3 -->
        <div class="box">
            <div class="container-img">
                <img src="Bul.gif" alt="Bulacaniana" class="gif-icon">
                <img src="Bul.png" alt="Bulacaniana Static" class="static-icon">
            </div>
            <a href="collection.php#catalog" class="button" onclick="handleClick('E-Bulacaniana')">E-Bulacaniana</a>
        </div>

        <!-- Category Box 4 -->
        <div class="box">
            <div class="container-img">
                <img src="Fil.gif" alt="Filipiniana" class="gif-icon">
                <img src="Fil.png" alt="Filipiniana Static" class="static-icon">
            </div>
            <a href="collection.php#catalog" class="button" onclick="handleClick('Filipiniana')">Filipiniana</a>
        </div>
    </div>
</section>

</div>


          <!-- Collections Section -->
          <section id="collections" class="collections-section">
          <div class="container">
              

<!-- Catalog Section -->
<section id="catalog" class="collections-section">
    <h2>Top Picks</h2>
    <div class="book-slider-container">
        <button class="arrow left-arrow" onclick="scrollSlider('top-picks-slider', -1)">&#10094;</button>
        <div id="top-picks-slider" class="book-slider">
            <div class="book">
                <img src="STUDENT ATLAS.png" alt="Book 1">
                <h4>Student Atlas</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Timelines.png" alt="Book 2">
                <h4>Timelines from Indian History</h4>
                <a href="#" class="read-btn">Read</a>
            </div>
            <div class="book">
                <img src="WAR2.png" alt="Book 3">
                <h4>The World War II Book</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="History.png" alt="Book 4">
                <h4>Smithsonian History of the World Map</h4>
                <a href="#" class="read-btn">Read</a>
            </div>
            <div class="book">
                <img src="ASYLUM SPEAKERS.png" alt="Book 5">
                <h4>Asylum Speakers</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="HUMAN BODY.png" alt="Book 6">
                <h4>Human Body</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Sandosenang Sapatos.png" alt="Book 6">
                <h4>Sandosenang Sapatos</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="History.png" alt="Book 4">
                <h4>Smithsonian History of the World Map</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="ASYLUM SPEAKERS.png" alt="Book 5">
                <h4>Asylum Speakers</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="An Anthology of our extraordinary earth .png" alt="Book 6">
                <h4>Human Body</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Sandosenang Sapatos.png" alt="Book 6">
                <h4>Sandosenang Sapatos</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
        </div>
        <button class="arrow right-arrow" onclick="scrollSlider('top-picks-slider', 1)">&#10095;</button>
    </div>
    <br><br>
    <h2>Just Arrived</h2>
    <div class="book-slider-container">
        <button class="arrow left-arrow" onclick="scrollSlider('just-arrived-slider', -1)">&#10094;</button>
        <div id="just-arrived-slider" class="book-slider">
        <div class="book">
                <img src="An Anthology of our extraordinary earth .png" alt="Book 6">
                <h4>An Anthology of our extraordinary earth</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Fantastic Optical Illusions.png" alt="Book 1">
                <h4>Fantastic Optical Illusions</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Guns, Germs, and Steel_ The Fates of Human Societies.png" alt="Book 1">
                <h4>Guns, Germs, and Steel_ The Fates of Human Societies</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Holes.png" alt="Book 2">
                <h4>Holes</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="How to be a genius.png" alt="Book 3">
                <h4>How to be a genius</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Jasmine is haunted.png" alt="Book 4">
                <h4>Jasmine is haunted</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="ASYLUM SPEAKERS.png" alt="Book 5">
                <h4>Asylum Speakers</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="HUMAN BODY.png" alt="Book 6">
                <h4>Human Body</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="Timelines.png" alt="Book 2">
                <h4>Timelines from Indian History</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="WAR2.png" alt="Book 3">
                <h4>The World War II Book</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="History.png" alt="Book 4">
                <h4>Smithsonian History of the World Map</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="The brain book.png" alt="Book 5">
                <h4>The brain book</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
            <div class="book">
                <img src="HUMAN BODY.png" alt="Book 6">
                <h4>Human Body</h4>
                <a href="collection.php" class="read-btn">Borrow</a>
            </div>
        </div>
        <button class="arrow right-arrow" onclick="scrollSlider('just-arrived-slider', 1)">&#10095;</button>
    </div>
</section>
</div>
</section>

<section>
  <!-- SERVICES PAGE -->
  <div class="text" id="imgslide">
      <h2>Service</h2>
  </div>

  <div class="img-slider">
      <!-- Left Arrow -->
      <button class="prev">&#10094;</button>

      <div class="slides">
          <div class="slide">
              <img src="img1.PNG" alt="S.R">
          </div>
          <div class="slide">
              <img src="img2.PNG" alt="S.R">
          </div>
          <div class="slide">
              <img src="img3.PNG" alt="S.R">
          </div>
          <div class="slide">
              <img src="img4.PNG" alt="S.R">
          </div>
      </div>

      <!-- Right Arrow -->
      <button class="next">&#10095;</button>
  </div>
</section>

<section id="srv-cont">
            <div class="srv-card">
                <div class="srv-box">
                    <div class="srv-img">
                        <img src="e-book.png" alt="E-Books" class="gif">
                    </div>
                    <h4>eBooks</h4>
                    <p>Knovel has a very good collection of different reference books, research papers, articles, handbooks, and manuals for a wide variety of engineering domains.</p>
                    <a href="#" class="btn-more">Access Here</a>
                </div>
            </div>
        
            <div class="srv-card">
                <div class="srv-box">
                    <div class="srv-img">
                        <img src="e-journal.png" alt="E-Journals" class="gif">
                    </div>
                    <h4>eJournals</h4>
                    <p>JSTOR offers more than 2,800 top scholarly journals in the humanities, social sciences, and sciences.</p>
                    <a href="#" class="btn-more">Access Here</a>
                </div>
            </div>
        
            <div class="srv-card">
                <div class="srv-box">
                    <div class="srv-img">
                        <img src="research tool.png" alt="Research Tools" class="gif">
                    </div>
                    <h4>Research Tools</h4>
                    <p>EBSCO Discovery Service is an all-inclusive search solution that simplifies in-depth research.</p>
                    <a href="#" class="btn-more">Access Here</a>
                </div>
            </div>
        
            <div class="srv-card">
                <div class="srv-box">
                    <div class="srv-img">
                        <img src="database.png" alt="Databases" class="gif">
                    </div>
                    <h4>Databases</h4>
                    <p>eSCRA provides access to Supreme Court decisions and resolutions in the Philippines.</p>
                    <a href="#" class="btn-more">Access Here</a>
                </div>
            </div>
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
// Get all necessary elements
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;
let currentIndex = 0;

// Function to update slide position
function updateSlidePosition() {
    const offset = -currentIndex * 100; // Calculate the slide offset
    slides.style.transform = `translateX(${offset}%)`; // Move the slides container
}

// Event listener for the 'previous' button
prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--; // Decrease the index
    } else {
        currentIndex = totalSlides - 1; // If at the beginning, go to the last slide
    }
    updateSlidePosition(); // Update the slide position
});

// Event listener for the 'next' button
nextButton.addEventListener('click', () => {
    if (currentIndex < totalSlides - 1) {
        currentIndex++; // Increase the index
    } else {
        currentIndex = 0; // If at the last slide, go back to the first
    }
    updateSlidePosition(); // Update the slide position
});

// Auto-slide functionality
let slideInterval = setInterval(() => {
    if (currentIndex < totalSlides - 1) {
        currentIndex++; // Move to the next slide
    } else {
        currentIndex = 0; // Go back to the first slide
    }
    updateSlidePosition();
}, 3000); // Change slide every 3 seconds

// Pause auto-slide on hover
document.querySelector('.img-slider').addEventListener('mouseover', () => {
    clearInterval(slideInterval); // Stop the auto-slide
});

// Resume auto-slide when mouse leaves the slider
document.querySelector('.img-slider').addEventListener('mouseleave', () => {
    slideInterval = setInterval(() => {
        if (currentIndex < totalSlides - 1) {
            currentIndex++; // Move to the next slide
        } else {
            currentIndex = 0; // Go back to the first slide
        }
        updateSlidePosition();
    }, 3000); // Change slide every 3 seconds
});

// Initialize the slider by setting the initial position
updateSlidePosition();

</script>

  </body>
</html>