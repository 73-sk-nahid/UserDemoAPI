<?php
require 'connection.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkUser = "SELECT email from userinfo WHERE email='$email'";
$checkQuery = mysqli_query($con, $checkUser);
if (mysqli_num_rows($checkQuery) == 0) {
    $insertQuery = "INSERT INTO userinfo(username, password, email) VALUES ('$username','$password','$email')";
    $_REQUEST = mysqli_query($con, $insertQuery);

    if ($_REQUEST) {
        $response['error'] = "000";
        $response['message'] = "Registration Successful";
    } else {
        $response['error'] = "001";
        $response['message'] = "Registration Failed";
    }
} else {
    $response['error'] = "003";
    $response['message'] = "This email already registered";
}

echo json_encode($response);    

?>