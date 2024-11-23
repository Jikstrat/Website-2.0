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
    <title>Exhibitions - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Exhibitions.css">
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
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="Artists.php">Artists</a></li>
                    <li><a href="exhibitions.php" class="active">Exhibitions</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <div class="user-dropdown">
                    <i class="fas fa-user"></i>
                    <div class="dropdown-menu">
                        <a href="User.php">User</a>
                        <a href="Settings.php">Settings</a>
                        <a href="About_Us.php" class="report-bug">About Us</a>
                    </div>
                </div>
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </header>
    <main>
        <section class="exhibitions">
            <h1>Current Exhibitions</h1>
            <p>Discover the latest art exhibitions happening now.</p>
            <div class="exhibition-list">
                <!-- Add exhibition items here -->
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>
