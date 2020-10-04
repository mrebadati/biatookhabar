<?php
function paging($pageid=0, $page_count)
{
	/*$paging_limit = 5;
	$paging_page = $pageid / $paging_limit;
	$paging_page_start = ( $paging_limit-1)+ $paging_page;
	$paging_page_end = $paging_page + ($paging_limit - 1);
	for($i = $paging_page_start; $i <= $paging_page_end; $i++)
	{
		if($i<$page_count)
		echo  '<a href="index.php?pageid='.$i.'">'.($i+1).'</a>';
	}
	//echo ($paging_link);*/
	if($pageid)//paging after GET pageid///////////////////////////////////////////////////////////////////
	{
		
		if($pageid>0)
			$link.='<a href="index.php?pageid='.($pageid-1).'"><button class="btn btn-default">&lt;</button></a>';
		for($x=0; $x<$page_count; $x++)
		{
			if($pageid==$x)
				$link.='<a><button class="btn btn-primary">'.($x+1).'</button></a>';
			else
				$link.='<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>';
		}
		if($pageid<($page_count-1))
			$link.='<a href="index.php?pageid='.($pageid+1).'"><button class="btn btn-default">&gt;</button></a>';
	}
	
	elseif($pageid==0)
	{
			$link.='<a href="index.php?pageid=0"><button class="btn btn-primary">1</button></a>';//very first time//////
			for($x=1; $x<$page_count; $x++)//Second time////////////////////////
			{
				$link.='<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>';
			}
			$link.='<a href="index.php?pageid=1"><button class="btn btn-default">&gt;</button></a>';
	}
	return $link;

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
