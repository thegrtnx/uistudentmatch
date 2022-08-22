<?php include("component/top.php"); 

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("component/nav.php") ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">






                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <!-- Box Comment -->
                            <div class="card card-widget">


                                <div class="card-footer card-comments">
                                    <div class="card-comment">
                                        <!-- User image -->
                                        <?php

                                        $you = $t_users['usname'];
                                        

                                        $sql = "SELECT * FROM `chat` WHERE `recipient` LIKE '%%' AND `name` = '$you' GROUP BY `recipient` desc";
                                        $res = query($sql);
                                        while($row = mysqli_fetch_array($res)) {

                                            if($row['recipient'] == $you) {

                                                $reciver = $row['name'];

                                            } else {

                                                $reciver = $row['recipient'];
                                            }
                                            
                                        ?>

                                        <div class="comment-text mb-4">
                                            <span class="username mb-3">
                                                <?php echo ucfirst($reciver) ?>
                                                <span
                                                    class="text-muted float-right"><?php echo date('F d, Y - h:m:sa', strtotime($row['created_on'])); ?></span>
                                            </span><!-- /.username -->
                                            <?php echo $row['message'] ?>
                                            <br />
                                            <a href="./message?user=<?php echo $reciver ?>"
                                                class="btn btn-primary text-white mt-3">Reply Message
                                            </a>
                                        </div>
                                        <!-- /.comment-text -->

                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>

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