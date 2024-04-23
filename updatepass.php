<?php
require 'connection.php';
$currentpass = md5($_REQUEST['oldpassword']);
$newpass = md5($_POST['newpassword']);
$email = $_REQUEST['email'];



$checkUser = "SELECT id from userinfo WHERE email='$email' AND password='$currentpass'";
$checkQuery = mysqli_query($con, $checkUser);
if (mysqli_num_rows($checkQuery) == 0) {
    $response["error"] = "404";
    $response["message"] = "Wrong Old Password";
} else {
    $updatePass = "UPDATE userinfo SET password='$newpass' WHERE email = '$email'";
    $result = mysqli_query($con, $updatePass);

    if ($result > 0) {
        $response['error'] = "200";
        $response["message"] = "Password Updated";
    } else {
        $response["error"] = "404";
        $response["message"] = "Password Update Failed";
    }
}



echo json_encode($response);
?>