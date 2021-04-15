<?php 
//判断用户是否登录；登录才进行页面操作 否则退出
	session_start();
	$account=$_SESSION['account'];
	if($account==false){
		echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";
	}
	require "conf.php";
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $account ?>的美好瞬间</title>
</head>
<body>
<div id="backimg">
	<!-- img  src="image/index_image.jpg" width=100% height=80%/-->
	<img src="image/index_image.jpg" width=100% height=700px/>
</div>
<div id="header">
<h1>欢乐相册</h1>
</div>
<div id="nav">
	<fieldset>
		<a href="Ablum.php">我的相册</a>
	</fieldset><br>
	<fieldset>
		<a href="user_info.php">个人信息</a>
	</fieldset><br>
	<fieldset><a href="logout.php">退出登录</a></fieldset><br>
</div>

<div id="section">
	
		<?php
			//相册陈列		
				$sql="select * from user where account='$account'" ;
				$res=mysql_query($sql);		
				$userinfo=mysql_fetch_array($res);
				$username=$userinfo['name'];
				$tel=$userinfo['tel'];
				$ablumSum=$userinfo['ablumSum'];
			?>
			<div>
			
			
			<form action="userinfo_update.php" method="post" >
			<fieldset>
			<legend ><?php echo $username ?>的个人信息</legend>
						我的账号：<input  type="text" name="name" value=<?php echo $account ?> disabled="disabled"><br>
						我的昵称：<input  type="text" name="name" value=<?php echo $username ?>><br>	
						手机号码：<input  type="text" name="tel" value=<?php echo $tel ?>><br>							
						相册总数：<input  type="text" name="ablumSum" value=<?php echo $ablumSum ?>  disabled="disabled"></input><br>
						<input type="submit"  value="确认修改"><br>	
			</fieldset>
			</form>
			
			
				
			
			</div>
					
</div>
		
		
	

<div id="footer">
Copyright 魏海南
</div>
<div>
<p>

</p>
</div>


</body>
<style type="text/css">
			html, body {
	            width: 100%;
	            height: 100%;
	            margin: 0;
	            padding: 0;
       		 }
			.black_overlay {
				display: none;
				/* ��Ԫ�ز��ᱻ��ʾ*/
				margin: 0 auto;
				position: absolute;
				top: 20%;
				left:0rpx;
				width: 100%;
				height: 100%;
				z-index: 1001;
				opacity: .80;
				
			}

			.white_content {
				display: none;
				position: absolute;
				top: 20%;
				border: 1px solid #bbbbbb;
				border-radius: 20px;
				background-color: white;
				z-index: 1002;
				/*�㼶Ҫ��.black_overlay�ߣ����������ʾ����ǰ��*/
				overflow: auto;
			}
			.setup{
				width:140px;
				height:140px;
				
			}
			#buttonstup{
				color:white;
				position: absolute;
				left:400rpx;
				
			}
			#light {
				position: absolute;
				left: 50%;
				/* top: 50%; */
				width: 300px;
				height: 180px;
				margin-left: -150px;
				/* margin-top: -125px */;
			}

			#form_submit {
				text-align: center;
				margin-left: 10px;
				margin-top: 10px;
			}

			#font_login {
				font-weight: 400;
				font-size: 24px;
				color: #BBBBBB;
				text-align: center;
				margin-top: 20px;
			}

			.button_beautiful {
				width: 60px;
				height: 34px;
				/* �߶� */
				border-width: 0px;
				border-radius: 6px;
				background: #4ECDC4;
				cursor: pointer;
				outline: none;
				color: white;
				font-size: 16px;
				margin-top: 20px;
			}
			
		</style>
<style>


#header {
    position:absolute;
	right:50%;
  	top:10px;
    color:black;
    padding:5px;
}
#nav{
	position:absolute;
    left:40px;
  	top:100px;
	line-height:40px;
    height:500px;
    width:100px;
    float:left;
    padding:5px;
 backgroud-color:white;

}
#section {
	
    width:860px;
    height:500px;
    float:left;
	position:absolute;
  	left:180px;
  	top:100px;
    
    
}

#ablum_display{
				display:inherit;
				width:94%;
				height:;
				margin-left:5%;
				position:relative;
			}
#div_photo{
				width:179px;
				height:160px;
				float:left;
				margin-top:2%;
				margin-left:1%;
				text-align:center;
				
			}
#footer {
    background-color:white;
    color:black;
    clear:both;
    text-align:center;
    padding:5px; 
}
#backimg{
	height:400rpx
	position:relative;

  	button:220px;
}
</style>
</html>