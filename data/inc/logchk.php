<?php
include_once "../data/inc/dbcon.php";
session_start();
if(empty($_SESSION['user'])){
    echo " ";
}
else{
    header("Location: index.php");
}
if(isset($_POST['submit'])){

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    if(empty($user) || empty($pass)){
        die("Login kr bhai. Bakaiti nahi!!!");
    }

    $chk = "SELECT * FROM `user` WHERE `user`.`uname`='$user' AND `user`.`pass`='$pass'";
    $fetch_user = mysqli_query($conn,$chk);
    if(!mysqli_num_rows($fetch_user) == 0){
        while($row = mysqli_fetch_assoc($fetch_user)){
            $_SESSION['user'] = $row['uname'];
            $_SESSION['pass'] = $row['pass'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['rollno'] = $row['rollno'];
            $_SESSION['reg'] = $row['reg'];
            $_SESSION['auth'] = $row['auth'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['qual'] = $row['qual'];
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['branch'] = $row['branch'];
            $_SESSION['year'] = $row['year'];
            $_SESSION['mark'] = $row['mark'];

        }

        header("Location: index.php");
    }
    else{
        ?>
        <script>
            alert("chutiya kat gya hahahaha");
        </script>
        <?php
    }
}
?>