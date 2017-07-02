<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-sent">
    <thead>
    <tr><th>SNo.</th>
        <th>Date & Time</th>
        <th>Message to</th>
        <th>Message</th>
    </thead>
    <tbody>
    <?php
    $cout = 0;
    while($rows = mysqli_fetch_assoc($fetch_mgs)) {
        $cout++;
        ?>
        <tr>
            <td>
                <?php echo $cout; ?>
            </td>
            <td>
                <?php
                echo $rows['dateNtime'];
                ?>
            </td>
            <td>
                <?php
                $torget = $rows['msgto'];
                echo $rows['name']." ".'('.$torget.')';
                ?>
            </td>
            <td>
                <?php echo $rows['content'];
                $filwa = $rows['media'];
                if(!empty($filwa))
                {
                    ?>
                    <a href="<?php echo $filwa ?>">Attachment</a>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>