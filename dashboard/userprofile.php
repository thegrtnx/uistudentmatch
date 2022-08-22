<?php include("component/top.php");

if(!isset($_GET['user'])) {

    redirect("./");

} else {

    $data = clean(escape($_GET['user']));

    


    $sql = "SELECT * FROM `users` WHERE `usname` = '$data'";
    $res = query($sql);
    $row = mysqli_fetch_array($res);

    if($row['role'] == 'Male') {

        $pix = '../img/female.png';
  
      } else {
  
        $pix = '../img/male.png';
  
      }
}
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("component/nav.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo ucfirst($data) ?> Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 justify-content-center text-center">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo $pix ?>"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo ucwords($row['fullname']) ?>
                                    </h3>



                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Age</b> <a class="ml-5"><?php echo $row['age'] ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Location</b> <a class="ml-5"><?php echo ucwords($row['country']) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Ethnicity</b> <a
                                                class="ml-5"><?php echo ucwords($row['nationality']) ?></a>
                                        </li>
                                    </ul>

                                    <a href="./message?user=<?php echo $row['usname'] ?>"
                                        class="btn btn-primary btn-block"><b>Send Message</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary text-center justify-content-center">
                                <div class="card-header">
                                    <h3 class="card-title text-center justify-content-center">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">


                                    <p class="text-dark">
                                        <?php echo ucwords($row['bio']) ?>
                                    </p>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

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
    <script src="../ajax.js"></script>
</body>

</html>