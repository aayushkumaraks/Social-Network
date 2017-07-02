<?php
session_start();
if(!empty($_SESSION['name'])){
    session_destroy();
    header("Location: login.php");
}
else{
    ?>
    <script>
        alert("Invalid attempt");
    </script>
    <?php
    header("Location: login.php");
}
?>