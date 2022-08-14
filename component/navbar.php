<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="./" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img class="img-fluid me-3" src="img/logo.png" alt="" />
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
    if(!isset($_SESSION['login'])) {

    ?>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-3">
            <a href="./" class="nav-item nav-link me-5">Home</a>
            <a href="#about" class="nav-item nav-link me-3">About Us</a>
            <a href="#features" class="nav-item nav-link me-3">Why choose us?</a>
            <a href="./contact" class="nav-item nav-link me-3">Contact Us</a>
            <a href="./signup" class="nav-item nav-link me-3">Create a free account</a>
        </div>
    </div>
    <a href="./signin" class="btn btn-primary px-3 d-none d-lg-block">Sign-In</a>
</nav>

<?php
    } else {
?>

<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav mx-auto rounded pe-4 py-3 py-lg-3">
        <a href="./" class="nav-item nav-link me-5">Home</a>
        <a href="#about" class="nav-item nav-link me-3">About Us</a>
        <a href="#features" class="nav-item nav-link me-3">Why choose us?</a>
        <a href="./contact" class="nav-item nav-link me-3">Contact Us</a>

    </div>
    <a style="text-decoration: none;" href="dashboard/./" class="nav-item nav-link me-5">Welcome
        <?php echo ucfirst($t_users['usname']) ?></a>
    <a href="./logout" class="nav-item text-white nav-link me-5 btn btn-primary px-3 ">Logout</a>
</div>
</nav>

<?php
    }
?>
<!-- Navbar End -->