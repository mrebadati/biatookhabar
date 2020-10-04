<?php //inserting comment to database------------------------------
if(isset($_POST['name1']) && isset($_POST['email1']) && isset($_POST['comment1'])){
	$com_usernamefam=$_POST['name1'];
	$com_useremail=$_POST['email1'];
	$com_text=$_POST['comment1'];
	if($com_usernamefam!=null && $com_useremail!=null && $com_text!=null)
		{
		$cmd=db("insert into tblcomment (post_id, com_usernamefam, com_useremail, com_text, com_status, com_createdate, com_parentid) values (".$postid.",'".$com_usernamefam."','".$com_useremail."','".$com_text."',0,now(),0)");
		if($cmd) 
			warn('نظر شما ارسال شد.');
		else
			warn( 'نظر شما ذخیره نشد. خطا');
		}
	else
  	warn ('همه ی کادر ها را پر کنید.');
}
?>
<?php 
	$postid=$_GET['pid'];
	echo ('<form method="post" action="showpost.php?pid='.$postid.'">'); 
?>
			
			<div class="form-group">
				<label for="for name"></label>
				<input type="text" name="name1" id="name1" class="form-control" maxlength="30" placeholder="نام ">
			</div>
			<div class="form-group">
				<label for="for email address"></label>
				<input type="email" class="form-control" name="email1" id="email1" maxlength="40" placeholder="ایمیل">
			</div>
			<div class="form-group">
			<textarea name="comment1" maxlength="500" class="form-control" id="comment1" rows="3">نظر بدهید...</textarea>
			</div>
			<div class="form-group">
				<!--<button type="submit" class="btn btn-default">ارسال</button>-->
				<button type="reset" class="btn btn-default">پاک</button>
				<button type="button" class="btn btn-success" id="aj">ارسال</button>
			</div>
			

</form>
