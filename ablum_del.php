<?php 
function removeDir($dirname){
	if(!is_dir($dirname)){
		return false;
	}
	$handle=opendir($dirname);
	while(($file=readdir($handle))!==false){
		if($file!='.'&&$file!='..'){
			$dir=$dirname.'/'.$file;
			is_dir($dir)?removeDir($dir):unlink($dir);
		}
	}
	closedir($handle);
	return rmdir($dirname);
}
//判断用户是否登录；登录才进行页面操作 否则退出
header("content-type:text/html;charset=UTF-8");
	session_start();
	$account=$_SESSION['account'];
	if($account==false){
		echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";
	}
	$ablum_name=$_GET['ablum'];
			#echo 'khjhjh'.$ablum_name;
		require "conf.php";
	$sql1="delete from ablum where ablum_name='$ablum_name' "; 
	$res1=mysql_query($sql1);
	if($res1==false)
		echo "<script>alert('删除相册失败！');window.location.href='Ablum.php';</script>";
	else {
		$sql2="update user set ablumSum = ablumSum-1 where account ='$account' ";
		mysql_query($sql2);
		#删除数据库imginfo信息
		$sql3="delete from imginfo where ablum_name='$ablum_name' "; 
		$res1=mysql_query($sql3);
		#删除本机相册信息
		define("PATH",dirname(__DIR__));    		
    	$file_path=PATH."upload_img".'/'.$ablum_name;
    	removeDir($file_path);
		echo "<script>alert('删除相册成功');window.location.href='Ablum.php';</script>";
	}
	
?> 

<?php 
//判断用户是否登录；登录才进行页面操作 否则退出
	session_start();
	$account=$_SESSION['account'];
	if($account==false){
		echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";
	}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $account ?>的美好瞬间</title>
</head>

<body>
<div id="backimg">
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
	<fieldset>
  			<p>
<!--a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
				新建相册
			</a-->
			<?php
				
				require "conf.php";
			?>
			<button  class="buttonsetup" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
				<img  width=100 height=100   src="image/setup.png" ></img>
			</button>
		</p >


		<?php
			
			//相册陈列		
				$sql="select ablum_name from ablum where account='$account'" ;
				$res=mysql_query($sql);		
				while($ablumarray=mysql_fetch_row($res)){
					foreach($ablumarray as $key=>$value){
			?>
			<div id="ablum_display">
				<div id="div_photo">
					<?php 
					//相册封面
						$sql1="select pic_path from imginfo where ablum_name='$value' and account='$account'"; 
						$res1=mysql_query($sql1);
						$row=mysql_fetch_array($res1);
						$a=$row['pic_path'];
						if($a) 
			echo " <img  width=120 height=120  src=".$a."><b id='ablumdet' onclick='location.href='ablum_del.php?ablum='.$value.'>X</b>";
						else  
			echo '<img width=120 height=120  src="image/empty1.jpg"> ';
																		?>
					<div><?php echo '相册名称：'.$value  ?></div>
					<a href="<?php echo "upload.php?ablum=".$value;?>">上传照片</a> 
					<a href="<?php echo "photo_show.php?ablum=".$value ?>">进入相册</a>
				</div>
		</div>
			<?php
				}}
			?>
			
		<div id="upload" class="white_content">
			<div id="font_login">上传照片</div>
			<!-- 上传照片-->
		</div>
		
		
		<div id="light" class="white_content">
			<div id="font_login">新相册相关信息</div>
			<!-- 新建相册-->
			<form action="AblumSetup.php" method="post" id="form_submit">
				相册名<input type="text" name="ablum" id="name"  /></br>
				<input type="submit" value="确定" class="button_beautiful" /> 
				<input type="button" value="取消" class="button_beautiful" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" />
			</form>
		</div>
		<div>
			
		</div>
		<div id="fade" class="black_overlay"></div>
	</fieldset>
</form>

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
				position: relative;
				width:179px;
				height:160px;
				float:left;
				margin-top:2%;
				margin-left:1%;
				text-align:center;
				
			}
#ablumdet{
				position: absolute;
				top: 2px;
				left:136px;			
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