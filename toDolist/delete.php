<?php
    include "dbConn.php";
    $id = $_GET['id'];
    $wDb = $_GET['db'];
    $del = mysqli_query($db,"delete from $wDb where id = '$id'");
    if($del)
{
    mysqli_close($db); // Close connection
    header("location:index.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>