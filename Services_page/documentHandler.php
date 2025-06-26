<?php
session_start();
header('Content-Type: application/json');

include '../conn.php'; 

$link = $_GET['content'] ?? '';
$docuItems = [];

$deptMap = [
    'civilregistry' => 'CivilRegistry',
    'engineering' => 'Engineering',
    'treasury' => 'Treasury',
    'healthoffice' => 'Health Office',
    'businesspermits&licensingoffice' => 'BusinessPermits'
];

if (array_key_exists($link, $deptMap)) {
    $dept = $deptMap[$link];
    $stmt = $conn->prepare("SELECT * FROM documents_list WHERE dept = ? AND availability = 'Available'");

    if ($stmt) {
        $stmt->bind_param("s", $dept);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($docu = mysqli_fetch_assoc($result)) {
            $docuItems[] = $docu;
        }

        echo json_encode($docuItems);
    } else {
        echo json_encode(['error' => 'SQL error: ' . $conn->error]);
    }
} else {
    echo json_encode(['error' => 'Invalid or missing content parameter']);
}
?>
