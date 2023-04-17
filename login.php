<?php
// Include database connection file
require_once 'db_config.php';

// Start session
session_start();

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user data from database
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set user_id session variable
            $_SESSION['user_id'] = $row['user_id'];

            // Check user role and redirect to appropriate dashboard
            if ($row['user_role'] == 'voter') {
                header("Location: voter_dashboard.php");
                exit();
            } elseif ($row['user_role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($row['user_role'] == 'candidate') {
                header("Location: candidate_dashboard.php");
                exit();
            } else {
                echo "Error: Invalid user role";
            }
        } else {
            echo "Error: Invalid password";
        }
    } else {
        echo "Error: User not found";
    }

    $stmt->close();
    $conn->close();
} elseif(isset($_POST['username']) || isset($_POST['password'])) {
    echo "Error: Username and password are required";
}
?>

<!-- Your HTML login form goes here -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username</label>
            <input type="text" name="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
            <li><a href="index.php">Home</a></li>
        </form>
        <?php if(!empty($error_message)) { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>
