<?php
include_once "../data/inc/sessionchk.php";
$user = $_SESSION['user'];
if($user=='sudo'){
    ?>
    <a href="logout.php"><b>LOGOUT</b></a>
    <iframe src="/phpmyadmin/db_structure.php?server=1&db=isndb_db" height="100%" width="100%">
        <p>asdas</p>
    </iframe>
    <?php
    die();
}
$for_q = "SELECT `forum`.`id`, `forum`.`question`, `forum`.`quesby`, `forum`.`bestans`, `forum_reply`.`replyby`, `user`.`qual` FROM `forum`,`forum_reply`,`user` WHERE `forum`.`id` = `forum_reply`.`questionid` AND `forum_reply`.`replyby`=`user`.`uname` AND `forum`.`quesby` = '$user'";
$fetch_for = mysqli_query($conn, $for_q);

if(isset($_POST['forpost'])){
    $name ='';

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

    <title>ISN | Home</title>

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
                    <h3>Post a question:</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data" >
                    <textarea class="form-control" name="forques" cols="10" rows="5" required></textarea><br/>
                    <input class="btn btn-primary btn-group-lg" name="forpost" type="submit" value="Post" />
                    </form>
                </div>
            </div>
            <!-- Posting quetion -->

            <!-- latest quetions -->
            <?php
            while($for_r = mysqli_fetch_assoc($fetch_for))
            {
                $quesid = $for_r['questionid'];
                $forR_q = "SELECT `forum_reply`.`replyby`, `forum_reply`.`reply`, `user`.`qual`, `user`.`qual` FROM `forum_reply`,`user` WHERE `forum_reply`.`replyby`=`user`.`uname` AND `forum_reply`.`questionid` = '$quesid'";
                $fetch_forR = mysqli_query($conn, $forR_q);
                ?>
                <div class="panel">
                    <div class="panel-body">
                        <h4><b><?php echo $for_r['question'] ?></b></h4>
                        <b>Answers:</b><br>
                        <table class="table-bordered table-responsive table" style="font-size: 12px">
                            <tr>
                                <td>
                                    <blockquote><p><img src="../data/u_image/user.png" class="img-thumbnail" height="50" width="50"/><?php echo $for_r['bestans'] ?></p>
                                        <footer><?php echo 'By. '.$for_r['replyby'].' '.$for_r['qual'] ?></footer>
                                    </blockquote>
                                    <a href="#more" data-toggle="collapse" data-target="#more">More..</a>
                                    <div class="collapse" id="more">
                                        <?php
                                        while($forR_r = mysqli_fetch_assoc($fetch_forR))
                                        {
                                            ?>
                                        <blockquote><p><img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($forR_q['photo']) ?>" class="img-thumbnail" height="50" width="50"/>
                                                answer answer he answer h dher
                                                saara answer h jo ukhaadna h ukhaad yehi answer h</p>
                                            <footer>Ayush K Sinha CSE 4th YEAR</footer>
                                        </blockquote>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <form>
                                        <textarea class="form-control" placeholder="Your reply here!"></textarea><br/>
                                        <input type="submit" value="Reply" class="btn btn-primary btn-group-lg"/>
                                    </form>
                                </td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
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
