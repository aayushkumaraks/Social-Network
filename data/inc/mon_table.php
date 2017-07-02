<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-monitor">
    <thead>
    <tr><th>SNo.</th>
        <th>Date & Time</th>
        <th>Message From</th>
        <th>Message</th>
        <th>Action</th></tr>
    </thead>
    <tbody>
    <?php
    $co = 0;
    while($mon = mysqli_fetch_assoc($mon_fetch)) {
        $co++;
        ?>
        <tr>
            <td>
                <?php echo $co; ?>
            </td>
            <td>
                <?php
                echo $mon['dateNtime'];
                ?>
            </td>
            <td>
                <b><?php
                    $mon_target = $mon['msgby'];
                    echo $mon['name']." ".'('.$mon_target.')';
                    ?>
                </b>
                <br />
                <?php
                echo $mon['branch']." ".$mon['year'];
                ?>

            </td>
            <td>
                <?php
                echo $mon['content'];
                ?>
            </td>
            <td>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $mon['id']; ?>" name="mid" />
                    <input type="hidden" value="<?php echo $mon_target; ?>" name="muser" />
                    <button type="submit" class="btn btn-danger btn-sm" name="mod">Moderate <i class="fa fa-times"></i></button>
                </form>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
</table>