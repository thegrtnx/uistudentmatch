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

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">

                    <div id="signup">
                        <h1 class="display-6 mb-2 fw-bold">
                            Let's get started 🚀
                        </h1>
                        <p class="mb-5">
                            Let's get started by knowing who you are
                        </p>
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
                                <label for="category" class="form-label">What's your Gender</label>
                                <select id="catgy" class="form-select color-dropdown">
                                    <option id="catgy" selected>Male</option>
                                    <option id="catgy">Female </option>
                                </select>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="catsmsg"></h6>
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">Can we have your email address?</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="emmsg"></h6>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Please type your institution name</label>
                                <input type="text" class="form-control" id="inst" name="email"
                                    placeholder="Enter your institution name" />
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="instmsg"></h6>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Tell us a little about yourself</label>
                                <textarea class="form-control" id="abt">

                                </textarea>
                                <h6 style="font-size: 12px" class="text-danger mt-1" id="abtmsg"></h6>
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