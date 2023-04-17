<!DOCTYPE html>
<html>
<head>
    <title> Candidate Management</title>
    <link rel="stylesheet" href="voterdelete.css">
</head>
<body>
    <h1>Candidate Management</h1>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Aadhar</th>
            <th>Voter ID</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php
        // Include the database connection
        require_once 'db_config.php';

        // SQL query to fetch voters
        $sql = "SELECT * FROM user WHERE user_role = 'candidate'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['aadhar']; ?></td>
                    <td><?php echo $row['voterid']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td>
                        <a href="deletecandidate.php?userId=<?php echo $row['user_id']; ?>" class="delete-btn">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="9">No voters found.</td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
