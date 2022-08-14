<?php
include("component/head.php");
?>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

.digit-group input {
    width: 60px;
    height: 60px;
    background-color: lighten($BaseBG, 5%);
    border: none;
    line-height: 50px;
    text-align: center;
    font-size: 24px;
    font-family: 'Raleway', sans-serif;
    font-weight: 800;
    color: black;
    margin: 0 2px;
    border-radius: 18px;
    border: 3px solid #293886;
}

.prompt {
    margin-bottom: 20px;
    font-size: 20px;
    color: white;
}
</style>

<body>


    <?php include("component/navbar.php"); ?>


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div style="display:none" id="verify" class="justify-content-center text-center">
                    <form method="get" class="digit-group" data-group-name="digits" data-autosubmit="false"
                        autocomplete="off">

                        <h1 class="display-6 mb-2 fw-bold">
                            We've sent you an OTP ✅
                        </h1>
                        <p class="mb-5">
                            Please check your mail inbox and spam folders.
                        </p>


                        <div class="row justify-content-center mb-5">
                            <input type="number" class="form-control text-center font-weight-bold" id="digit-1"
                                name="digit-1" data-next="digit-2" placeholder="-" autofocus />
                            <input type="number" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1"
                                placeholder="-" />
                            <input type="number" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2"
                                placeholder="-" />
                            <input type="number" id="digit-4" name="digit-4" data-previous="digit-3" placeholder="-" />
                        </div>

                        <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="vmsg"></h6>
                        <button type="button" id="vsub" class="mb-3 btn btn-primary d-grid w-100">Activate
                            Account </button>

                        <p class="text-center">
                            <span>Didn't get an OTP?</span>
                            <a href="#" id="rotp">
                                <span>Resend OTP</span>
                            </a>
                        </p>
                    </form>
                </div>

                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">

                    <div id="signin">
                        <form id="formAuthentication" class="mb-3" method="POST" autocomplete="off">
                            <h1 class="display-6 mb-2 fw-bold justify-content-center text-center">
                                Welcome Back 🥳
                            </h1>
                            <p class="mb-5 justify-content-center text-center">
                                Let's get you back into your account
                            </p>
                            <div class="mb-3">
                                <label for="username" class="form-label">Please, input your username or email
                                    address</label>
                                <input type="text" class="form-control" id="luname" name="luname"
                                    placeholder="Enter your username" autofocus />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="lumsg"></h6>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Type in your password</label>
                                    <a style="text-decoration: none;" href="./forgot">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="lpword" class="form-control" name="lpword"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                </div>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="lupmsg"></h6>
                            </div>
                            <!--<div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                </div>-->
                            <div class="mt-4">
                                <h6 style="font-size: 12px" class="text-danger text-center mt-1" id="lmsg">
                                </h6>
                                <button class="btn btn-primary d-grid w-100" type="button" id="lsub">Take me to my
                                    dashboard</button>
                            </div>

                            <p class="text-center mt-3">
                                <span>Are you new here?</span>
                                <a href="./signup">
                                    <span>Create an account</span>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



    <!-- JavaScript Libraries -->
    <script src=" js/jquery.min.js "></script>
    <script src=" js/bootstrap.min.js "></script>
    <script src=" js/popper.min.js "></script>
    <script src=" js/fontawesome.min.js "></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <script src="ajax.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());

            if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if (prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (
                    e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if (next.length) {
                    $(next).select();
                } else {
                    if (parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
    </script>

    <script>
    //open verify page by default
    function otpVerify() {
        document.getElementById('verify').style.display = 'block';
        document.getElementById('imgg').style.display = 'none';
    }

    //close signup page
    function signupClose() {
        document.getElementById('signup').style.display = 'none';
    }
    </script>

    <?php
    
    //declare the verification tab active
    if(isset($_SESSION['usermail']) && !isset($_SESSION['login'])) {

        echo'<script>otpVerify(); signupClose();</script>';
    }
    ?>
</body>

</html>

</html>