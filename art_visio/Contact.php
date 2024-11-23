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
    <title>Contact - Art Visio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Contact.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="welcome.php" class="logo">
                <i class="fas fa-palette"></i>
                <span>Art Visio</span>
            </a>
            <nav>
                <ul>
                    <li><a href="Welcome.php">Home</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="Artists.php">Artists</a></li>
                    <li><a href="Exhibitions.php">Exhibitions</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
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
        <section class="contact">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Reach out to us with your questions, comments, or feedback.</p>
            <form>
                <div class="form-group">
                    <label for="query-type">What is your query regarding?</label>
                    <select id="query-type" name="query-type" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="technical">Technical Support</option>
                        <option value="account">Account Related</option>
                        <option value="artwork">Artwork Submission</option>
                        <option value="exhibition">Exhibition Inquiries</option>
                        <option value="collaboration">Collaboration Opportunities</option>
                        <option value="feedback">General Feedback</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
            <p style="margin-top: 40px; font-style: italic;">You can also email our founder at: Divyamtaneja22@gmail.com</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Art Visio. All Rights Reserved.</p>
    </footer>
</body>
</html>