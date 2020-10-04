<?php 
	$groupcmd=db("select * from tblcategory");
	$groupnum=mysqli_num_rows($groupcmd);
	if(isset($_GET['gid']))
	{	$group=$_GET['gid'];
	for($grp=0; $grp<$groupnum; $grp++)
		{
			$groupresult=mysqli_fetch_array($groupcmd);
			if($group==$groupresult['cat_id'])
				echo ('<a><button class="btn  btn-primary  col-lg-12 col-md-12 col-sm-12 col-xs-12 ">'.$groupresult['cat_name'].'</button></a>');
			else
			
				echo ('<a href="index.php?gid='.$groupresult['cat_id'].'"><button class="btn  col-lg-12 col-md-12 col-sm-12 col-xs-12  btn-default">'.$groupresult['cat_name'].'</button></a>');
		}
	}
	else
	{
	for($grp=0; $grp<$groupnum; $grp++)
		{
		$groupresult=mysqli_fetch_array($groupcmd);
		echo ('<a href="index.php?gid='.$groupresult['cat_id'].'"><button class="btn col-lg-12 col-md-12 col-sm-12 col-xs-12 btn-default">'.$groupresult['cat_name'].'</button></a>');
		}
	}
		
?>

