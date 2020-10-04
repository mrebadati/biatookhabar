<?php 

	if(isset($_POST['user-name']) && isset($_POST['pass-word']))
	{
		$sicmd=db("select * from tbluser where user_name='".$_POST['user-name']."' and user_pass='".$_POST['pass-word']."'");
		$res=mysql_fetch_row($sicmd);
		//--------------------------------------------------------------------------------
		if($res)
		{
			header('location: manage/manage-news.php');
			$_SESSION['username']=$res[1];
			$_SESSION['userid']=$res[0];
			
		}
		else
		{
			echo ('<div class="alert alert-danger">نام کاربری یا رمز عبور اشتباه است!</div>');
		}

	}
?>
<form method="post" action="index.php">
<div class="form-group clearfix">
	<b><label>وارد شوید</label></b>
	<input type="text"  class="form-control"  name='user-name' placeholder="نام کاربری" autocomplete="off" autofocus required>
</div>
<div class="form-group clearfix">
	<input type="password"  class="form-control"  name='pass-word'  placeholder="رمز عبور" autocomplete="off">
</div>
<div class="form-group clearfix">

	<input type="submit" value="ورود" class="btn btn-default col-sm-3" >
	<a href="forget-password.php"><div class="">رمز را فراموش کرده اید؟</div></a>
</div>
</form>

</div>
