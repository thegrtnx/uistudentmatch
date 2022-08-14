<?php ob_start();

session_start();
date_default_timezone_set('Africa/Lagos');

include("db.php");
include("functions.php");

if(isset($_SESSION['login'])) {

    user_details();
}
?>