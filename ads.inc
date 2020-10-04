<?php
	require_once('database-connect.inc');
	$cmd=db('SELECT * FROM tblads order by ads_id desc');
	$count_cmd=mysqli_num_rows($cmd);
	echo ("<div class='' style=' padding:0px; '>");
	for($x=0; $x<$count_cmd; $x++)
	{		
			$res=mysqli_fetch_array($cmd);
			echo ("<div class='img-thumbnail' style='float: left'>
								<a href='".$res['ads_url']."' target='_blank'>
                                <img class=' img-thumbnail' src='".$res['ads_pic']."' alt='".$res['ads_title']."' title='".$res['ads_desc']."'>
                                </a>
							</div>");
	}
	while ($count_cmd<5) 
	{
		echo ("<a href='ads-register.php' target='_blank'><img class='img-thumbnail' src='img/defaultads.png'  alt='تبلیغات در این سایت' title='ثبت نام برای تبلیغات در این سایت'></a>");
		$count_cmd++;
	}
	echo ('</div>');

?>
