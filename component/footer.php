<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="text-white mb-4">
                    <img class="img-fluid me-3" src="img/icon/icon-02-light.png" alt="" />Unistudent Match
                </h1>
                <p>
                    we created Unistudent Match which is designed to help you connect with the right person in a
                    halal way.
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 me-3">

            </div>
            <div class="col-lg-3 col-md-6 quick">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="#about">About Us</a>
                <a class="btn btn-link" href="./signup">Create an account</a>
                <a class="btn btn-link" href="./signin">My Dashboard</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>

        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; Unistudent Match <?php echo date("Y") ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Modal -->
<div class="modal justify-content-center text-center fade" id="fullscreenModal" tabindex="-1" data-bs-backdrop="static"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <img src="img/animation-unscreen.gif" class="justify-content-center text-center img-fluid">
                <h2 class="mb-2 mx-2">Oh! SNAP 😢 </h2>
                <p class="mb-4 mx-2">You are not connected to the internet. </p>
                <p>Do not refresh this page. It will automatically continue from where you stopped once your
                    internet connection is restored</p>

                <p>Please check your wifi connection or your mobile network. Turn on and off airplane mode
                    to reset your network</p>
            </div>

        </div>
    </div>
</div>

<script>
function internet_show() {


    $(document).ready(function() {
        $("#fullscreenModal").modal("show");
    });

}


function internet_off() {

    $(document).ready(function() {
        $("#fullscreenModal").modal("hide");
    });
}
//console.log('Initially ' + (window.navigator.onLine ? 'on' : 'off') + 'line');

window.addEventListener('online', () => internet_off());
window.addEventListener('offline', () => internet_show());
</script>