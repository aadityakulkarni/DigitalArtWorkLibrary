<?php
/**
 * Created by PhpStorm.
 * User: Aaditya
 * Date: 11/6/2016
 * Time: 10:28 PM
 */

$mysqli = mysqli_connect("localhost", "root", "", "art");
if ($mysqli->connect_error) {
    header("Location:error.php?id=99");
    exit();
}
mysqli_set_charset($mysqli, "utf8");
?>