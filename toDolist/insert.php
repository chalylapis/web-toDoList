<?php
$task = $_POST['task'];

// Database connection
include "dbConn.php";
    if ($task !== '') {
        $stmt = $db->prepare("insert into task(task) values(?)");
        $stmt->bind_param("s", $task);
        $execval = $stmt->execute();
        $stmt->close();
    }
    $db->close();

header("Location: index.php");
?>