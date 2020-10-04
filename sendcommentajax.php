<?php //inserting comment to database By Ajax!
require_once("database-connect.inc");
if(isset($_POST['name1']) && isset($_POST['email1']) && isset($_POST['comment1']))
{
	$postidxxx=$_POST['postid'];
	$com_usernamefam=$_POST['name1'];
	$com_useremail=$_POST['email1'];
	$com_text=$_POST['comment1'];
	$cmd=db("insert into tblcomment (post_id, com_usernamefam, com_useremail, com_text, com_status, com_createdate, com_parentid) values (".$postidxxx.",'".$com_usernamefam."','".$com_useremail."','".$com_text."',0,now(),0)");
}	
	
?>
