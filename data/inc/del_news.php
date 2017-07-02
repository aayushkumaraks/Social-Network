<?php
if(isset($_POST['newsdel'])){
$del_id = $_POST['newsdel'];
$news_del = "DELETE FROM `updates` WHERE `updates`.`id` = '$del_id'";
mysqli_query($conn, $news_del);
header("Refresh:0");
}
?>