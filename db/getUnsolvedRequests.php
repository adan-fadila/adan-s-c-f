<?php
include "db.php";
$unsolvedRequestQuery = "SELECT tbl_225_request.id,fullName,Birthday,patient_id  FROM tbl_225_request join tbl_225_users on tbl_225_users.pid = tbl_225_request.patient_id join
    tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join
                                                    tbl_225_doctor on tbl_225_doctor_method.doctor_id = tbl_225_doctor.id where tbl_225_doctor.user_id = " . $_SESSION["id"] . " and tbl_225_request.proccessed = 0 order by tbl_225_request.send_time desc;";

$unsolvedRequestRes = mysqli_query($con, $unsolvedRequestQuery);
