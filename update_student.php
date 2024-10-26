<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $action = $_POST['action'];

    if ($action == 'add') {
        $sql = "INSERT INTO students (name, email, phone, address) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $phone, $address]);
    } elseif ($action == 'update' && $id) {
        $sql = "UPDATE students SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $phone, $address, $id]);
    }

    header('Location: index.php');
    exit();
}
?>
