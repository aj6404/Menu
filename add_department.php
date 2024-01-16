<?php
include_once 'db.php'; 
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departmentId = trim($_POST['department_id']);
    $departmentName =
trim($_POST['department_name']);

if ($departmentId && $departmentName) {
    try {
        $stmt = $db->prepare("INSERT INTO DEPARTMENT (DEPARTMENT_ID, DEP_NAME) VALUES (?, ?)");
        $stmt->execute([$departmentId, $departmentName]);
        $message = 'Department added successfully.';
        // Redirect after successful insertion
        header('Location: ../html/view_departments.php?message=' . urlencode($message));
        exit();
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        $message = "Error: Unable to add department. Wrong entered values." . $e->getMessage();
    }
} else {
    $message = 'Please fill all the required fields.';
}
}

if (!empty($message)) {
// Display message without redirecting if there's an error
echo "<script>alert('$message'); window.location.href='../html/add_department.php';</script>";
exit();
}
?>