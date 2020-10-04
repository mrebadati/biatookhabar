<?php
function db($query)
{
	$link=mysqli_connect('localhost', 'root', '1234', 'mycmsdb');
	mysqli_set_charset($link, 'utf8');
	$cmd=mysqli_query($link, $query);
	mysqli_close($link);
    return $cmd;
}

?>
