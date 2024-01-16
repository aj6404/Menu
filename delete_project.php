<?php
include_once 'db.php';

if (isset($_GET['proj_no'])) {
    $projNo = $_GET['proj_no'];

    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM PROJECT WHERE PROJ_NO = ?");
            $stmt->execute([$projNo]);
            header('Location: /enigma/html/view_projects.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header('Location: /enigma/html/view_projects.php');
    exit();
}
?>
