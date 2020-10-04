<?php
	require_once("database-connect.inc");
	//printing the comments one by one to the page using ajax
	if(isset($_POST['postid'])
	{
	
		$postid=$_POST['postid'];
		$myquery1="select * from tblcomment where com_status=1 and post_id=".$postid;
		$cmd1=db($myquery1);
		$rowscount=mysql_num_rows($cmd1);
		for($xx=0; $xx<=$rowscount; $xx++)
		{
		$myresult1=mysql_fetch_array($cmd1);
		if ($myresult1!=null)
			{
			echo '<article class="comments"><section> نام: '.$myresult1['com_usernamefam'].'</section>';
			echo '<section class=""> نظر:'.$myresult1['com_text'].'</section>';
			echo '<small class=""> تاریخ:'.mydate($myresult1['com_createdate']).'</small></article><hr>';
			}
		}
	}
?>
