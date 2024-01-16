<?php
include_once 'db.php';

function fetchEmployees() {
    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->query('SELECT EMP_NUM, EMP_FNAME, EMP_MNAME, EMP_LNAME, EMAIL, STATE FROM EMPLOYEE');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    return [];
}

if (isset($_GET['id'])) {
    $empNum = $_GET['id'];

    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM EMPLOYEE WHERE EMP_NUM = ?");
            $stmt->execute([$empNum]);
            // Redirect back to the employees list
            header('Location: /enigma/html/view_employees.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    // Redirect to employees list or show an error message
    header('Location: /enigma/html/view_employees.php');
    exit();
}
?>
