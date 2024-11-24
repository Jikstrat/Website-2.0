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
    <title>Artists - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Welcome.css">
    <link rel="stylesheet" href="gall.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="welcome.html" class="logo">
                <i class="fas fa-palette"></i>
                <span>Art Visio</span>
            </a>
            <nav>
                <ul>
                    <li><a href="Welcome.php">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="Artists.php" class="active">Artists</a></li>
                    <li><a href="exhibitions.php">Exhibitions</a></li>
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

    <main class="gallery-main">
        <div class="gallery-container">
            <div class="breadcrumb">
                <span>Artists</span>
            </div>
            <h1 class="gallery-title">Featured Artists</h1>
            
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All Artists</button>
                <button class="filter-btn" data-filter="featured">Featured</button>
                <button class="filter-btn" data-filter="new">New</button>
                <button class="filter-btn" data-filter="trending">Trending</button>
            </div>

            <div class="artists-grid">
                <div class="artist-card">
                    <div class="artist-cover">
                        <img src="/api/placeholder/400/200" alt="Artist Cover">
                    </div>
                    <div class="artist-profile">
                        <img src="/api/placeholder/100/100" alt="Artist Profile" class="profile-pic">
                        <div class="artist-info">
                            <h3>Sarah Williams</h3>
                            <p class="artist-specialty">Digital Artist</p>
                            <div class="artist-stats">
                                <span><i class="fas fa-paint-brush"></i> 45 Works</span>
                                <span><i class="fas fa-user-friends"></i> 12.5k Followers</span>
                            </div>
                            <a href="#" class="follow-btn">Follow Artist</a>
                        </div>
                    </div>
                </div>

                <!-- Additional artist cards omitted for brevity -->

            </div>

            <div class="load-more">
                <button class="load-more-btn">Load More Artists</button>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>