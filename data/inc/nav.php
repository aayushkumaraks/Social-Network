<?php
include_once "../data/inc/sessionchk.php";
include_once "../data/inc/msg_queries.php";
$not_q = $gMSG;
$fetch_not = mysqli_query($conn, $not_q);
$nav_news = "SELECT * FROM `updates`";
$fet_nav = mysqli_query($conn, $nav_news);



if($_SESSION['auth']=='user'){
    $hide='hidden';
    $hud = NULL;
}
else{
    $hide = NULL;
    $hud = 'hidden';
}

if($_SESSION['auth']=='mod'){
    $had = NULL;
}
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Welcome To ISN</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <?php
                $not_count= 0;
               while($not_row=mysqli_fetch_assoc($fetch_not) AND $not_count<5){
                   $not_count++;
                    ?>

                <li>
                    <a href="messages.php">
                        <div>
                            <strong><?php echo $not_row['name']; ?></strong>
                            <span class="pull-right text-muted">
                                        <em><?php echo $not_row['dateNtime']; ?></em>
                                    </span>
                        </div>
                        <div><?php echo $not_row['content']; ?></div>
                    </a>
                </li>
                <li class="divider"></li>
                <?php
                }
                ?>

            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown <?php echo $hud; ?>">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-exclamation-triangle fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-tasks">
                <li>
                    <a href="#">
                        <div>
                            <p>
                                <strong>Paapi Meter</strong>
                                <span class="pull-right text-muted"><?php echo $_SESSION['mark']; ?> Paap Yet</span>
                            </p>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $_SESSION['mark']; ?>" aria-valuemin="0" aria-valuemax="4" style="width: <?php echo ($_SESSION['mark'])*25; ?>%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
            </ul>
            <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <?php
                    while($row_new = mysqli_fetch_assoc($fet_nav)) {
                        ?>
                        <li>
                            <a href="news.php">
                                <div>
                                    <i class="fa fa-newspaper-o fa-fw"></i> <?php echo $row_new['title']; ?>
                                    <span class="pull-right text-muted small"><?php echo $row_new['dateNtime']; ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php
                    }
                ?>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['photo']).'" class="img-rounded img-responsive center-block" style="max-width:80%;max-height:50%;"/>' ?>
                    <p class="text-center">
                        <br />
                        <b>Welcome <?php echo $_SESSION['name']; ?>!</b>
                    </p>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="messages.php"><i class="fa fa-dashboard fa-fw"></i> Messages</a>
                </li>
                <li>
                    <a href="news.php"><i class="fa fa-bar-chart-o fa-fw"></i>News</a>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="forum.php"><i class="fa fa-table fa-fw"></i> Forum</a>
                </li>
                <li>
                    <a href="contacts.php"><i class="fa fa-edit fa-fw"></i> Contacts</a>
                </li>
                <li class="<?php echo $hide; ?>">
                    <a href="#"><i class="fa fa-users fa-fw"></i> Members<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="addmemb.php" class="<?php echo $had; ?>">Add Users</a>
                        </li>
                        <li>
                            <a href="udetails.php" class="<?php echo $had; ?>">Check User Details</a>
                        </li>
                        <li>
                            <a href="blocked.php">Blocked Users</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="<?php echo $hide.$hud; ?>">
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="<?php echo $hide.$hud; ?>">
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank.php">Blank Page</a>
                        </li>
                        <li>
                            <a href="#">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<?php
$broad_q = "SELECT * FROM `broadcast`";
$fetch_broad = mysqli_query($conn, $broad_q);
?>
<marquee><b><?php while($brow=mysqli_fetch_assoc($fetch_broad)){ echo $brow['bmsg']." | "; }?></b></marquee>
