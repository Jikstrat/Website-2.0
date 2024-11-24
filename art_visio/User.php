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
    <title>User Profile - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="User.css">
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
            <div class="user-actions">
                <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </header>
    <main>
        <div class="profile-container">
            <h1>User Profile</h1>
            <div class="profile-details">
                <div class="profile-pic">
                    <img src="profile-placeholder.jpg" alt="User Profile Picture">
                </div>
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                    <p>Email: user@example.com</p>
                    <p>Joined: January 1, 2024</p>
                    <button>Edit Profile</button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>
