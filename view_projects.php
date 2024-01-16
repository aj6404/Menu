<?php
include_once 'db.php'; 

function fetchProjects() {
    $db = connectToDB(__DIR__ . '/../db/enigma.db'); 
    if ($db) {
        try {
            $stmt = $db->query('SELECT PROJ_NO, PROJ_NAME FROM PROJECT');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    return [];
}
