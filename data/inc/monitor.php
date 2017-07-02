<?php
/**
 * Created by PhpStorm.
 * User: wolverine
 * Date: 25/4/17
 * Time: 1:41 AM
 */
if($_SESSION['auth']=='mod' OR $_SESSION['auth']=='admin'){

    $mon_msg = "SELECT * FROM `msg`,`user` WHERE `msg`.`msgby`=`user`.`uname` AND `user`.`auth` = 'user'";
    $mon_fetch = mysqli_query($conn, $mon_msg);
}

if(isset($_POST['mod'])){

    if($_SESSION['auth']!='mod'){
        ?>
            <script>
                alert("Only moderators can moderate the msgs");
            </script>
        <?php
        header("Refresh:0");
        die();
    }
    $mid = $_POST['mid'];
    $muser = $_POST['muser'];
    $modding = "UPDATE `msg` SET `content` = '---The content has been moderated by $user---' WHERE `msg`.`id` = '$mid'";
    $mark_q = "UPDATE `user` SET `mark` = `mark`+1 WHERE `user`.`uname` = '$muser'";
    mysqli_query($conn, $modding);
    mysqli_query($conn, $mark_q);
    header("Refresh:0");
}
?>
