<?php
// Include database connection file
require_once 'db_config.php';


// Fetch all elections from the database
$electionQuery = "SELECT * FROM election";
$electionResult = mysqli_query($conn, $electionQuery);

// Check if election query was successful
if ($electionResult) {
    ?>
    
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            h1 {
                margin-bottom: 20px;
            }

            form {
                margin-bottom: 20px;
            }

            label, select, button {
                font-size: 18px;
                margin-right: 10px;
            }

            select {
                width: 200px;
                padding: 5px;
            }

            button {
                padding: 5px 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                cursor: pointer;
            }

            table {
                border-collapse: collapse;
                width: 400px;
            }

            th, td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f8f9fa;
            }

            tr:nth-child(even) {
                background-color: #f8f9fa;
            }

            tr:hover {
                background-color: #e2e6ea;
            }
        </style>
    </head>
    
    <h1>Select Election</h1>
    <form action="" method="post">
        <label for="id">Select Election:</label>
        <select name="id" id="id">
            <?php
            // Loop through the elections and display as options
            while ($electionRow = mysqli_fetch_assoc($electionResult)) {
                ?>
                <option value="<?php echo $electionRow['id']; ?>"><?php echo $electionRow['name']; ?></option>
                <?php
            }
            ?>
        </select>
        <button type="submit" name="submit">View Results</button>
    </form>
    <?php
} else {
    echo "Error fetching elections from database: " . mysqli_error($conn);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get selected election ID
    $selectedElectionId = $_POST['id'];

    // Fetch candidate vote count for the selected election from the database
    $query = "SELECT candidate_id, COUNT(*) as vote_count FROM votes WHERE id = $selectedElectionId GROUP BY candidate_id";
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        ?>
        <h1>Result</h1>
        <table>
            <tr>
                <th>Candidate ID</th>
                <th>Vote Count</th>
            </tr>
            <?php
            // Loop through the result and display candidate vote count
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['candidate_id']; ?></td>
                    <td><?php echo $row['vote_count']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "Error fetching result from database: " . mysqli_error($conn);
    }
    
}



echo"the winner name will be announce at the end of election";

// Close database connection
mysqli_close($conn);

?>
