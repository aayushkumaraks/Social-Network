<?php
include_once "../data/inc/sessionchk.php";

$user = $_SESSION['user'];
$fetch_for = mysqli_query($conn, $for_q);

if(isset($_POST['add'])){
    $sname = $_POST['name'];
    $uname = $_POST['user'];
    $pass = $_POST['pass'];
    $dob = $_POST['date'];
    $rollno = $_POST['rollno'];
    $reg = $_POST['reg'];
    $auth = $_POST['auth'];
    $authck = 'user';
    if($_SESSION['auth']=="mod" AND $auth!=$authck)
    {
        ?>
            <script>
                alert("Error: MODERATORS can only add USERS");
            </script>
        <?php
        header("Refresh:0");
        die();
    }

    $qual = $_POST['qual'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $mark = 0;
    $fileName = $_FILES['photo']['name'];
    $tmpName  = $_FILES['photo']['tmp_name'];
    $fileSize = $_FILES['photo']['size'];
    $fileType = $_FILES['photo']['type'];
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $file = addslashes($content);
    fclose($fp);

    $ins_quer = "INSERT INTO `user` (`sid`, `uname`, `pass`, `name`, `dob`, `rollno`, `reg`, `auth`, `photo`, `qual`, `branch`, `year`, `mark`) VALUES (NULL, '$uname', '$pass', '$sname', '$dob', '$rollno', '$reg', '$auth','$file','$qual','$branch','$year',0)";
    mysqli_query($conn, $ins_quer);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ISN | Add Members</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <?php include_once "../data/inc/nav.php"; ?>
    <div id="page-wrapper">
        <div class="panel">
            <div class="panel-heading">
                <h3>Add Members</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-lg-6 col-md-12">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control form-group-sm">
                        <label>Roll No:</label>
                        <input type="number" name="rollno" class="form-control form-group-sm">
                        <label>Reg No:</label>
                        <input type="text" name="reg" class="form-control form-group-sm">
                        <label>Username:</label>
                        <input type="text" name="user" class="form-control form-group-sm">
                        <label>Password:</label>
                        <input type="text" name="pass" class="form-control form-group-sm">
                        <label>Photo:</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <label>DOB:</label>
                        <input type="date" placeholder="YYYY-MM-DD | example: 1996-03-29" name="date" class="form-control form-group-sm">
                        <label>Auth:</label>
                        <select class="form-control" name="auth">
                            <option value="user">User</option>
                            <option value="mod">Moderator</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label>Qualification/Course:</label>
                        <select class="form-control" name="qual">
                            <option value="B.tech">B.Tech</option>
                            <option value="M.tech">M.Tech</option>
                            <option value="Ph.D">Ph.D</option>
                            <option value="Diploma">Diploma</option>
                            <option value="MBA">MBA</option>
                            <option value="MCA">MCA</option>
                        </select>
                        <label>Branch:</label>
                        <select class="form-control" name="branch">
                            <option value="">---------</option>
                            <option value="CSE">Computer Science</option>
                            <option value="ECE">Electronics</option>
                            <option value="EEE">Electrical</option>
                            <option value="ME">Mechanical</option>
                            <option value="IT">Information Technology</option>
                        </select>
                        <label>Year:</label>
                        <select class="form-control" name="year">
                            <option value="">---------</option>
                            <option value="1st Year">1</option>
                            <option value="2nd Year">2</option>
                            <option value="3rd Year">3</option>
                            <option value="4th Year">4</option>
                            <option value="5th Year">5</option>
                            <option value="6th Year">6</option>
                        </select>
                        <br />
                        <input type="submit" class="btn btn-success form-inline" name="add" value="Add" style="width: 49%" />
                        <input type="reset" class="btn btn-danger form-inline" name="reset" value="Reset" style="width: 49%" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Posting quetion -->

        <!-- latest quetions -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
