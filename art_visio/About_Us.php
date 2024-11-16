<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="About_Us.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="Welcome.php" class="logo">
                <i class="fas fa-palette"></i>
                <span>Art Visio</span>
            </a>
            <nav>
                <ul>
                    <li><a href="Welcome.php">Home</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="Artists.php">Artists</a></li>
                    <li><a href="Exhibitions.php">Exhibitions</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="about-container">
            <h1>About Us</h1>
            <p>Art Visio is a platform dedicated to showcasing the works of talented artists from around the world. Our mission is to bring art closer to people and create a vibrant community of art enthusiasts and creators.</p>
            <p>We organize exhibitions, provide a gallery for artists to display their creations, and connect art lovers with the creators they admire.</p>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>
