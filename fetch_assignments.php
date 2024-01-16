<?php
include_once 'db.php';

function fetchAssignments() {
    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->query('SELECT EMP_NUM, PROJ_NO, HOURS FROM ASSIGNMENT');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    return [];
}
