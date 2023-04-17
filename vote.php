
<?php
session_start(); // Start the session

require_once 'db_config.php'; // Include the database configuration

// Check if user_id is set in session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle authentication as needed
    header('Location: login.php'); // Replace 'login.php' with your login page URL
    exit;
}

// Check if 'id' is present in the $_GET array
if (!isset($_GET['id'])) {
    // Redirect to election.php or display an error message as needed
    header('Location: election.php'); // Replace 'election.php' with your election page URL
    exit;
}

$id = $_GET['id'];

// Retrieve candidate options from candidate table for the selected election
$stmt = $conn->prepare("SELECT candidate_id, name FROM candidate WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if no candidates found for the selected election
if ($result->num_rows <= 0) {
    // Redirect to election.php or display an error message as needed
    header('Location: election.php'); // Replace 'election.php' with your election page URL
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'candidate_id' is present in the $_POST array
    if (!isset($_POST['candidate_id'])) {
        // Display an error message as needed
        $error_message = "Please select a candidate.";
        // You can redirect to vote.php with an error message or display it on the same page as needed
    } else {
        // Retrieve user_id from session and candidate_id from post
        $user_id = $_SESSION['user_id'];
        $candidate_id = $_POST['candidate_id'];

        // Check if user has already voted for the selected election
        $stmt = $conn->prepare("SELECT * FROM votes WHERE user_id = ? AND id = ?");
        $stmt->bind_param("ii", $user_id, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Display an error message that the user has already voted for this election
            $error_message = "You have already voted for this election.";
        } else {
            // Insert the vote record into the 'votes' table
            $stmt = $conn->prepare("INSERT INTO votes (user_id, id, candidate_id) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $id, $candidate_id);
            $stmt->execute();

            echo "Voted";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Vote</title>
    <link rel="stylesheet" href="vote.css">
</head>
<body>


    <form method="post" action="">
        <label for="candidate_id">Candidate:</label>
        <select name="candidate_id" id="candidate_id" required>
            <option value="" selected disabled>Select Candidate</option>
            <!-- Retrieve candidate options

            <!-- Retrieve candidate options from database and populate the options -->
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["candidate_id"] . "'>" . $row["name"] . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Vote">
    </form>
    <?php
    // Display error message if any
    if (isset($error_message)) {
        echo "<p style='color:red'>" . $error_message . "</p>";
    }
    ?>
</body>
</html>