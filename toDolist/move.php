<?php
// Database connection
include "dbConn.php";
$id = $_GET['id'];
$records = mysqli_query($db, "select task from task where id='$id'");
$data = mysqli_fetch_array($records);
$stmt = $db->prepare("insert into checked(task) values(?)");
$stmt->bind_param("s", $data['task']);

if ($execval = $stmt->execute()) {
    $del = mysqli_query($db,"delete from task where id = '$id'");
    $stmt->close();
    $db->close();
}

header("Location: index.php");
