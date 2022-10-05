<?php
include("../functions/init.php");

if(!isset($_GET['unistdmthac'])) {

redirect("./");

} else {

    $data = clean(escape($_GET['unistdmthac']));

    if($data == 'maacth') {

        // Product Details 
        // Minimum amount is $0.50 US 
        $itemName = "Monthly Payment"; 
        $itemNumber = rand(0, 9999); 
        $itemPrice = 14.99; 
        $currency = "EUR"; 

        // Stripe API configuration  
        define('STRIPE_API_KEY', 'sk_test_51LbiI4H2i02pnRqjYdnV9jsanLKsBk74pQocdu5IWQpulnklicyyX7ieRHxI1tVm0KY5e0pCDO7SXSF95VfYKdBn00YUZMvB2c'); 
        define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51LbiI4H2i02pnRqjTqN8tGYPDLBfXkiDIOErlBZZosaMQIJFDd1bldYWtzDBNMZh8Zv5RC7sBEqeIFQVzSsRdI0o00IJGZ7wJU'); 

            
    } else {

        
    }

    
}

?>

<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
<script src="js/checkout.js" STRIPE_PUBLISHABLE_KEY="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" defer></script>