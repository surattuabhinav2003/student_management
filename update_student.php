<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];  
    $class = $_POST['class'];   
    $mid1 = $_POST['mid1'];
    $mid2 = $_POST['mid2'];
    $weekly_marks = $_POST['weekly_marks'];
    $attendance_marks = $_POST['attendance_marks'];
    $action = $_POST['action'];
    if ($action == 'add') {
        $sql = "INSERT INTO students (name, rollno, class, mid1, mid2, weekly_marks, attendance_marks) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $rollno, $class, $mid1, $mid2, $weekly_marks, $attendance_marks]);
    } elseif ($action == 'update' && $id) {
        $sql = "UPDATE students SET name = ?, rollno = ?, class = ?, mid1 = ?, mid2 = ?, weekly_marks = ?, attendance_marks = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $rollno, $class, $mid1, $mid2, $weekly_marks, $attendance_marks, $id]);
    }
    header('Location: index.php');
    exit();
}
?>
