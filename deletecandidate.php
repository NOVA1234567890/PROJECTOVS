<?php
// Include the database connection
require_once 'db_config.php';

// Check if the user ID is provided
if(isset($_GET['userId'])) {
    // Get the user ID from the query parameter
    $userId = $_GET['userId'];

    // Prepare the DELETE query with a placeholder for user_id to avoid SQL injection
    $sql = "DELETE FROM user WHERE user_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the user ID parameter to the statement
    $stmt->bind_param("i", $userId);
    
    // Execute the DELETE query
    if ($stmt->execute()) {
        header("Location: manage_candidate.php");
        exit;
    } else {
        echo "Error deleting candidate: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
