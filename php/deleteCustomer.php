<?php
    include('dbconnect.php');
    $id = $_GET['id'];

    $sql1 = "DELETE FROM rental WHERE customerID = ?";
    $stmt1 = $con->prepare($sql1);
    $stmt1->bind_param("i", $id);
    $stmt1->execute();

    $sql = "DELETE FROM customerinfo WHERE customerID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: homepage.php");
    exit();
?>
