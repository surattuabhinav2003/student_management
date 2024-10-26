<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            const email = document.forms["studentForm"]["email"].value;
            const phone = document.forms["studentForm"]["phone"].value;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            const phonePattern = /^(\+?\d{1,3}[- ]?)?\d{10}$/;
            if (phone && !phonePattern.test(phone)) {
                alert("Please enter a valid phone number (e.g., 123-456-7890 or +1234567890).");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>
        <form name="studentForm" action="add_student.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone number" placeholder="Phone">
            <textarea name="address" placeholder="Address"></textarea>
            <button type="submit">Add Student</button>
        </form>
        
        <h2>Student List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php
            include 'db.php';
            $result = $conn->query("SELECT * FROM students");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
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
