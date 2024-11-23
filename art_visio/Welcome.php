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
    <title>Welcome to Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Welcome.css">
</head>
<body>
    <div id="preloader">
        <div class="loader-container">
            <i class="fas fa-palette"></i>
            <div class="art-visio-text">Art Visio</div>
        </div>
    </div>
    <header>
        <div class="container">
            <a href="welcome.php" class="logo">
                <i class="fas fa-palette"></i>
                <span>Art Visio</span>
            </a>
            <nav>
                <ul>
                    <li><a href="Welcome.php" class="active">Home</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="Artists.php">Artists</a></li>
                    <li><a href="Exhibitions.php">Exhibitions</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <div class="user-dropdown">
                    <i class="fas fa-user"></i>
                    <div class="dropdown-menu">
                        <a href="User.php">User</a>
                        <a href="settings.php">Settings</a>
                        <a href="About_Us.php" class="report-bug">About Us</a>
                    </div>
                </div>
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </header>
    <main>
        <div class="welcome-message">
            <h1>Welcome Back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Explore the beauty of art and culture.</p>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Art Visio. All Rights Reserved.</p>
    </footer>
    <script>
        window.addEventListener("load", function () {
            const preloader = document.getElementById("preloader");
            setTimeout(() => {
                preloader.style.opacity = "0";
                setTimeout(() => {
                    preloader.style.display = "none";
                }, 1000);
            }, 2000);
        });
    </script>
</body>
</html>