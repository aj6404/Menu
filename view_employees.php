<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script>
        function confirmDelete(empNum) {
            var confirmAction = confirm("Are you sure you want to delete this employee?");
            if (confirmAction) {
                window.location.href = '../php/delete_employee.php?id=' + empNum;
            } else {
                // If canceled, do nothing
            }
        }
    </script>
</head>

<nav>
    <ul>
        <li class="home-link"><a href="/enigma">Home</a></li>
    </ul>
</nav>

<body>
<header>
    <h1>Employee List</h1>
    <a href="add_employee.php" class="btn">Add New Employee</a> 
</header>

<section>
    <table id="employeesTable">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include_once '../php/fetch_employees.php';
            $employees = fetchEmployees();
            foreach ($employees as $employee) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($employee['EMP_NUM']) . "</td>";
                echo "<td>" . htmlspecialchars($employee['EMP_FNAME']) . "</td>";
                echo "<td>" . htmlspecialchars($employee['EMP_MNAME']) . "</td>";
                echo "<td>" . htmlspecialchars($employee['EMP_LNAME']) . "</td>";
                echo "<td>" . htmlspecialchars($employee['EMAIL']) . "</td>";
                echo "<td>" . htmlspecialchars($employee['STATE']) . "</td>";
                echo "<td><button onclick='confirmDelete(\"" . $employee['EMP_NUM'] . "\")' class='btn-delete'>Delete</button></td>";
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
