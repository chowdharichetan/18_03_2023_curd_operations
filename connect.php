<?php

$con = new mysqli('localhost', 'root', '', 'curd_news');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }   

?>
