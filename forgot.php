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
                            <a style="text-decoration: none;" href="#" id="rotp">
                                <span>Resend OTP</span>
                            </a>
                        </p>
                    </form>
                </div>

                <div style="display:none" id="updatepword">
                    <form id="formAuthentication" class="mb-3" method="POST">
                        <h1 class="display-6 mb-2 fw-bold">
                            Update your password ✅
                        </h1>

                        <div class="mb-3">
                            <label for="password" class="form-label">Create new password</label>
                            <input type="password" class="form-control" id="pword" name="pword"
                                placeholder="create a new password" autofocus />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Re-type the new password here</label>
                            <input type="password" class="form-control" id="cpword" name="cpword"
                                placeholder="re-type your password" autofocus />
                        </div>

                        <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="umsg"></h6>
                        <button type="button" id="updf" class="btn btn-primary d-grid w-100">Update
                            Password</button>

                        <div class="text-center">
                            <a href="./signin" class="d-flex align-items-center justify-content-center mt-2">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Back to Sign-in
                            </a>
                        </div>
                    </form>
                </div>

                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">

                    <div id="forgot">
                        <form id="formAuthentication" class="mb-3" method="POST" autocomplete="off">
                            <h1 class="display-6 mb-2 fw-bold justify-content-center text-center">
                                Forgot your password? 🔒
                            </h1>
                            <p class="mb-5 justify-content-center text-center">
                                Enter your email and we'll send you instructions to reset your password
                            </p>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="femail" name="femail"
                                    placeholder="Enter your email" autofocus />
                            </div>

                            <h6 style="font-size: 15px" class="text-danger  text-center mt-1" id="fmsg"></h6>
                            <button type="button" id="fsub" class="btn btn-primary d-grid w-100">Send Reset
                                Link</button>

                            <div class="text-center">
                                <a style="text-decoration: none" href="./signin"
                                    class="d-flex align-items-center justify-content-center mt-2">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                    Back to Sign-in
                                </a>
                            </div>
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
    }

    //open update pword page
    function updatePword() {
        document.getElementById('updatepword').style.display = 'block';
        document.getElementById('verify').style.display = 'none';
        document.getElementById('forgot').style.display = 'none';
    }

    //close signup page
    function signupClose() {
        document.getElementById('forgot').style.display = 'none';
    }
    </script>

    <?php
    
    //declare the verification tab active
    if(isset($_SESSION['usermail']) && !isset($_SESSION['login'])) {

        echo'<script>otpVerify(); signupClose();</script>';
    }

    if(isset($_SESSION['vnext']) && !isset($_SESSION['login'])) {

        echo'<script>updatePword();</script>';
    }
    ?>
</body>

</html>

</html>