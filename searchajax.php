<?php
	require_once("database-connect.inc"); 
	require_once("warn.inc"); 
	require_once("component/jdf.inc"); 
	require_once("mydate.inc");
	require_once("salt.inc");
	require_once("paging_new.inc");
	require_once("san.inc");
	require_once("component/limit_text.php.inc");
	if($_POST)
	{
		$query=" select * from tblpost where 1=1 and post_status=1";
		if(!empty($_POST['title']))//adding title to query
			$query.=" and  post_title LIKE '%".$_POST['title']."%' ";
		if(!empty($_POST['text']))//adding text to query
			$query.=" and post_text LIKE '%".$_POST['text']."%' ";
		if(!empty($_POST['postid']))
			$query.=" and post_id = ".$_POST['postid'];
		if(!empty($_POST['category1']))
			$query.=" and cat_id = ".$_POST['category1'];
		if(!empty($_POST['author']))
			$query.=" and user_id = ".$_POST['author'];
		$cmd=db($query);
		$count=mysqli_num_rows($cmd);
			warn('تعداد نتایج: '.$count);//print result number 
			for($j=0; $j<$count; $j++)
			{
				$myresult=mysqli_fetch_array($cmd);
				echo ('<article class="col-sm-12 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<a href="showpost.php?pid='.$myresult['post_id'].'"><h3 class="panel-title">'.$myresult['post_title'].'</h3></a>
								</div>
								<div class="panel-body">
									<p>'.substr($myresult['post_text'], 0, 127).'...</p>
									<details style="clear: both">تاریخ: '.mydate($myresult['post_createdate']).'</details>
								</div>
							</div>
						</article>');
			}//end of for loop;
	}//end of if($_POST);
?>
