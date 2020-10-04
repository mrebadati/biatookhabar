<?php //numbers below the page /////////////////
	$page_num_count=10;
	if(isset($_GET['gid']) && !isset($_GET['pageid']))//paging after GET gid//////////////////////////////////////////////////////////////////
	{
		
		echo('<a><button class="btn btn-primary">1</button></a>');//removing link from the current page and showing the button selected
		for($x=1; $x<$page_count; $x++)
		{
			echo('<a href="index.php?pageid='.$x.'&gid='.$_GET['gid'].'"><button class="btn btn-default">'.($x+1).'</button></a>');
		}
		echo('<a href="index.php?pageid=1&gid='.$_GET['gid'].'"><button class="btn btn-default">&gt;</button></a>');
	}
	elseif(isset($_GET['pageid']) && !isset($_GET['gid']))//paging after GET pageid///////////////////////////////////////////////////////////////////
	{
		
		if($_GET['pageid']>0)
			echo('<a href="index.php?pageid='.($_GET['pageid']-1).'"><button class="btn btn-default">&lt;</button></a>');
		for($x=0; $x<$page_count; $x++)
		{
			if($_GET['pageid']==$x)
				echo('<a><button class="btn btn-primary">'.($x+1).'</button></a>');
			else
				echo('<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>');
		}
		if($_GET['pageid']<($page_count-1))
			echo('<a href="index.php?pageid='.($_GET['pageid']+1).'"><button class="btn btn-default">&gt;</button></a>');
	}
	elseif (isset($_GET['gid']) && isset($_GET['pageid'])) //paging After GET gid and pageid////////////////////////////
	{
		if($_GET['pageid']>0)
			echo('<a href="index.php?pageid=0&gid='.$_GET['gid'].'"><button class="btn btn-default">&lt;</button></a>');
		for($x=0; $x<$page_count; $x++)
		{
			if($x==$_GET['pageid'])
				echo('<a><button class="btn btn-primary">'.($x+1).'</button></a>');
			else
				echo('<a href="index.php?pageid='.$x.'&gid='.$_GET['gid'].'"><button class="btn btn-default">'.($x+1).'</button></a>');
		}
		if($_GET['pageid']<($page_count-1))
			echo('<a href="index.php?pageid='.($_GET['pageid']+1).'&gid='.$_GET['gid'].'"><button class="btn btn-default">&gt;</button></a>');
			
	}
	else
	{
			echo('<a href="index.php?pageid=0"><button class="btn btn-primary">1</button></a>');//very first time//////
			for($x=1; $x<$page_count; $x++)//Second time////////////////////////
			{
				
				echo('<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>');
			}
			echo('<a href="index.php?pageid=1"><button class="btn btn-default">&gt;</button></a>');
	}

?>

