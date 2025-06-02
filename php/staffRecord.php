<?php
    include('dbconnect.php');

    $sql = "SELECT COUNT(*) AS count FROM staffrecords";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $generatedId = 2025 . ($row['count'] + 1);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $staffId = $_POST['staff_id'];
        $lastName = $_POST['last_name'];
        $firstName = $_POST['first_name'];
        $middleInitial = $_POST['middle_initial'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contact_number'];
        $monthlySalary = $_POST['monthly_salary'];

        $sql = "INSERT INTO staffrecords 
                VALUES ('$staffId', '$lastName', '$firstName', '$middleInitial', '$address', '$contactNumber', '$monthlySalary')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Staff added successfully!'); window.location.href='homepage.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>