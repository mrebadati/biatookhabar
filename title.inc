<?php
//reading title from database ----------------
$query="select * from tblsiteinfo";
$tresult=mysqli_fetch_row(db($query));
echo $tresult[0].' '.$tresult[1];
?>
