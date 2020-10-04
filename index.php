<?php include_once("head.inc"); ?>		
	<div class="row ">
		
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12"> <!--  Menu section -->
					<?php include("group.inc"); ?>
					<?php //include("signin.inc"); ?>
					<?php //include("ads.inc"); ?>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"> <!-- Content Section -->
					<?php
						$page_id = 0;
						$page_news_num = 1;
						$page_count = 0;
						$total_record = mysqli_num_rows(db("select tblpost.post_status, tblcategory.cat_id, tblpost.cat_id from tblpost inner join tblcategory on tblpost.cat_id = tblcategory.cat_id where tblpost.post_status = 1 order by post_id"));
						$page_lower = ($page_id * $page_news_num);
						$page_offset = ($page_id + 1) * $page_news_num;
						$page_count = (int) ($total_record / $page_news_num); 
						$page_count = round($page_count); //counting and rounding the page number
						//echo $page_count;
						$myquery="select tblpost.post_id, tblpost.post_pic, tblpost.post_createdate, tblpost.post_visit_count, tblpost.post_title, tblpost.post_text, tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id=tblcategory.cat_id where tblpost.post_status = 1 LIMIT ".$page_news_num;
						
						if(isset($_GET['gid']) && !isset($_GET['pageid']))//after GET gid/////////////////////////////////////
						{
							$total_record=mysqli_num_rows(db("select tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id=tblcategory.cat_id where tblpost.post_status = 1 and tblpost.cat_id=".sannum($_GET['gid'])));
							$page_offset=0;
							$page_count=$total_record/$page_news_num;
							$myquery="select tblpost.post_id, tblpost.post_pic, tblpost.post_createdate, tblpost.post_visit_count, tblpost.post_title, tblpost.post_text, tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id = tblcategory.cat_id where tblpost.post_status = 1 and tblpost.cat_id=".sannum($_GET['gid'])." LIMIT ".$page_news_num;
						}
						elseif (isset($_GET['pageid']) && !isset($_GET['gid'])) //After GET pageid///////////////////////
						{
							$page_id=sannum($_GET['pageid']);
							$page_offset=($page_id*$page_news_num);
							$page_count=($total_record/$page_news_num);
							$myquery="select tblpost.post_id, tblpost.post_pic, tblpost.post_createdate, tblpost.post_visit_count, tblpost.post_title, tblpost.post_text, tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id=tblcategory.cat_id where tblpost.post_status = 1 LIMIT ".$page_news_num." OFFSET ".$page_offset;	
						}
						elseif (isset($_GET['gid']) && isset($_GET['pageid'])) //After GET gid and pageid/////////////////////////
						{
							$total_record=mysqli_num_rows(db("select tblpost.post_id, tblpost.post_pic, tblpost.post_createdate, tblpost.post_visit_count, tblpost.post_title, tblpost.post_text, tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id = tblcategory.cat_id where tblpost.cat_id=".sannum($_GET['gid'])."  and tblpost.post_status = 1"));
							$page_id=sannum($_GET['pageid']);
							$page_offset=($page_id*$page_news_num);
							$page_count=($total_record/$page_news_num);
							$myquery="select tblpost.post_id, tblpost.post_pic, tblpost.post_createdate, tblpost.post_visit_count, tblpost.post_title, tblpost.post_text, tblpost.post_status, tblcategory.cat_name from tblpost inner join tblcategory on tblpost.cat_id=tblcategory.cat_id where tblpost.cat_id=".sannum($_GET['gid'])."  and tblpost.post_status = 1 LIMIT ".$page_news_num." OFFSET ".$page_offset;	
						}
						//echo $myquery;
						for($x=0; $x<mysqli_num_rows(db($myquery)); $x++)//printing the posts
						{
							$myresult=mysqli_fetch_array(db($myquery));
							//print_r($myresult);
							echo ('<article class="col-sm-12 col-xs-12 col-md-12 col-lg-12" style"clear: both; font-size: 1.4em;">
												<div class="panel panel-default">
													<section class="panel-heading">
														<a href="showpost.php?pid='.$myresult['post_id'].'"><h3 class="panel-title">'.$myresult['post_title'].'</h3></a>
													</section>
													<section class="panel-body">
														<div class="col-lg-5 col-md-4 col-sm-4 col-xs-3">
															<img data-src="holder.js/100x100"  alt="'.$myresult['post_title'].'" class="img-thumbnail col-md-12" style="" src="'.$myresult['post_pic'].'">
														</div>
															<p>'.substr($myresult['post_text'], 0, 512).'...'.'</p>
															
																<small style="">تاریخ: '.mydate($myresult['post_createdate']).'</small>&nbsp;&nbsp; 
																<small style="">تعداد بازدید: '.$myresult['post_visit_count'].'</small>&nbsp;&nbsp; 
																<small style="">دسته: '.$myresult['cat_name'].'</small>&nbsp;&nbsp; 
																<small style="">شماره خبر: '.$myresult['post_id'].'</small>&nbsp;&nbsp; 
															
													</section>
												</div>
											</article>');//echoing posts to the page/////////
						}
					?>
				</div>
			</div>


					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin: 10px 0px;">
						<?php  //page numbers
							if(!isset($_GET['gid']) && !isset($_GET['pageid']))
								paging(null, null, $page_count);
							if(!isset($_GET['gid']) && isset($_GET['pageid']))
								paging(sannum($_GET['pageid']), null, $page_count);
							if(isset($_GET['gid']) && !isset($_GET['pageid']))
								paging(null, sannum($_GET['gid']), $page_count);
							if(isset($_GET['gid']) && isset($_GET['pageid']))
								paging(sannum($_GET['pageid']), sannum($_GET['gid']), $page_count);
							//include_once("page-number.inc"); //old page numbers
							?>
					</div>
				
				<?php  
					include("recent-news.inc");
					include("foot.inc");
				 ?>
