<?php
include_once "../data/inc/sessionchk.php";

$user = $_SESSION['user'];
$fee_q = "SELECT * FROM `fee_rec` WHERE `fee_rec`.`uname` = '$user'";
$fetch_fee = mysqli_query($conn, $fee_q);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ISN | Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        <br /><br /><br /><br /><br />
        <div class="row">
            <div class="col-lg-12 text-center te">
                <b>Name :</b> <?php echo $_SESSION['name']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>Username :</b> <?php echo $_SESSION['uname']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>Authority :</b> <?php echo $_SESSION['auth']; ?>
            </div>

            <div class="col-lg-12 text-center">
                <b>Roll No. :</b><?php echo $_SESSION['rollno']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>Registration Number :</b><?php echo $_SESSION['reg']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>DOB :</b><?php echo $_SESSION['dob']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>Branch :</b><?php echo $_SESSION['branch']; ?>
            </div>
            <div class="col-lg-12 text-center">
                <b>Year :</b><?php echo $_SESSION['year']; ?>
            </div>
        </div>

        <div class="row">
            <?php
                while($fee_row = mysqli_fetch_assoc($fetch_fee)) {
                    ?>
                    <h1>TOTAL FEE: <?php echo $fee_row['total_fee']; ?></h1>
                    <h1>FEE PAID: <?php echo $fee_row['fee_paid']; ?></h1>
                    <?php
                }
            ?>
        </div>
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
