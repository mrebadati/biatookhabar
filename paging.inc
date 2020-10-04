
<?php
function paging($pageid, $groupid, $page_count)
{
	echo '<nav><ul class="pagination pagination-sm">';
	if(isset($groupid) && !isset($pageid))//paging after GET gid//////////////////////////////////////////////////////////////////
	{
		
		echo('<li class=" disabled"><a>1</a></li>');//removing link from the current page and showing the button selected
		for($x=1; $x<$page_count; $x++)
		{
			echo('<li><a href="index.php?pageid='.$x.'&gid='.$groupid.'">'.($x+1).'</a></li>');
		}
		if($page_count>1)
			echo('<li><a href="index.php?pageid=1&gid='.$groupid.'">&laquo;</a></li>');
	}
	elseif(isset($pageid) && !isset($groupid))//paging after GET pageid///////////////////////////////////////////////////////////////////
	{
		
		if($pageid>0)
			echo('<li><a href="index.php?pageid='.($pageid-1).'">&raquo;</a></li>');
		for($x=0; $x<$page_count; $x++)
		{
			if($pageid==$x)
				echo('<li class="disabled "><a>'.($x+1).'</a></li>');
			else
				echo('<li><a href="index.php?pageid='.$x.'">'.($x+1).'</a></li>');
		}
		if($pageid<($page_count-1))
			echo('<li><a href="index.php?pageid='.($pageid+1).'">&laquo;</a></li>');
	}
	elseif (isset($groupid) && isset($pageid)) //paging After GET gid and pageid////////////////////////////
	{
		if(($pageid>0) && $page_count>0)
			echo('<li><a href="index.php?pageid=0&gid='.$groupid.'">&raquo;</a></li>');
		for($x=0; $x<$page_count; $x++)
		{
			if($x==$pageid)
				echo('<li  class="disabled "><a>'.($x+1).'</a></li>');
			else
				echo('<li><a href="index.php?pageid='.$x.'&gid='.$groupid.'">'.($x+1).'</a></li>');
		}
		if($pageid<($page_count-1))
			echo('<li><a href="index.php?pageid='.($pageid+1).'&gid='.$groupid.'">&laquo;</a></li>');
			
	}
	elseif(!isset($pageid) && !isset($groupid))
	{
			echo('<li class="disabled" ><a>1</a></li>');//very first time//////
			for($x=1; $x<$page_count; $x++)
			{
				echo('<li><a href="index.php?pageid='.$x.'">'.($x+1).'</a></li>');
			}
			echo('<li><a href="index.php?pageid=1">&laquo;</a></li>');
	}
	echo '</ul></nav>';
	/*if($page_count!=null)
	{
		//if($pageid==null && $groupid==null)
		//{
			echo ('<select><option value=0 selected>1</option>');
			for($i=0;  $i<$page_count; $i++)
				echo ('<option value='.($i+1).'>'.($i+2).'</option>');
			echo ('</select>');
		//}
		
	}
	else
	{
		die('pagig error!');
	}*/
}
?>

