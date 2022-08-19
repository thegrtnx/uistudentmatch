<?php include("component/top.php"); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("component/nav.php") ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Welcome - <?php echo ucfirst($t_users['usname']) ?></h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">




                    <h5 class="mt-4 mb-4">Get someone to chat with</h5>

                    <div class="row">

                        <?php

                    $gend = $t_users['role'];
                    $data = $t_users['usname'];

                    if($gend == 'Male') {

                      $role = 'Female';
                      $pix = '../img/female.png';

                    } else {


                      $role = 'Male';
                      $pix = '../img/male.png';

                    }


                    $sql = "SELECT * FROM `users` WHERE `role` = '$role' AND `usname` <> '$data' ORDER BY RAND() desc";
                    $res = query($sql);
                    while($row = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-primary">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="<?php echo $pix ?>"
                                            alt="<?php echo ucwords($row['fullname']) ?>">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username"><?php echo ucwords($row['fullname']) ?></h3>
                                    <h6 class="widget-user-desc">Joined:
                                        <?php echo date('F d, Y', strtotime($row['date_reg'])); ?></h6>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-dark">
                                                <span class="float-left"><?php echo ucwords($row['inst']) ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark">
                                                <span class="float-left"><?php echo ucwords($row['bio']) ?></span>
                                            </a>
                                        </li>

                                        <?php

                                        if($t_users['wallet'] == 0 || $t_users['wallet'] == null || $t_users['wallet'] == '') {
                                        ?>

                                        <li class="nav-item justify-content-center text-center mb-2 mt-2">
                                            <a href=".././#pricing" class="btn btn-primary text-white">Subscribe to send
                                                a
                                                message
                                            </a>
                                        </li>

                                        <?php
                                        } else {
                                        ?>

                                        <li class="nav-item justify-content-center text-center mb-2 mt-2">
                                            <a href="./message?user=<?php echo $row['usname'] ?>"
                                                class="btn btn-primary text-white">Send a
                                                message
                                            </a>
                                        </li>

                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>

                        <?php
                    }
                    ?>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->

        <?php include("component/footer.php") ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
</body>

</html>