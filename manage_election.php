<?php
// Include the database connection
require_once 'db_config.php';

// SQL query to fetch all elections from the database
$sql = "SELECT * FROM election";
$result = $conn->query($sql);

// Check if the form is submitted for deleting an election
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_election_id"])) {
    // Get the election ID to delete
    $electionIdToDelete = $_POST["delete_election_id"];

    // SQL query to delete the election from the database
    $deleteSql = "DELETE FROM election WHERE id = $electionIdToDelete";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Election deleted successfully.";
    } else {
        echo "Error deleting election: " ;
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Elections</title>
    <link rel="stylesheet" href="manageelection.css">
</head>
<body>
    <h1>Manage Elections</h1>
    <li><a href="addelection.php">ADD ELECTION</a></li>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php
        // Loop through the election data and display it in the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "<td>".$row["start_date"]."</td>";
            echo "<td>".$row["end_date"]."</td>";
            echo "<td>".$row["created_at"]."</td>";
            echo "<td>
                    <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                        <input type='hidden' name='delete_election_id' value='".$row["id"]."'>
                        <input type='submit' value='Delete'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
