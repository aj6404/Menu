<?php
include_once 'db.php';

if (isset($_GET['department_id'])) {
    $departmentId = $_GET['department_id'];

    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM DEPARTMENT WHERE DEPARTMENT_ID = ?");
            $stmt->execute([$departmentId]);
            header('Location: /enigma/html/view_departments.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header('Location: /enigma/html/view_departments.php');
    exit();
}
?>
