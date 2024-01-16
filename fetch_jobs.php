<?php
include_once 'db.php';

function fetchJobs() {
    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->query('SELECT JOB_CLASS, CHG_HOUR FROM JOB');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    return [];
}
