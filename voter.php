<?php
require_once 'db_config.php';

// Select users from user table with userrole = 'voter'
$sql = "SELECT * FROM users WHERE userrole = 'voter'";
$result = mysqli_query($conn, $sql);

// Loop through the selected users and insert them into the voters table
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $name = $row["name"];
    $age = $row["age"];
    $gender = $row["gender"];

    // Insert user data into voters table
    $sql_insert = "INSERT INTO voters (id, name, age, gender) VALUES ('$id', '$name', '$age', '$gender')";
    mysqli_query($conn, $sql_insert);
}

// Close database connection
mysqli_close($conn);
?>
