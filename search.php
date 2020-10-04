<?php include_once("head.inc"); ?>
	<div class="row">	
		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
			<?php //include("group.inc"); ?>
			<?php //include("signin.inc"); ?>
			<div class="" style="">
				<?php include("ads.inc"); ?>
			</div>
		</div>		
		<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
			<!--<form method="post" action="search.php" >-->
				<div class="row"><!--row one------------------------------------------------------------------->
					<div class="form-group col-sm-6 col-lg-6 col-md-6 col-xs-12">
						<label>عنوان خبر:</label>
						<input type="text" name="title" id="searchtitle" class="form-control">
					</div>
					<div class="form-group col-sm-6 col-lg-6 col-md-6 col-xs-12">
						<label>متن:</label>
						<input type="text" name="text" id="searchtext" class="form-control">
					</div>
				</div>
				<div class="row"><!--row two------------------------------------------------------------------->
						<!--<div class="form-group">
							<label>خلاصه:</label>
							<input type="text" name="summary" class="form-control">
						</div>-->
					<div class="form-group col-sm-6 col-lg-6 col-md-6 col-xs-8">
						<label>نویسنده:</label>
						<select name="author" id="searchauthor" class="form-control">
							<option value="0" selected></option>
							<?php
								$autcmd=db('select * from tbluser');
								$autcmd_count=mysqli_num_rows($autcmd);
								for($x=0; $x<$autcmd_count; $x++)
									{
										$autres=mysqli_fetch_array($autcmd);
										echo ('<option value="'.$autres['user_id'].'">'.$autres['user_name'].'</option>');
									}
							?>
						</select>
					</div>
					<div class="form-group  col-sm-6 col-lg-6 col-md-6 col-xs-12">
						<label>شماره خبر:</label>
						<input type="text" name="postid" id="searchpostid" class="form-control">
					</div>
				</div>
					<div class="row"><!--row three------------------------------------------------------------------->
						<div class="form-group col-sm-6 col-lg-6 col-md-6 col-xs-12">
							<label>از تاریخ:</label>
							<input type="text" name="adate" class="form-control date" id="searchdate1" alt="از تاریخ" >
						</div>
						<div class="form-group col-sm-6 col-lg-6 col-md-6 col-xs-12">
							<label>تا تاریخ:</label>
							<input type="text" name="bdate" class="form-control date" id="searchdate2" alt="تا تاریخ" >
						</div>
						
						<div class="form-group  col-sm-6">
							<label>دسته:</label>
							<select name="category1" id="category1" class="form-control">
								<option value="0" selected></option>
								<?php
									$catcmd=db('select * from tblcategory');
									$catcmd_count=mysqli_num_rows($catcmd);
									for($x=0; $x<$catcmd_count; $x++)
										{
											$catres=mysqli_fetch_array($catcmd);
											echo ('<option value="'.$catres['cat_id'].'">'.$catres['cat_name'].'</option>');
										}
								?>
							</select>
						</div>
						<div class="form-group col-sm-6" style="margin-top: 15px;">
							<button id="searchsubmit" class="form-control btn btn-primary col-lg-4 col-md-4 col-sm-6 col-xs-6">بجو</button>
							<button id="newsearch" class="form-control btn btn-default col-lg-4 col-md-4 col-sm-6 col-xs-6">پاک</button>
						</div>
					</div>
				<div class="form-group" >
					<!--<button type="submit" class="form-control btn btn-default col-lg-4 col-md-4 col-sm-6 col-xs-6">search</button>-->
				</div>
			<!--</form>-->
		<?php
			if($_POST)
			{
				$query=" select * from tblpost where 1 ";
				$query_b=" select * from tblpost where 1 ";
				if(!empty($_POST['title']))
				{
					$title=$_POST['title'];
					$query.=" and  post_title LIKE '%$title%' ";
				}
				if(!empty($_POST['text']))
				{
					$query.=" and post_text LIKE '%".$_POST['text']."%' ";
				}
				if(!empty($_POST['summary']))
				{
					$query.=" and post_summary LIKE '%".$_POST['summary']."%' ";
				}
				if(!empty($_POST['postid']))
				{
					$query.=" and post_id = ".$_POST['postid'];
				}
				if(!empty($_POST['category1']))
				{
					$query.=" and cat_id = ".$_POST['category1'];
				}
				if(!empty($_POST['author']))
				{
					$query.=" and user_id = ".$_POST['author'];
				}
				$cmd=db($query);
				$count=mysqli_num_rows($cmd);
				if(empty($_POST['title']) && empty($_POST['text']) && empty($_POST['summary']) && empty($_POST['postid']) && empty($_POST['category1']) && empty($_POST['author']))
				{
					warn('نتیجه ای یافت نشد.', 1);//print Not found
				}
				else
				{
					warn('تعداد نتایج: '.$count);//print result number 
					for($j=0; $j<$count; $j++)
					{
						$myresult=mysqli_fetch_array($cmd);
						echo ('<article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="showpost.php?pid='.$myresult['post_id'].'"><h3 class="panel-title">'.$myresult['post_title'].'</h3></a>
													</div>
													<div class="panel-body">
															<p>'.substr($myresult['post_text'], 0, 127).'</p>
															<details style="clear: both">تاریخ: '.mydate($myresult['post_createdate']).'</details>
													</div>
												</div>
											</article>');//echoing posts to the page/////////"	;
					}
				}
			}
		?>
	<div id="search-ajax" style="clear: both"></div>
	</div>
		
	<div class="row" style="text-align: center; margin: 10px 0px;">
		<?php include_once("foot.inc"); ?>
	</div>
	<script src="js-persian-cal.min.js"></script>
	<script>
		var objCal1 = new AMIB.persianCalendar('searchdate1');
		var objCal2 = new AMIB.persianCalendar('searchdate2');
	</script>
