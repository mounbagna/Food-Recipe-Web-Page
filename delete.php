<?php
include 'config.php';

$name = mysqli_real_escape_string($conn, $_GET['name']);
$deletequery = "DELETE FROM recipe_request WHERE  name='$name' ";
$query = mysqli_query($conn, $deletequery);

if ($query) {
    echo "<font color='red'>Record deleted successfully</font>";
    header("location:requestList.php");
} else {
    echo "<font color='red'>Failed</font>";
}
