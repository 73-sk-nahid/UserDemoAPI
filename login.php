<?php
require 'connection.php';
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkUser = "SELECT id, username, email from userinfo WHERE email='$email' AND password='$password'";
$checkQuery = mysqli_query($con, $checkUser);
if (mysqli_num_rows($checkQuery) == 0) {
    http_response_code(400);
    $response['error'] = "001";
    $response['message'] = "Login Failed";
} else {
    /* while ($row = mysqli_fetch_assoc($checkQuery)) 
    {
        $response['user'] = $row;
    } */
    http_response_code(200);
    $response['error'] = "000";
    $response['message'] = "Login Successful";
}
echo json_encode($response);

?>