<!-- view_candidate.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Voter Dashboard - View Candidates</title>
    <link rel="stylesheet" href="viewcandidate.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>View Candidates</h1>
    <?php
        // Include the database connection
        require_once 'db_config.php';
        // SQL query to fetch all candidates from the candidates table
        $sql = "SELECT * FROM user where user_role='candidate'";
        $result = $conn->query($sql);

        // Check if there are any candidates
        if ($result->num_rows > 0) {
            // Output each candidate as a list item
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "Candidate ID: " . $row["user_id"] . "<br>";
                echo "Candidate Name: " . $row["username"] . "<br>";
                
            }
            echo "</ul>";
        } else {
            echo "No candidates found.";
        }

        // Close the database connection
        $conn->close();
    ?>
    <a href="voter_dashboard.php">Go back to Dashboard</a> <!-- Link to the voter dashboard page -->
</body>
</html>
