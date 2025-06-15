<?php
include('dbconnect.php');
if (isset($_POST['DelID'])) {
    $id = $_POST['DelID'];
    $stmt = $con->prepare("DELETE FROM staffrecords WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    header("Location: staffRecord.php"); // Adjust if filename differs
    exit();
}
?>
