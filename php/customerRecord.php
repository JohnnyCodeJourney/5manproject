<?php
    include('dbconnect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $lastName = $_POST['last_name'];
        $firstName = $_POST['first_name'];
        $middleInitial = $_POST['middle_initial'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contact_number'];

        $sql = "INSERT INTO customerrecords VALUES ('',' $lastName', '$firstName', '$middleInitial', '$address',$contactNumber)";
        
        if (mysqli_query($con, $sql)) {
            echo 
            "<script type='text/javascript'>alert('Details submitted successfully!');
            window.location.href = 'homepage.php';
            </script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }


?>