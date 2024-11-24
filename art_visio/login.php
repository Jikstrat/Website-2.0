<?php
require_once 'config.php';
session_start();

// Initialize error message variable
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = "Please fill all fields.";
    } else {
        // Using mysqli instead of PDO for consistency with earlier config
        $sql = "SELECT id, username, password FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            
                            // Handle Remember Me functionality
                            if (isset($_POST['remember'])) {
                                $token = bin2hex(random_bytes(32));
                                setcookie("remember_token", $token, time() + (86400 * 30), "/");
                                
                                // Update remember token in database
                                $update_sql = "UPDATE users SET remember_token = ? WHERE id = ?";
                                if ($update_stmt = $conn->prepare($update_sql)) {
                                    $update_stmt->bind_param("si", $token, $id);
                                    $update_stmt->execute();
                                    $update_stmt->close();
                                }
                            }
                            
                            // Redirect to welcome page
                            header("Location: welcome.php");
                            exit();
                        } else {
                            $error_message = "Invalid password.";
                        }
                    }
                } else {
                    $error_message = "No account found with this email.";
                }
            } else {
                $error_message = "Oops! Something went wrong. Please try again later.";
            }
            
            $stmt->close();
        }
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Visio - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="ll.css">
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: center;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <i class="fas fa-palette"></i>
            <h1>Art Visio</h1>
            <span>Discover the World of Art</span>
        </div>
        
        <?php if (!empty($error_message)): ?>
        <div class="alert alert-error">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit">
                <i class="fas fa-sign-in-alt"></i>
                Log In
            </button>
        </form>
        <div class="links">
            <a href="#"><i class="fas fa-key"></i> Forgot Password?</a>
            <a href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
        </div>
    </div>
</body>
</html>