<?php
$com=mysqli_connect('localhost','keyline1_ketex_new','vF0^79Qe}Ra.','keyline1_ketex_new') or die(mysqli_error());
if($com){
	// echo "database connected";
}
else
{
	echo "database not connected";
}
$base_url="https://keylines.net.in/dev/ketex_dev/";
?>