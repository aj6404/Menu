<?php
include_once 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobClass = trim($_POST['job_class']);
    $chargePerHour = trim($_POST['chg_hour']);

    if ($jobClass && $chargePerHour !== '') {
        try {
            $stmt = $db->prepare("INSERT INTO JOB (JOB_CLASS, CHG_HOUR) VALUES (?, ?)");
            $stmt->execute([$jobClass, $chargePerHour]);
            $message = 'Job added successfully.';
            header('Location: ../html/view_jobs.php?message=' . urlencode($message));
            exit();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            $message = "Error: Unable to add job. Wrong values entered. " . $e->getMessage();
        }
    } else {
        $message = 'Please fill all the required fields.';
    }
    
    // If there was an error, stay on the add_job page and show the message
    if (!empty($message)) {
        echo "<script>alert('$message'); window.location
.href='../html/add_job.php';</script>";
exit();
}
}
?>