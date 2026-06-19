<?php

$conn = new mysqli(
    "localhost",
    "root",
    "Sa@217270",
    "blog"
);

if ($conn->connect_error) {
    die("Connection Failed");
}

?>