<?php
include_once "../data/inc/sessionchk.php";

include_once "../data/inc/msg_queries.php";

include_once "../data/inc/msg_del.php";

include_once "../data/inc/msg_send.php";
$aeuth = $_SESSION['auth'];
if($_SESSION['auth']!='user'){
include_once "../data/inc/monitor.php";
}

if(isset($_POST['broad'])){

    $broad_msg = $_POST['bmsg'];
    $bins_q = "INSERT INTO `broadcast` (`id`, `bmsg`, `msgby`) VALUES (NULL, '$broad_msg', '$aeuth')";
    mysqli_query($conn, $bins_q);

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

    <title>ISN | Message</title>

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
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Messages <button class="btn btn-primary" data-toggle="modal" data-target="#createmsg" onclick="nwmsg()">Create Message</button>
                    <button class="btn btn-primary <?php echo $hide; ?> " data-toggle="modal" data-target="#broadcast">Broadcast</button>
                </h1>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#rec" data-toggle="tab">Inbox</a>
                    </li>
                    <li><a href="#sent" data-toggle="tab">Sent</a>
                    </li>
                </ul>
                <br />
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="rec">
                        <?php
                            include_once "../data/inc/rec_msg.php";
                        ?>
                    </div>
                    <div class="tab-pane fade" id="sent">
                        <?php
                            include_once "../data/inc/sent_msg.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($_SESSION['auth'] != 'user')
        {
            ?>
        <div class="row">
            <div class="page-header">
                <h1>Monitor Msg</h1>
            </div>
            <div class="media-body">
                    <?php
                    include_once "../data/inc/mon_table.php";
                    ?>
            </div>
        </div>
        <?php
        }
        ?>
    <!-- Message modal -->


        <div id="create" class="modal fade" role="dialog">
            <div class="modal-dialog modal-primary">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Type Your Response</h4>
                    </div>
                    <div class="modal-body">


                        <form method="post" action="" enctype="multipart/form-data">
                            <label>To:</label>
                            <input name="msgtoo" id="msgtoo" class="form-control disabled" readonly aria-disabled="true"/>
                            <br />
                            <label>File:</label>
                            <input type="file" name="file" id="file">
                            <br />
                            <label>Message:</label>
                            <textarea class="form-control" name="msgbody" id="msgbody">
                            </textarea>
                            <br />
                            <button class="btn btn-md btn-primary" name="rly" id="rly">Send!</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="createmsg" class="modal fade" role="dialog">
            <div class="modal-dialog modal-primary">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create New Message</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <label>To:</label>
                            <input name="msgtoo" id="msgtoo" class="form-control" required/>
                            <br />
                            <label>File:</label>
                            <input type="file" name="fileToUpload" id="file">
                            <br/>
                            <label>Message:</label>
                            <textarea class="form-control" name="msgbody" id="msgbody">
                            </textarea>
                            <br />
                            <button class="btn btn-md btn-primary" name="rly" id="rly">Send!</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="broadcast" class="modal fade" role="dialog">
            <div class="modal-dialog modal-primary">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Broadcast</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <label>Message:</label>
                            <textarea class="form-control" name="bmsg" id="bmsg">
                            </textarea>
                            <br />
                            <button class="btn btn-md btn-primary" name="broad" id="broad">Send!</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
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

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-sent').DataTable({
            responsive: true
        });
    });
    $(document).ready(function() {
        $('#dataTables-monitor').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
