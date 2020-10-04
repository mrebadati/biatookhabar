<?php include_once("head.inc"); ?>
	<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-sm-9 col-xs-12"><!--main-page-right-->
					<?php
						//printing the full news to the page by pid;
						if(isset($_GET['pid']) && !empty($_GET['pid']))
						{
							$postid=sannum($_GET['pid']);
							$myquery="select post_id, post_title, post_text, post_visit_count, cat_name, post_createdate, post_pic, post_visit_count from tblpost inner join tblcategory on tblpost.cat_id = tblcategory.cat_id where post_status=1 and post_id=$postid";
							//visit counter
							$visitquery=" update tblpost set post_visit_count = post_visit_count + 1 where post_status = 1 and post_id = $postid ";
							$visitquerycmd=db($visitquery);
							//end of visit counter
							$cmd=db($myquery);
							$myresult=mysqli_fetch_array($cmd);
							echo ('<article class="panel panel-default">
										<header class="panel-heading">
											<h2 style="font-size: 2em;">'.$myresult['post_title'].'</h2>
										</header>
										<div class="panel-body">
											<section>
											<img data-src="holder.js/100x100" class="img-thumbnail col-lg-3 col-md-3 col-sm-3 col-xs-3" alt="" src="'.$myresult['post_pic'].'" style="float: left; width: 200px;">
											<p>'.$myresult['post_text'].'</p>
											</section>
											<section>
											<small>تاریخ:  '.mydate($myresult['post_createdate']).'</small>
											<small>تعداد بازدید: '.tr_num($myresult['post_visit_count'], 'fa').'</small>
											<small>نام دسته: '.$myresult['cat_name'].'</small>
											<small>شماره خبر: <span id="postid1">'.tr_num($myresult['post_id'], 'fa').'</span></small>
											</section>
										</div>
									</article>');
							//	echo $myresult['post_pic'];
						}
						?>
					<div class="showpost col-sm-6 col-lg-6 col-md-6 col-xs-8">
						<div class="alert alert-success" id="showpost-successalert" style="display: none;">نظر شما ارسال شد. </div>
						<div class="alert alert-danger" id="showpost-erroralert" style="display: none;">نظر شما ارسال نشد، خطا. </div>
						<div class="alert alert-danger" id="showpost-emptyalert" style="display: none;">لطفا همه ی قسمت ها را پر کنید!</div>
						<?php require_once("sendcomment.inc"); ?>
						
						<hr>
						<?php require_once("last-comments.inc"); ?>
						<span id="showpost-lastcommentajax" class="comments"></span>
						
					</div>
				</div>
		
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><!-- this is menu section -->
					<?php //include_once("group.inc"); 
							 //include_once("signin.inc"); ?>
<!--					<div class=' pull-right' style='clear: right; padding:5px; '>-->
					<?php include("ads.inc"); ?>
				</div>
		</div>

				<?php	include("foot.inc");		?>

