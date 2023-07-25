<?php
include 'db.php';

$patienCountQuery = "SELECT COUNT(patient_id) AS count_of_patients FROM tbl_225_request join 
                                                                        tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join
                                                                                      tbl_225_doctor on tbl_225_doctor_method.doctor_id = tbl_225_doctor.id where tbl_225_doctor.user_id = " . $_SESSION["id"] . ";";

$patientCountRes = mysqli_query($con, $patienCountQuery);
$patientCountRow = mysqli_fetch_assoc($patientCountRes);
$patientCount = $patientCountRow["count_of_patients"];
mysqli_free_result($patientCountRes);

$requestCountQuery = "SELECT COUNT(tbl_225_request.id) AS count_of_requests FROM tbl_225_request join 
                                    tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join
                                                                                    tbl_225_doctor on tbl_225_doctor_method.doctor_id = tbl_225_doctor.id where tbl_225_doctor.user_id = " . $_SESSION["id"] . ";";

$requestCountRes = mysqli_query($con, $requestCountQuery);
$requestCountRow = mysqli_fetch_assoc($requestCountRes);
$requestCount = $requestCountRow["count_of_requests"];

mysqli_free_result($requestCountRes);
$unsolvedRequestCountQuery = "SELECT COUNT(tbl_225_request.id) AS count_of_unsolved_requests FROM tbl_225_request join 
                                    tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join
                                                                                    tbl_225_doctor on tbl_225_doctor_method.doctor_id = tbl_225_doctor.id where tbl_225_doctor.user_id = " . $_SESSION["id"] . " and tbl_225_request.proccessed = 0;";



$unsolvedRequestCountRes = mysqli_query($con, $unsolvedRequestCountQuery);
$unsolvedRequestCountRow = mysqli_fetch_assoc($unsolvedRequestCountRes);
$unsolvedRequestCount = $unsolvedRequestCountRow["count_of_unsolved_requests"];

$solvedRequestCountQuery = "SELECT COUNT(tbl_225_request.id) AS count_of_solved_requests FROM tbl_225_request join 
                                    tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join
                                                                                    tbl_225_doctor on tbl_225_doctor_method.doctor_id = tbl_225_doctor.id where tbl_225_doctor.user_id = " . $_SESSION["id"] . " and tbl_225_request.proccessed = 1;";



$solvedRequestCountRes = mysqli_query($con, $solvedRequestCountQuery);
$solvedRequestCountRow = mysqli_fetch_assoc($solvedRequestCountRes);
$solvedRequestCount = $solvedRequestCountRow["count_of_solved_requests"];



mysqli_free_result($unsolvedRequestCountRes);
mysqli_close($con);
