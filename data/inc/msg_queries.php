<?php

$user = $_SESSION['user'];
$gMSG = "SELECT * FROM `msg`,`user` WHERE `msg`.`msgto`='$user' AND `msg`.`msgby`=`user`.`uname` ORDER BY `msg`.`dateNtime` DESC";
$fetch_msg = mysqli_query($conn, $gMSG);
$sMSG = "SELECT * FROM `msg`,`user` WHERE `msg`.`msgby`='$user' AND `msg`.`msgto`=`user`.`uname` ORDER BY `msg`.`dateNtime` DESC";
$fetch_mgs = mysqli_query($conn, $sMSG);

?>