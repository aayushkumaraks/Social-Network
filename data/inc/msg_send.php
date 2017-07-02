<?php

if(isset($_POST['rly'])) {

$msgtoo = mysqli_real_escape_string($conn, $_POST['msgtoo']);
$msgbody = mysqli_real_escape_string($conn, $_POST['msgbody']);

    if(empty($msgtoo) || empty($msgbody)){
        echo "Error : Message is Not Valid";
        die();
    }
    $date = date("Y-m-d H:i:s");
    $from = $user;

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
    // Allow certain file formats
        if($imageFileType != "doc" && $imageFileType != "pdf" && $imageFileType != "ppt"
            && $imageFileType != "pptx" ) {
            echo "Sorry, only PPTX, PPT, DOC & PDF files are allowed.";
            $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $msg_quer = "INSERT INTO `isndb_db`.`msg` (`id`, `msgby`, `msgto`, `content`, `media`, `dateNtime`, `flag`) VALUES (NULL, '$from', '$msgtoo', '$msgbody', '$target_file', '$date', 0)";
                mysqli_query($conn, $msg_quer);
                header("Refresh:0");
            } else {
                echo "Sorry, there was an error uploading your file.";
                $msg_quer = "INSERT INTO `isndb_db`.`msg` (`id`, `msgby`, `msgto`, `content`, `media`, `dateNtime`, `flag`) VALUES (NULL, '$from', '$msgtoo', '$msgbody', NULL, '$date', 0)";
                mysqli_query($conn, $msg_quer);
                header("Refresh:0");
            }
        }

}

?>