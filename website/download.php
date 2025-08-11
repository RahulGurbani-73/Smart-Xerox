<?php
include "conn.php"; // Ensure the database connection is included

$uploadDir = "C:/xampp/htdocs/Smart_Xerox/website/";

if (isset($_GET['file'])) {
    $fileName = basename($_GET['file']);
    $filePath = $uploadDir . $fileName;

    if (file_exists($filePath)) {
        // Set headers to force download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($filePath));
        header('Pragma: public');
        header('Cache-Control: must-revalidate');

        readfile($filePath);
        exit;
    } else {
        exit("Error: File not found.");
    }
} else {
    exit("Error: No file specified.");
}
?>
