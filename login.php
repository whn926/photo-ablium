<?php
	header("content-type:text/html;charset=UTF-8");
	session_start();
	require "conf.php";
	 $account=$_POST["account"];
	$password=$_POST["password"];
	$sql=mysql_query("select * from user where account ='$account'");
	
	$info=mysql_fetch_object($sql);

	$_SESSION['account']=$account; //将用户账号存入session
	
	if($info==false)
	{
		echo "<script>alert('登录失败！此账号不存在');window.location.href='index.html';</script>";
	}
	elseif (strcmp($info->password, $password)!=0)
		echo "<script>alert('密码错误!请重新输入');window.location.href='index.html';</script>";
	else
		echo "<script>alert('登录成功');window.location.href='Ablum.php';</script>";
?>
