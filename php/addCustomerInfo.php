<?php
    include('dbconnect.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $lname = $_POST['lastName'];
        $fname = $_POST['firstName'];
        $mname = $_POST['middleName'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $detailedAdd = $_POST['detailedAdd'];
        $contact = $_POST['contact'];

        

        $sql = "INSERT INTO customerinfo VALUES ('','$lname', '$fname', '$mname', '$province','$city', '$barangay', '$detailedAdd', '$contact')";
        
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