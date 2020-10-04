<div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; clear: both;">
	<?php
	$recentnewscmd=db("select * from tblpost where post_status = 1 order by post_id LIMIT 10");
	$recentnewscount=mysqli_num_rows($recentnewscmd);
	for($r=0; $r<$recentnewscount; $r++)
	{
		$res=mysqli_fetch_array($recentnewscmd);
		echo ("<a href='showpost.php?pid=".$res['post_id']."'>".$res['post_title']."</a><br>");
		
	}
	?>
		
</div>
