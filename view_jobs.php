<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Jobs</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<nav>
    <ul>
        <li class="home-link"><a href="/enigma">Home</a></li>
        <li><a href="add_job.php">Add New Job</a></li>
    </ul>
</nav>

<body>
    <header>
        <h1>Job List</h1>
    </header>

    <section>
        <table id="jobsTable">
            <thead>
                <tr>
                    <th>Job Class</th>
                    <th>Charge per Hour</th>
                </tr>
            </thead>
            <tbody>
            <?php
    include_once '../php/fetch_jobs.php';
    $jobs = fetchJobs();
    foreach ($jobs as $job) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($job['JOB_CLASS']) . "</td>";
        echo "<td>" . htmlspecialchars($job['CHG_HOUR']) . "</td>";
        echo "<td><a href='../php/delete_job.php?job_class=" . $job['JOB_CLASS'] . "' class='btn-delete'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Enigma Corporation</p>
    </footer>
</body>
</html>
