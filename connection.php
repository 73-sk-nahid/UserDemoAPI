<?php

$con = mysqli_connect("localhost:3307", "root", "", "userdemo");

// Check connection
 if (!$con) {
     http_response_code(400);
 } else
     http_response_code(200);
?>