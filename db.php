<?php
$dbPath = __DIR__ . '/../db/enigma.db';


// Function to connect to the database
function connectToDB($dbPath) {
    try {
        $db = new PDO('sqlite:' . $dbPath);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "An error occurred while connecting to the database: " . $e->getMessage();
        return null;
    }
}


$db = connectToDB($dbPath);
if ($db) {
    // echo "Connected to the database successfully.";
} else {
    echo "Failed to connect to the database.";
}
?>
