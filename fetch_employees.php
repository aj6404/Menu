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
