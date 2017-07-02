<?php
include_once "../data/inc/dbcon.php";
session_start();
if(empty($_SESSION['user'])){
    header("Location: login.php");
    die("don't be a smartass");
}
if($_SESSION['mark']==4){
    die("Paap ka ghada bhar gya h beta tumhara! Contact your HOD now!");
}
?>