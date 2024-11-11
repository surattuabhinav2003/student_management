<?php
include 'db.php';
$name = $_POST['name'];
$rollno = $_POST['rollno']; 
$class = $_POST['class']; 
$mid1 = $_POST['mid1'];
$mid2 = $_POST['mid2'];
$weekly_marks = $_POST['weekly_marks'];
$attendance_marks = $_POST['attendance_marks'];
$sql = "INSERT INTO students (name, rollno, class, mid1, mid2, weekly_marks, attendance_marks) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssiii", $name, $rollno, $class, $mid1, $mid2, $weekly_marks, $attendance_marks);
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
header("Location: index.php");
exit();
?>
