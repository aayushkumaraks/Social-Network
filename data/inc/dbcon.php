<?php
/**
 * Created by PhpStorm.
 * User: wolverine
 * Date: 17/4/17
 * Time: 12:43 PM
 */?>

<?php

$host = 'localhost';
$user = 'root';
$pass = 'ayush';
$db = 'isndb_db';

$conn = mysqli_connect($host,$user,$pass,$db);

if(empty($conn))
{
    ?>
    <script>
        alert("hogya kalyaaan");
    </script>
    <?php
    die();
}
?>
