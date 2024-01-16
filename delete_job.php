<?php
include_once 'db.php';

if (isset($_GET['job_class'])) {
    $jobClass = $_GET['job_class'];

    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->prepare("DELETE FROM JOB WHERE JOB_CLASS = ?");
            $stmt->execute([$jobClass]);
            header('Location: /enigma/html/view_jobs.php'); 
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    header('Location: /enigma/html/view_jobs.php'); 
    exit();
}
?>