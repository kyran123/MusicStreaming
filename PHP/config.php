<?php
/**
 * Created by PhpStorm.
 * User: Kyran
 * Date: 10/12/2017
 * Time: 9:46 PM
 */

    ob_start();
    session_start();

    $timezone = date_default_timezone_set("Europe/Amsterdam");

    $con = mysqli_connect("localhost", "root", "", "musicstreaming");

    if(mysqli_connect_errno()){
        echo "Failed to connect: ". mysqli_connect_errno;
    }

?>