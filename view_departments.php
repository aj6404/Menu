<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Departments</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<nav>
    <ul>
        <li class="home-link"><a href="/enigma">Home</a></li>
        <li><a href="add_department.php">Add New Department</a></li>
    </ul>
</nav>

<body>
    <header>
        <h1>Department List</h1>
    </header>

    <section>
        <table id="departmentsTable">
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                </tr>
            </thead>
            <tbody>
            <?php
    include_once '../php/fetch_departments.php';
    $departments = fetchDepartments();
    foreach ($departments as $department) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($department['DEPARTMENT_ID']) . "</td>";
        echo "<td>" . htmlspecialchars($department['DEP_NAME']) . "</td>";
        echo "<td><a href='../php/delete_department.php?department_id=" . $department['DEPARTMENT_ID'] . "' class='btn-delete'>Delete</a></td>";
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
