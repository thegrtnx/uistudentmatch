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
                            <h1>Profile</h1>
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

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="active tab-pane" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" value="<?php echo $t_users['fullname'] ?>"
                                                            class="form-control" id="inputName" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" value="<?php echo $t_users['email'] ?>"
                                                            class="form-control" id="inputEmail" placeholder="Email">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName2"
                                                        class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $t_users['usname'] ?>" id="usname"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience"
                                                        class="col-sm-2 col-form-label">Bio</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="bio"
                                                            placeholder="Tell us about you"><?php echo $t_users['bio'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">institution</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="insts"
                                                            value="<?php echo $t_users['inst'] ?>"
                                                            placeholder="Institution">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Age</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="age"
                                                            value="<?php echo $t_users['age'] ?>" placeholder="Age">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Country</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills"
                                                            placeholder="Skills">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputSkills"
                                                        class="col-sm-2 col-form-label">Nationality</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills"
                                                            placeholder="Skills">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="button" class="btn btn-danger">Update
                                                            Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
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
</body>

</html>