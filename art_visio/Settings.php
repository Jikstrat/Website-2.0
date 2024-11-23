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
    <title>Settings - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Settings.css">
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
        <div class="settings-container">
            <h1>Settings</h1>
            <form action="settings_update.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="user@example.com" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="New Password">

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>
