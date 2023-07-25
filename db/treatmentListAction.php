<?php
include 'db.php';
if ($_POST['buttonType'] === 'delete') {
    $id = $_POST['id'];
    $deleteTreatmentQuery = "DELETE FROM tbl_225_treatments WHERE id = " . $id;
    $deleteTreatmentRes = mysqli_query($con, $deleteTreatmentQuery);

    if ($deleteTreatmentQuery) {

        echo "Data deleted successfully!";
    } else {
        echo "Error deleting data";
    }
}
if ($_POST['buttonType'] === 'edit') {
    $id = $_POST['id'];
    $requestEditingTreatmentQuery = "UPDATE tbl_225_treatments SET edit = '1' WHERE id = " . $id;
    $requestEditingTreatmentRes = mysqli_query($con, $requestEditingTreatmentQuery);
    if ($requestEditingTreatmentRes) {
        echo 'edit request sent';
    } else {
        echo 'failed';
    }
}
mysqli_close($con);
