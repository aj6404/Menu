<?php
include_once 'db.php';

function fetchDepartments() {
    $db = connectToDB(__DIR__ . '/../db/enigma.db');
    if ($db) {
        try {
            $stmt = $db->query('SELECT DEPARTMENT_ID, DEP_NAME FROM DEPARTMENT');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    return [];
}
