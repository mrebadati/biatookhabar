<?php
function mydate($gdate)
{
	$tmp=explode(' ', $gdate);
	$date=explode('-', $tmp[0]);
	$shdate=tr_num(gregorian_to_jalali($date[0], $date[1], $date[2], '/'), 'fa');
	$ftime=tr_num($tmp[1], 'fa');
	/*print_r($gdate);
	echo '<br>';
	print_r($date);
	echo '<br>';
	echo '<br>';
	print_r($tmp);*/
	return $shdate.' '.$ftime;
}
?>
