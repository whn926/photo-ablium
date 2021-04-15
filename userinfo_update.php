<?php
	session_start();
	header("content-type:text/html;charset=UTF-8");
	require "conf.php";
	$name=$_POST['name'];
	$tel=$_POST['tel'];
	$account=$_SESSION['account'];
	$sql="update user set name = '$name',tel='$tel'  where account ='$account' " ;
	$res=mysql_query($sql);		
	if($res==false){
		echo "<script>alert('修改失败！现返回个人信息界面');window.location.href='user_info.php';</script>";
	}
	else echo "<script>alert('修改成功！现返回个人信息界面');window.location.href='user_info.php';</script>";
?>
	