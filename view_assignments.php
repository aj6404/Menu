<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Assignments</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<nav>
    <ul>
        <li class="home-link"><a href="/enigma">Home</a></li>
    </ul>
</nav>

<body>
    <header>
        <h1>Assignment List</h1>
    </header>

    <section>
        <table id="assignmentsTable">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>Project Number</th>
                    <th>Hours Worked</th>
                </tr>
            </thead>
            <tbody>
                <?php include_once '../php/fetch_assignments.php';
    $assignments = fetchAssignments();
    foreach ($assignments as $assignment) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($assignment['EMP_NUM']) . "</td>";
        echo "<td>" . htmlspecialchars($assignment['PROJ_NO']) . "</td>";
        echo "<td>" . htmlspecialchars($assignment['HOURS']) . "</td>";
        echo "<td><a href='../php/delete_assignment.php?emp_num=" . $assignment['EMP_NUM'] . "&proj_no=" . $assignment['PROJ_NO'] . "' class='btn-delete'>Delete</a></td>";
        echo "</tr>";
    } ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Enigma Corporation</p>
    </footer>
</body>
</html>
