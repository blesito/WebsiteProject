<?php 
    $servername ="localhost";
    $username = "root";
    $password = "";
    $dbname = "law";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn) {

    } else {
        echo "ERROR!";
    }
?>