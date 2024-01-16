<?php
include_once 'db.php';

if (isset($_GET['emp_num']) && isset($_GET['proj_no'])) {
    $empNum = $_GET['emp_num'];
    $projNo = $_GET['proj_no'];

    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM ASSIGNMENT WHERE EMP_NUM = ? AND PROJ_NO = ?");
            $stmt->execute([$empNum, $projNo]);
            header('Location: /enigma/html/view_assignments.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header('Location: /enigma/html/view_assignments.php');
    exit();
}
?>
