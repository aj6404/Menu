<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'db.php'; 

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empNum = $_POST['emp_num'] ?? null;
    $empFName = $_POST['emp_fname'] ?? null;
    $empMName = $_POST['emp_mname'] ?? '';
    $empLName = $_POST['emp_lname'] ?? null;
    $email = $_POST['email'] ?? null;
    $state = $_POST['state'] ?? null;

    // Validate the input
    if ($empNum && $empFName && $empLName && $email && $state) {
        try {
            $stmt = $db->prepare("INSERT INTO EMPLOYEE (EMP_NUM, EMP_FNAME, EMP_MNAME, EMP_LNAME, EMAIL, STATE) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$empNum, $empFName, $empMName, $empLName, $email, $state]);
            
            // Redirect after successful insertion
            header('Location: ../html/view_employees.php?message=' . urlencode('Employee added successfully.'));
            exit();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            $message = "Error: Unable to add employee. Please check the log for details. " . $e->getMessage();
        }
    } else {
        $message = 'Please fill all the required fields.';
    }
}

if (!empty($message)) {
    echo "<p>$message</p>";
}
?>
