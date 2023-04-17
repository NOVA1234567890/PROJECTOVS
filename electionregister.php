<!-- HTML form for candidate registration -->
<html>
    <head>
    <link rel="stylesheet" href="canregister.css"> 
</head>
<form action="electionregister.php" method="post">
    <h2>Candidate Registration</h2>
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="partyname" placeholder="Partyname" required>
    <select name="id" required>
        <option value="">Select Election</option>
        <?php
        // Include the database connection
        require_once 'db_config.php';

        // Fetch all elections from the "election" table
        $sql = "SELECT * FROM election";
        $result = $conn->query($sql);

        // Loop through the results and create options for the select input
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }

        // Close the database connection
        
        ?>
    </select>
    <button type="submit" name="submit">Register</button>
</form>
</html>
<?php
// PHP code to handle form submission
if (isset($_POST['submit'])) {
    // Include the database connection
    require_once 'db_config.php';

    // Retrieve form data
    $name = $_POST['name'];
    $partyname = $_POST['partyname'];
    $id = $_POST['id'];

    // SQL query to insert candidate data into "candidate" table
    $sql = "INSERT INTO candidate (name, partyname, id) VALUES ('$name', '$partyname', '$id')";

    // Execute the INSERT query
    if ($conn->query($sql) === TRUE) {
        echo "Candidate registered successfully!";
    } else {
        echo "Error registering candidate: " ;
    }

    // Close the database connection
    $conn->close();
}
?>
