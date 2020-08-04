<?php
include "dbConn.php";
$id = $_GET['id'];
$qry = mysqli_query($db, "select * from task where id='$id'");
$data = mysqli_fetch_array($qry);
if (isset($_POST['update'])) // when click on Update button
{
    $task = $_POST['task'];

    $edit = mysqli_query($db, "update task set task='$task'  where id='$id'");

    if ($edit) {
        mysqli_close($db); // Close connection
        header("location:index.php"); // redirects to all records page
        exit;
    } else {
        echo "Error edit record";
    }
}
?>
<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="fullname" value="<?php echo $data['fullname'] ?>" placeholder="Enter Full Name" Required>
  <input type="text" name="age" value="<?php echo $data['age'] ?>" placeholder="Enter Age" Required>
  <input type="submit" name="update" value="Update">
</form>
