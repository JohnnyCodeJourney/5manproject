<?php
session_start();
require 'dbconnect.php'; 

$email = $_SESSION['email']; // Use email from session

$oldPassword = $_POST['oldPassword'] ?? '';
$newPassword = $_POST['newPassword'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

if ($newPassword !== $confirmPassword) {
    echo "<script>
        window.history.back();
        alert('New passwords do not match.');
    </script>";
    exit;
}

// Fetch current password from DB (plain text)
$stmt = $con->prepare("SELECT password FROM accounts WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($currentPassword);
$stmt->fetch();
$stmt->close();

if (!$currentPassword || $oldPassword !== $currentPassword) {
    echo "<script>
        window.history.back();
        alert('Old password is incorrect.');
    </script>";
    exit;
}

// Update password (plain text)
$stmt = $con->prepare("UPDATE accounts SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $newPassword, $email);

if ($stmt->execute()) {
    echo "<script>
        alert('Password changed successfully!');
        window.location.href = 'homepage.php';
    </script>";
} else {
    echo "<script>
        window.history.back();
        alert('Error updating password.');
    </script>";
}
$stmt->close();
$con->close();
?>