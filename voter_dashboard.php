<!DOCTYPE html>
<html>
<head>
    <title>Voter Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <header>
        <h1>Voter Dashboard</h1>
        <nav>
            <ul>
                <li><a href="viewcandidate.php">View Candidates</a></li>
                <li><a href="vote.php">Vote</a></li>
                <li><a href="result.php">View Results</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Welcome, Voter!</h2>
            <p>You can view candidates, vote, and view results here.</p>
        </section>
        <section>
            <h2>Upcoming Elections</h2>
            <p>Get information about upcoming elections, such as dates, candidates, and voting locations.</p>
            <!-- Add dynamic content here, such as upcoming elections from the database -->
        </section>
        <section>
            <h2>Latest Results</h2>
            <p>Stay updated with the latest election results, including the winners and vote counts.</p>
            <!-- Add dynamic content here, such as election results from the database -->
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Your Election App. All rights reserved.</p>
    </footer>
</body>
</html>
