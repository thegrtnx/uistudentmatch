<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../img/logo.png" class="img-circle elevation-2 im-fluid" alt="User Image">
            </div>
            <div class="info">
                <a href="./profile" class="d-block">Welcome <?php echo ucfirst($t_users['usname']) ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>

                </li>
                <br /><br />
                <li class="nav-item">
                    <a href="./chats" class="nav-link">
                        <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            Chats
                        </p>
                    </a>
                </li>
                <br /><br />
                <li class="nav-item">
                    <a href=".././logout" class="nav-link">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>
                            Logout
                            <i class="fas fa-angle-right right"></i>
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>