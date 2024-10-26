<?php
include 'db.php';
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
header("Location: index.php");
exit();
$conn->close();
?>
