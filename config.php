<?php 
    $conn = mysqli_connect("localhost", "root", "", "database");
    if(!$conn){
        echo mysqli_error($conn);
    }
?>