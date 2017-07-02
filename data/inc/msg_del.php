<?php
if(isset($_POST['del'])){
    $m_id = $_POST['id'];

    $del_q = "DELETE FROM `msg` WHERE `msg`.`id` = '$m_id'";
    mysqli_query($conn, $del_q);
    ?>
    <script>
        alert("Message Deleted Successfully");
    </script>
    <?php
    header("Refresh:0");
}

?>