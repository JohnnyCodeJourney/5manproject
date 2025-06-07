<?php
    include 'dbconnect.php';
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $customerID = $_POST['customerID'];
        $carType = $_POST['carType'];
        $ratePerDay = $_POST['rate'];
        $numberOfDays = $_POST['numberOfDays'];
        $total = $_POST['total'];
        $dateStart = $_POST['dateStart'];
        $dateEnd = $_POST['dateEnd1'];

        $email = $_SESSION['email'];

        $sql_user = "SELECT username FROM accounts WHERE email = ?";
        $stmt_user = $con->prepare($sql_user);
        $stmt_user->bind_param("s", $email);
        $stmt_user->execute();
        $result_user = $stmt_user->get_result();
        $row_user = $result_user->fetch_assoc();
        $added_by = $row_user['username'];

        $stmt = $con->prepare("INSERT INTO rental (customerID, carType, ratePerDay, numberOfDays, total, dateStart, dateEnd, addedBy) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("issidsss", $customerID, $carType, $ratePerDay, $numberOfDays, $total, $dateStart, $dateEnd,$added_by);

        if ($stmt->execute()) {
            echo "<script>alert('Rental added successfully!'); window.location.href='homepage.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
    }


?>
