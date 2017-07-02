<?php
include_once "../data/inc/sessionchk.php";
if($_SESSION['auth']=='mod'){
    $contacts = "SELECT * FROM `user` WHERE `user`.`mark`=4";
}
$fetch_Cont = mysqli_query($conn, $contacts);

if(isset($_POST['unblock'])){
    $uid = $_POST['uid'];
    $del_q = "UPDATE `user` SET `mark` = '0' WHERE `user`.`sid` = '$uid'";
    mysqli_query($conn, $del_q);
    header("Refresh:0");
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

    <title>ISN | Blocked Users</title>

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
        <div class="panel">
            <div class="panel-heading">
                <h3l>Blocked Users</h3l>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Course, Branch & Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($fetch_Cont))
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" class="img-rounded img-thumbnail center-block" style="max-width:70px;"/>' ?>

                            </td>
                            <td>
                                <?php
                                echo $row['name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['uname'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['pass'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['qual'].' '.$row['branch'].' '.$row['year'];
                                ?>
                            </td>
                            <td>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="uid" value="<?php echo $row['sid']; ?>" />
                                    <button class="btn btn-success form-control" name="unblock"><i class="fa fa-ticket"></i> Unblock</button>
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Posting quetion -->
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
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
</body>

</html>
