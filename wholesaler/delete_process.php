<?php
include_once 'config.php';
$sql = "DELETE FROM invoice WHERE invoice_id='" . $_GET["invoice_id"] . "'";
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    header('location:invoice.php');
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>