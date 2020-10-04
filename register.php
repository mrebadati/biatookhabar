		<?php include_once("head.inc"); ?>
				<div class="row">
					<div class="col-md-9" style="">
						<div class="col-lg-5 col-md-5 col-sm-5 pull-right">
						<form action="register.php" method="post">
						  <div class="form-group">
  							<input type="text" name="username" id="username" placeholder="نام کاربری" class="form-control" autocomplete="off">
  						</div>
							<div class="form-group">
							  <input type="password" name="password" id="password" placeholder="رمز عبور" class="form-control" autocomplete="off">
							</div>
						  <div class="form-group">
							  <input type="text" name="namefamily" id="namefamily" placeholder="نام و نام خانوادگی" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="email" id="email" placeholder="پست الکترونیک" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="mobile" id="mobile" placeholder="تلفن همراه"  class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="RegisterBtn" id="RegisterBtn" value="ارسال" class="btn btn-default pull-right clearfix" style="clear: both">
							</div>
							</form>
						</div>
				  </div>
				  <?php
				    echo 'without php code';
				  ?>
					<div class="col-md-3">
							<?php //include("group.inc"); ?>
							<?php //include("signin.inc"); ?>
							<?php include("ads.inc"); ?>
					</div>
					<?php include_once("foot.inc"); ?>

