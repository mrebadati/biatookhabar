<?php
	//printing the comments one by one to the page;
	$myquery1="select * from tblcomment where com_status=1 and post_id=".$postid;
	$cmd1=db($myquery1);
	$rowscount=mysqli_num_rows($cmd1);
	for($xx=0; $xx<=$rowscount; $xx++)
	{
		$myresult1=mysqli_fetch_array($cmd1);
		if ($myresult1!=null)
			{
			echo '<div class="comments">
				  <div> نام: '.$myresult1['com_usernamefam'].'</div>';
			echo '<div> نظر:'.$myresult1['com_text'].'</div>';
			echo '<div> تاریخ:'.mydate($myresult1['com_createdate']).'</div>
				  </div>
				  <hr>';
			}
	}
?>
