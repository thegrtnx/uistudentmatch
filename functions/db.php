<?php
//creating the database to use
//$con = mysqli_connect("localhost","root","","unistud");
//HWq3UAf2nCbRA3uIAmTheLord2022
$con = mysqli_connect("localhost","unistude_unistud","securemelikekilode","unistude_unistud");

function row_count($result) {

global $con;

	return mysqli_num_rows($result); 
}


function escape($string) {
	global $con;


	return mysqli_real_escape_string($con, $string);
}


function query($query) {
		global $con;

		return mysqli_query($con, $query);
}


function confirm($result) {
		global $con;
	
}

function last_id($last_id) {

	global $con;

	return mysqli_insert_id($con);
}

function fetch_array($result) {

global $con;

return mysqli_fetch_array($result);

}

?>
