<?php
function escape($str)
{
	global $link;
	$string = mysqli_real_escape_string($link, $str);
	return $string;
}

function base_url($file = NULL) {
	$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/classical-crypto/";
	$path .= $file;
	return $path;
}

function redirect($loc = "back")
{
	if($loc != "back") {
		return header("Location: $loc");
	} else {
		echo "<script type='text/javascript'>window.history.back();</script>";
	}
}

function alert($text, $location = NULL){
	$alert = "<script type='text/javascript'>alert('$text');";
	if($location != NULL) {
		if($location == "back") {
			$alert .= "window.history.back();";
		} else {
			$alert .= "window.location='$location';";
		}
	}
	$alert .= "</script>";
	echo $alert;
}

function route_method($type) {
	//$path = base_url("metode/".$type);
	$path = base_url("method/".$type);
	return $path;
}

function call_content($path, $file){
	if(file_exists("content/".$path."/".$file.".php")) {
		return include_once("content/".$path."/".$file.".php");
	} else {
		die("Template tidak ditemukan!");
	}
}

?>