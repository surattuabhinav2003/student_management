<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>
        
        <form name="studentForm" action="add_student.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="rollno" placeholder="Roll No" required>
            <input type="text" name="class" placeholder="Class" required>
            <input type="number" name="mid1" placeholder=" Enter Mid 1 Marks out of 18" required>
            <input type="number" name="mid2" placeholder=" Enter Mid 2 Marks out of 18" required>
            <input type="number" name="weekly_marks" placeholder="Enter Weekly Marks out of10" required>
            <input type="number" name="attendance_marks" placeholder=" Enter Attendance Marks out of 2" required>
            
            <button type="submit">Add Student</button>
        </form>
        
        <h2>Student List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Class</th>
                <th>Mid 1 Marks</th>
                <th>Mid 2 Marks</th>
                <th>Weekly Marks</th>
                <th>Attendance Marks</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'db.php';
            $result = $conn->query("SELECT * FROM students");
            while ($row = $result->fetch_assoc()) {
                 $max_mid = max($row['mid1'], $row['mid2']);
                $min_mid = min($row['mid1'], $row['mid2']);
                $total = ($max_mid * 0.8) + ($min_mid * 0.2) + $row['weekly_marks'] + $row['attendance_marks'];
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['rollno']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['mid1']}</td>
                        <td>{$row['mid2']}</td>
                        <td>{$row['weekly_marks']}</td>
                        <td>{$row['attendance_marks']}</td>
                        <td>{$total}</td>
                        <td>
                            <a href='edit_student.php?id={$row['id']}'>Edit</a>
                            <a href='delete_student.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
