<?php

include '../../config.php';


if(isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];

    $query = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");

    $resultArray = mysqli_fetch_assoc($query);   

    // Converting and echoing PHP array ($resultArray) in JSON
    echo json_encode($resultArray);
}

?>