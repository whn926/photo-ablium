<?php 
		header("content-type:text/html;charset=UTF-8");
		require "conf.php";
		$name = $_POST['name'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		$tel=$_POST['tel'];
		$sql1="select tel from user where tel='$tel' "; 
				$res1=mysql_query($sql1);
				$row=mysql_fetch_array($res1);
		if($row==false){
			if($password!=$repassword)
			  echo "<script>alert('密码不一致');</script>";
			$sql="insert into user values('$name','$password','$tel','$tel','0')";
			if(mysql_query($sql))echo "<script>alert('账号".$tel."注册成功，现在返回登录页面');window.location.href='index.html';</script>";
			else echo "<script>alert('注册失败，请重新注册');window.location.href='register.html';</script>";
		}
		else echo "<script>alert('该号码已被注册，请重新输入手机号码');window.location.href='register.html';</script>";
 ?>
