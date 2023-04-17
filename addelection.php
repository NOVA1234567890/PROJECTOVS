<?php
// Include the database connection
require_once 'db_config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $electionName = $_POST["name"];
    $electionDescription = $_POST["description"];
    $electionStartDate = $_POST["start_date"];
    $electionEndDate = $_POST["end_date"];

    // SQL query to insert the election data into the database with current timestamp
    $sql = "INSERT INTO election (name, description, start_date, end_date, created_at)
            VALUES ('$electionName', '$electionDescription', '$electionStartDate', '$electionEndDate', CURRENT_TIMESTAMP)";

    // Execute the INSERT query
    if ($conn->query($sql) === TRUE) {
        echo "Election added successfully.";
        header("Location: manage_election.php");
    } else {
        echo "Error adding election: " ;
    }
    
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADD Elections</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <h1>Manage Elections</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="name">Election Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Election Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" required>

        <input type="submit" value="Add Election">
    </form>
</body>
</html>
