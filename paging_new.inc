<?php
function paging($pageid,$pagegroup, $page_count)
{
	//echo $page_count;
	
	echo '<nav><ul class="pagination pagination-sm" >';
	$pagingLinkCount=10; //how many links to display in one page
	$pageTarget="index.php"; //the target page to link to
	$linkGroupNo = (int) ($pageid / $pagingLinkCount);
	$pagingStart=$linkGroupNo*$pagingLinkCount;
	$pagingEnd=($linkGroupNo*$pagingLinkCount)+($pagingLinkCount-1);
	$link='';
	$lt='&gt;';
	$gt='&lt;';
	while($pagingEnd >= $page_count) $pagingEnd--; //calculating the last page in loop
	if(isset($pageid) && !isset($pagegroup))
	{
		if($pageid>0)//if not the first page show previous page button
			echo "<li><a href='$pageTarget?pageid=".($pageid-1)."'>$gt</a></li>";
		for($i=$pagingStart; $i<=$pagingEnd; $i++)
		{
			if($pageid != $i)
				echo "<li><a href='$pageTarget?pageid=$i'>".($i+1)."</a></li>";//for other pages with active links
			elseif($pageid == $i) 
				echo "<li class='disabled'><a>".($i+1)."</a></li>";//for the current page inactive the link
		}
		if($pageid<($page_count-1))//if not the last page show next page button
			echo "<li><a href='$pageTarget?pageid=".($pageid+1)."'>$lt</a></li>";
		
	}
	elseif(isset($pagegroup) && !isset($pageid))
	{
		if($pageid>0)//if not the first page show previous page button
			echo "<li><a href='$pageTarget?pageid=".($pageid-1)."&gid=$pagegroup'>$gt</a></li>";
		for($i=$pagingStart; $i<=$pagingEnd; $i++)
		{
			if($pageid != $i)
				echo "<li><a href='$pageTarget?pageid=$i&gid=$pagegroup'>".($i+1)."</a></li>";//for other pages with active links
			elseif($pageid == $i) 
				echo "<li class='disabled'><a>".($i+1)."</a></li>";//for the current page inactive the link
		}
		if($pageid<round($page_count-1) && $page_count > 1)//if not the last page show next page button
			echo "<li><a href='$pageTarget?pageid=".($pageid+1)."&gid=$pagegroup'>$lt</a></li>";

		
	}
	elseif(isset($pagegroup) && isset($pageid))
	{
		if($pageid>0)//if not the first page show previous page button
			echo "<li><a href='$pageTarget?pageid=".($pageid-1)."&gid=$pagegroup'>$gt</a></li>";
		for($i=$pagingStart; $i<=$pagingEnd; $i++)
		{
			if($pageid != $i)
				echo "<li><a href='$pageTarget?pageid=$i&gid=$pagegroup'>".($i+1)."</a></li>";//for other pages with active links
			elseif($pageid == $i) 
				echo "<li class='disabled'><a>".($i+1)."</a></li>";//for the current page inactive the link
		}
		if($pageid<round($page_count-1) && $page_count > 1)//if not the last page show next page button
			echo "<li><a href='$pageTarget?pageid=".($pageid+1)."&gid=$pagegroup'>$lt</a></li>";

		
	}
	elseif(!isset($pagegroup) && !isset($pageid))
	{
	
		for($i=$pagingStart; $i<=$pagingEnd; $i++)
		{
			if($pageid != $i)
				echo "<li><a href='$pageTarget?pageid=$i'>".($i+1)."</a></li>";//for other pages with active links
			elseif($pageid == $i) 
				echo "<li class='disabled'><a>".($i+1)."</a></li>";//for the current page inactive the link
		}
		if($pageid<round($page_count-1) && $page_count > 1)//if not the last page show next page button
			echo "<li><a href='$pageTarget?pageid=".($pageid+1)."'>$lt</a></li>";

		
	}
echo '</ul></nav>';
		


/*
	/*$paging_limit = 5;
	$paging_page = $pageid / $paging_limit;
	$paging_page_start = ( $paging_limit-1)+ $paging_page;
	$paging_page_end = $paging_page + ($paging_limit - 1);
	for($i = $paging_page_start; $i <= $paging_page_end; $i++)
	{
		if($i<$page_count)
		echo  '<a href="index.php?pageid='.$i.'">'.($i+1).'</a>';
	}
	//echo ($paging_link);
	if($pageid)//paging after GET pageid///////////////////////////////////////////////////////////////////
	{
		
		if($pageid>0)
			$link.='<a href="index.php?pageid='.($pageid-1).'"><button class="btn btn-default">$lt</button></a>';
		for($x=0; $x<$page_count; $x++)
		{
			if($pageid==$x)
				$link.='<a><button class="btn btn-primary">'.($x+1).'</button></a>';
			else
				$link.='<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>';
		}
		if($pageid<($page_count-1))
			$link.='<a href="index.php?pageid='.($pageid+1).'"><button class="btn btn-default">$gt</button></a>';
	}
	
	elseif($pageid==0)
	{
			$link.='<a href="index.php?pageid=0"><button class="btn btn-primary">1</button></a>';//very first time//////
			for($x=1; $x<$page_count; $x++)//Second time////////////////////////
			{
				$link.='<a href="index.php?pageid='.$x.'"><button class="btn btn-default">'.($x+1).'</button></a>';
			}
			$link.='<a href="index.php?pageid=1"><button class="btn btn-default">$gt</button></a>';
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
