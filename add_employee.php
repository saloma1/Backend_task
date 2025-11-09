<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $department = trim($_POST['department'] ?? '');


    if ($name === '' || $department === '') {
        echo "Please fill in all the fields.";
        exit;
    }
}

    $stmt= $conn->prepare("INSERT INTO employees (name, department) VALUES (?, ?)");
    $stmt -> bind_param("ss", $name, $department);
        if ($stmt ->execute()) {
            header("Location: add_employee.html?success=1");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
?>