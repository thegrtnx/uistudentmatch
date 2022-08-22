<?php ob_start();

session_start();

//echo $a = '<p id="demo"></p>';
date_default_timezone_set('Africa/Lagos');

include("db.php");
include("functions.php");

if(isset($_SESSION['login'])) {

    user_details();
}
?>


<!--
<script>
function timezonees() {
    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.getElementById("demo").innerHTML = timezone;
}

timezonees();
</script>

';
-->