
<?php
session_start(); // Start the session

require_once 'db_config.php'; // Include the database configuration

// Check if user_id is set in session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle authentication as needed
    header('Location: login.php'); // Replace 'login.php' with your login page URL
    exit;
}

// Retrieve elections from election table
$stmt = $conn->prepare("SELECT id, name FROM election");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Election</title>
    <style>
        /* CSS styles for election.php page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            display: block;
            padding: 10px;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #333;
        }

        a:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1>Election</h1>
    <ul>
        <!-- Display list of elections with links to vote.php page -->
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='vote.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
