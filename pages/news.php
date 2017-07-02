<?php
include_once "../data/inc/sessionchk.php";

if($_SESSION['auth']=='admin' OR $_SESSION['auth']=='mod'){
    $limit = 100;
}
else{
    $limit = 7;
}
$news_q = "SELECT * FROM `updates` ORDER BY `id` DESC limit $limit";
$fetch_news = mysqli_query($conn, $news_q);

include_once "../data/inc/del_news.php";

if(isset($_POST['addup'])){
    $name = $_SESSION['uname'];
    $date = date("Y-m-d H:i:s");
    $title = $_POST['title'];
    $content = $_POST['content'];

    $target_dir = "../shareable/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $up_query = "INSERT INTO `updates` (`id`, `title`, `dateNtime`, `newsby`, `content`, `media`) VALUES (NULL, '$title', '$date', '$name', '$content', '$target_file')";
            mysqli_query($conn, $up_query);
            header("Refresh:0");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }







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

    <title>ISN | News & Updates</title>

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
                <h3>Latest Updates: <button class="btn btn-primary <?php echo $hide ?>" data-toggle="modal" data-target="#update">Add Update</button></h3>
            </div>
        </div>
        <!-- Heading -->

        <!-- Body -->
        <?php
            while($news_row = mysqli_fetch_assoc($fetch_news))
            {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="padding-right: 10px;" class="<?php echo $hide ?>">
                            <form style="display: inline;" action="" method="post">
                                <abbr title="Delete this News?"><button class="btn btn-danger btn-xs" value="<?php echo $news_row['id']?>" name="newsdel">&times;</button></abbr>
                            </form>
                        </span>
                        <b style="text-align: left"><?php echo $news_row['title'].' | Date: '.$news_row['dateNtime'] .' | By: '.$news_row['newsby']; ?></b>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $news_row['content']; ?> <br /> <?php $file = $news_row['media']; if(!empty($file)) {?> <a href="<?php echo $file;?>">Download</a><?php } ?></p>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    <!-- /#page-wrapper -->

    <div id="update" class="modal fade" role="dialog">
        <div class="modal-dialog modal-primary">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add an Update</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <label>Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required/>
                        <br />
                        <label>File:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload" />
                        <br />
                        <label>Content:</label>
                        <textarea title="content" class="form-control" name="content" id="content">
                        </textarea>
                        <br />
                        <button class="btn btn-md btn-primary" name="addup" id="addup">Send!</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
