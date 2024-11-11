<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No student found with ID: $id";
        exit;
    }
} else {
    echo "No ID provided";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rollno = $_POST['rollno']; 
    $class = $_POST['class'];
    $mid1 = $_POST['mid1'];
    $mid2 = $_POST['mid2'];
    $weekly_marks = $_POST['weekly_marks'];
    $attendance_marks = $_POST['attendance_marks'];

    $sql = "UPDATE students SET name='$name', rollno='$rollno', class='$class', mid1='$mid1', mid2='$mid2', weekly_marks='$weekly_marks', attendance_marks='$attendance_marks' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br><br>
        
        <label for="rollno">Roll No:</label>
        <input type="text" id="rollno" name="rollno" value="<?php echo htmlspecialchars($row['rollno']); ?>" required><br><br>
        
        <label for="class">Class:</label> 
        <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($row['class']); ?>" required><br><br>

        <label for="mid1">Mid 1 Marks:</label>
        <input type="number" id="mid1" name="mid1" value="<?php echo htmlspecialchars($row['mid1']); ?>" required><br><br>

        <label for="mid2">Mid 2 Marks:</label>
        <input type="number" id="mid2" name="mid2" value="<?php echo htmlspecialchars($row['mid2']); ?>" required><br><br>

        <label for="weekly_marks">Weekly Marks:</label>
        <input type="number" id="weekly_marks" name="weekly_marks" value="<?php echo htmlspecialchars($row['weekly_marks']); ?>" required><br><br>

        <label for="attendance_marks">Attendance Marks:</label>
        <input type="number" id="attendance_marks" name="attendance_marks" value="<?php echo htmlspecialchars($row['attendance_marks']); ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
