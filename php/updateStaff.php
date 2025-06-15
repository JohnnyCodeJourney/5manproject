<?php
    include 'dbconnect.php';

    $id = $_POST['id'];
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $MiddleInitial = $_POST['MiddleInitial'];
    $Address = $_POST['Address'];
    $ContactNumber = $_POST['ContactNumber'];
    $Salary = $_POST['Salary'];

    $sql = "UPDATE staffrecords SET LastName=?, FirstName=?, MiddleInitial=?, Address=?, ContactNumber=?, Salary=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssi", $LastName, $FirstName, $MiddleInitial, $Address, $ContactNumber, $Salary, $id);
    $stmt->execute();

    header("Location: homepage.php");
    exit();
?>