<?php
    include('dbconnect.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM customerinfo WHERE customerID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: homepage.php");
    exit();
?>
