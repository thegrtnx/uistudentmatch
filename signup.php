<?php
include("component/head.php");
?>

<body>


    <?php include("component/navbar.php"); ?>


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-2 fw-bold">
                        Let's get started 🚀
                    </h1>
                    <p class="mb-5">
                        Let's get started by knowing who you are
                    </p>
                    <div id="signup">
                        <form id="formAuthentication" class="mb-3" method="POST" autocomplete="off">

                            <div class="mb-3">
                                <label for="fullname" class="form-label">What should we call you?</label>
                                <input type="text" class="form-control" id="fname" name="fname"
                                    placeholder="Firstname Lastname" autofocus />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="fmsg"></h6>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">What do you want others to call
                                    you?</label>
                                <input type="text" class="form-control" id="usname" name="usname"
                                    placeholder="Create a username" />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="usmsg"></h6>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Choose a category</label>
                                <select id="catgy" class="form-select color-dropdown">
                                    <option id="catgy" selected>User (I am here to read books)</option>
                                    <option id="catgy">Author (I just want to publish my books and read other author
                                        books)</option>
                                    <option id="catgy">Publisher (I want to publish books for other authors)
                                    </option>
                                </select>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="catsmsg"></h6>
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">Can we have your email address?</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="emmsg"></h6>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Create a strong password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="pword" class="form-control" name="pword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="pwmsg"></h6>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="confirmpassword">Please, repeat your password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="cpword" class="form-control" name="cpword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="cpwmsg"></h6>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Who told you about us?</label>
                                <select id="ref" class="form-select color-dropdown">
                                    <option id="ref">instagram</option>
                                    <option id="ref">Facebook</option>
                                    <option id="ref">Google</option>
                                    <option id="ref">A friend</option>
                                    <option id="ref">Adverts</option>
                                    <option id="ref">Others</option>

                                </select>
                            </div>

                            <div style="display: none" class="mb-3" id="anref">
                                <label for="email" class="form-label">Others? Please specify</label>
                                <input type="text" class="form-control" id="nref" name="nref"
                                    placeholder="Who told you about Books in Vogue" />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="nref"></h6>
                            </div>
                            <!--<div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                                </div>-->
                            <h6 style="font-size: 13px" class="text-danger  text-center mt-1" id="msg"></h6>
                            <button type="button" id="sub" class="mb-3 btn btn-primary d-grid w-100">Sign
                                up</button>


                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="./signin">
                                    <span>Sign in instead</span>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px" id="imgg">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <img src="img/6.jpg" class="position-relative w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>