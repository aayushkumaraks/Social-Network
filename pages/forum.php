<?php
include_once "../data/inc/sessionchk.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ISN | Forum</title>

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
        <!-- Body -->
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Order By Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td>
                                <div class="panel">
                                    <div class="panel-body">
                                        <h4><b>Question is here ?</b></h4>
                                        <b>Answers:</b><br>
                                        <table class="table-bordered table-responsive table" style="font-size: 12px">
                                            <tr>
                                                <td>
                                                    <blockquote><p><img src="../data/u_image/user.png" class="img-thumbnail" height="50" width="50" /> answer answer he answer h dher saara answer h jo ukhaadna h ukhaad yehi answer h</p><footer>Ayush K Sinha CSE 4th YEAR</footer></blockquote>
                                                    <a href="#more1" data-toggle="collapse" data-target="#more1">More..</a>
                                                    <div class="collapse" id="more1">
                                                        <blockquote><p><img src="../data/u_image/user.png" class="img-thumbnail" height="50" width="50" /> answer answer he answer h dher saara answer h jo ukhaadna h ukhaad yehi answer h</p><footer>Ayush K Sinha CSE 4th YEAR</footer></blockquote>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form class="form-group-lg">
                                                        <textarea class="form-control" style="min-width: 100%;" placeholder="Your reply here!"></textarea><br/>
                                                        <input type="submit" value="Reply" class="btn btn-primary btn-group-lg" />
                                                    </form>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
</script>

</body>

</html>
