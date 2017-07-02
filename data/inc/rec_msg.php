<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr><th>SNo.</th>
        <th>Date & Time</th>
        <th>Message From</th>
        <th>Message</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    while($row = mysqli_fetch_assoc($fetch_msg)) {
        $count++;
        ?>
        <tr>
            <td>
                <?php echo $count; ?>
            </td>
            <td>
                <?php
                echo $row['dateNtime'];
                ?>
            </td>
            <td>
                <b><?php
                    $target = $row['msgby'];
                    echo $row['name']." ".'('.$target.')';
                    ?>
                </b>
                <br />
                <?php
                echo $row['branch']." ".$row['year'];
                ?>

            </td>
            <td>
                <?php
                echo $row['content'];
                $filwas = $row['media'];
                if(!empty($filwas))
                {
                    ?>
                    <a href="<?php echo $filwas?>">Attachment</a>
                    <?php
                }
                ?>
            </td>
            <td>
                <button type="submit" class="btn btn-primary btn-sm" id="rply" name="rply" data-toggle="modal" data-target="#create" onclick="reply()" value="<?php echo $target; ?>">Reply <i class="fa fa-reply"></i></button>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
                    <button type="submit" class="btn btn-danger btn-sm" name="del">Del <i class="fa fa-times"></i></button>
                </form>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>

<script>
    function reply() {
        var Inome = document.getElementById("rply").value;
        document.getElementById("msgtoo").value = Inome;
    }
</script>