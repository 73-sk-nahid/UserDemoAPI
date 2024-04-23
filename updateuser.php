<?php
    require 'connection.php';
    $id = $_REQUEST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE userinfo SET username='$username', email='$email' WHERE id='$id'";
    $result = mysqli_query($con, $updateQuery);

    if ($result > 0) {
        $response['error'] = "200";
        $response["message"] = "Update Successful";
    }
    else {
        $response["error"] = "404";
        $response["message"] = "Update Failed";
    }

    echo json_encode($response);

?>