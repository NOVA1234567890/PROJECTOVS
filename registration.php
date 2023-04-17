<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css"> <!-- CSS file for styling -->
    
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="registerprocess.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="aadhar" placeholder="Aadhar Number" required>
            <input type="date" name="dob" placeholder="Date of Birth" required>
            <input type="text" name="voterid" placeholder="Voter ID" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="email" name="email" placeholder="Email" required>
            <select name="user_role" required>
                <option value="">Select User Role</option>
                <option value="admin">Admin</option>
                <option value="candidate">Candidate</option>
                <option value="voter">Voter</option>
            </select>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="male" required> Male
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="other"> Other
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
