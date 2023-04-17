<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="manage_candidate.php">Manage Candidates</a></li>
                <li><a href="manage_voter.php">Manage Voters</a></li>
                <li><a href="manage_election.php">Manage Elections</a></li>
                <li><a href="result.php">View Results</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Welcome, Admin!</h2>
            <p>You can manage candidates, voters, elections, and view results here.</p>
        </section>
        <section>
            <h2>Manage Candidates</h2>
            <p>Add, edit, and delete candidates. View candidate profiles and manage their campaign activities.</p>
            <!-- Add dynamic content here, such as candidates data from the database -->
        </section>
        <section>
            <h2>Manage Voters</h2>
            <p> delete or get voter information for validation by clicking here:<li><a href="manage_voter.php">Manage Voters</a></li></p>
            <!-- Add dynamic content here, such as voters data from the database -->
        </section>
        <section>
            <h2>Manage Elections</h2>
            <p>Create, update, and delete elections. Manage election details, dates, and candidate nominations.</p>
            <!-- Add dynamic content here, such as elections data from the database -->
        </section>
        <section>
            <h2>View Results</h2>
            <p>View election results, including vote counts, winners, and other statistics.</p>
            <!-- Add dynamic content here, such as election results from the database -->
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Your Election App. All rights reserved.</p>
    </footer>
</body>
</html>
