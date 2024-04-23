<?php
require 'connection.php';
$email = $_POST['email'];
$id = $_POST['id'];

$deleteUser = "DELETE FROM userinfo WHERE email='$email' AND id='$id'";
$checkQuery = mysqli_query($con, $deleteUser);
if ($checkQuery == 0) {
    $response['error'] = "404";
    $response['message'] = "Failed to delete";
} else {
    $response['error'] = "200";
    $response['message'] = "User Delete Successful";
}
echo json_encode($response);

?>