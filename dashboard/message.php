<?php include("component/top.php"); 

if(!isset($_GET['user']) || $t_users['wallet'] == 0 || $t_users['wallet'] == null || $t_users['wallet'] == '') {

    redirect("./");
    
} else {

$data = clean(escape($_GET['user']));

}

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("component/nav.php") ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- =========================================================== -->

                    <!-- Direct Chat -->
                    <h4 class="mt-4 mb-4">Chat with <?php echo ucfirst($data);  ?></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DIRECT CHAT PRIMARY -->
                            <div class="card card-primary card-outline direct-chat direct-chat-primary">

                                <!-- /.card-header -->
                                <div class="card-body">


                                    <!-- Conversations are loaded here -->
                                    <div class="px-2 mt-3">

                                        <!-- Message. Default to the left -->
                                        <div class="col-6">



                                            <?php

                                                $you = $t_users['usname'];
                                                $them = $data;

                                                $sql = "SELECT * FROM `chat` WHERE `name` = '$you' AND `recipient` = '$them' OR `name` = '$them' AND `recipient` = '$you' ORDER BY `id` asc";
                                                $res = query($sql);
                                                while($row = mysqli_fetch_array($res)) {
                                                ?>

                                            <div class="mb-4">
                                                <h5><?php echo $row['name'] ?>: <i><?php echo $row['message'] ?></i>
                                                </h5>
                                                <small><?php echo date('F d, Y - h:m:sa', strtotime($row['created_on'])); ?></small>
                                            </div>



                                            <?php
                                            }
                                            ?>
                                        </div>



                                    </div>
                                    <!--/.direct-chat-messages-->


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Type Message ..."
                                                class="form-control" required>

                                            <input type="text" name="recmessage" value="<?php echo $data ?>"
                                                placeholder="Type Message ..." class="form-control" required hidden>
                                            <span class="input-group-append">
                                                <button type="submit" name="msgbtn"
                                                    class="btn btn-primary">Send</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!--/.direct-chat -->
                        </div>
                        <!-- /.col -->
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