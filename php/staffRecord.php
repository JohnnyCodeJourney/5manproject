
<?php
    include('dbconnect.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lastName = $_POST['LastName'];
        $firstName = $_POST['FirstName'];
        $middleInitial = $_POST['MiddleInitial'];
        $address = $_POST['Address'];
        $contactNumber = $_POST['ContactNumber'];
        $monthlySalary = $_POST['Salary'];

        $sql = "INSERT INTO staffrecords 
                (LastName, FirstName, MiddleInitial, Address, ContactNumber, Salary)
                VALUES ('$lastName', '$firstName', '$middleInitial', '$address', '$contactNumber', '$monthlySalary')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Staff added successfully!'); window.location.href='homepage.php';</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
?>