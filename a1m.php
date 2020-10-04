<?php 
session_start();
?>
<!doctype html>
<html>
	<head>
<?php require_once("database-connect.inc"); ?>
<title>
    <?php include_once("title.inc"); ?>
</title>
<?php 
require_once("warn.inc"); 
require_once("salt.inc");
require_once("paging_new.inc");
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-rtl.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/default.css">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	</head>
	<body dir="rtl" lang="FA">
		<div class="container">
		
<?php 
	$warn=null;
	$error=null;
	$cap=null;
	$num1=$num2=null;
	if(isset($_GET['act']))
	{
		if($_GET['act']=='logout')
			{
			session_unset();
			session_destroy();
			$warn='شما با موفقیت خارج شدید <br> <a href="a1m.php"> ورود مجدد</a><br><a href="index.php">صفحه اول سایت</a> ';
			}
	}
	if(!empty($_POST['captcha']) && isset($_POST['captcha']))
	{
		if($_SESSION['captcha']==$_POST['captcha'])
		{
			if(!empty($_POST['username']) && !empty($_POST['password']) && isset($_POST['username']) && isset($_POST['password']))
				{
						$username=$_POST['username'];
						$password=$_POST['password'];
						$logincmd=db("select * from tbluser where user_name='$username' and user_pass='$password'");
						$res=mysqli_fetch_array($logincmd) or die('connect to database failed.');
						//--------------------------------------------------------------------------------
						/*echo $_POST['username'];
						echo $_POST['password'];
						echo $res['adminusername'];
						echo $res['adminpassword'];*/
						
						
						if(($res['user_name']==$username) && ($res['user_pass']==$password))
						{
							
							$_SESSION['username']=$username;
							$_SESSION['userid']=$res['user_id'];
							header('Location: /news/manage/index.php');
							
						}
						else
						{
							$error='نام کاربری یا رمز عبور اشتباه است';
							
						}
				}
				
		}
		else
		{
			$cap='کد امنیتی اشتباه است';

		}

	}


		$num1=rand(1,9);
		$num2=rand(1,9);
		$_SESSION['captcha']= $num1 + $num2;
					
	if(!isset($_GET['act']))
	{
		echo ("	<div class='col-md-6 pull-right well' style=''>
						<form action='a1m.php' method='post'>
							<div class='row'>
						  	<div class='form-group clearfix col-md-12'>
							  <input type='text' name='username' placeholder='نام کاربری' class='form-control' autocomplete='off' autofocus>
							</div>
							<div class='form-group clearfix col-md-12'>
							  <input type='password' name='password' placeholder='رمز عبور' class='form-control' autocomplete='off'>
							</div>
							<div class='form-group clearfix col-md-12'><p>");
								
		echo $num1.'('.$num2.')';
							
		echo("</p></div>
							<div class='form-group clearfix col-md-12'>
								<input type='text' name='captcha' placeholder='شماره ها را جمع کرده و اینجا بنویسید...' class='form-control' autocomplete='off'>
							</div>
							<div class='form-group clearfix col-md-12'>
								<input type='submit' name='RegisterBtn' id='RegisterBtn' value='ورود' class='btn btn-default col-sm-6'>
							</div>
						</div>
						</form>");
	}
						
						
							if($warn) 
								warn($warn,0); 
							elseif($error)
								warn ($error,1);
							elseif ($cap) 
							 	warn ($cap,1);
							 	
	
		
							 
							?>	
				  </div>
				  <?php 
				  
				  ?>
			</div>
		<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	</body>
</html>
