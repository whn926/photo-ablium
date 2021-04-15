<?php
  header("content-type:text/html;charset=UTF-8");
	session_start();
	require "conf.php";
	$account=$_SESSION['account'];
	if($account==false){
		echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";
	}
	$ablum_name=$_POST["ablum"];
	$sql="insert into ablum(ablum_name,account) values('$ablum_name','$account') ";
	if(mysql_query($sql)){
		$sql2="update user set ablumSum = ablumSum+1 where account ='$account' ";
		mysql_query($sql2);
		echo "<script>alert('新建相册成功');window.location.href='Ablum.php';</script>";
	}
	else "<script>alert('建立相册失败');window.location.href='Ablum.php';</script>";
	
?>
	
	
	
	
	
	