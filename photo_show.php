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
	<?php $ablum_name=$_GET['ablum']; ?>
	<h3 align="center"><?php echo $ablum_name ?></h3>
  	<?php
		
		define("PATH",dirname(__DIR__));
	    $folder=PATH."upload_img".'/'.$ablum_name;
	    #$folder = "./.upload_img/".$ablum;   // 文件夹路径
	    $files = array();
	   	if(is_dir($folder)){
	   		# echo "<script>alert('相册暂无照片');</script>"; 
	   	#}
	   #	else{
	   	// 遍历文件夹
	   	$handle = opendir($folder);
	    while(false!==($file=readdir($handle))){
	        if($file!='.' && $file!='..'){
	    	   $hz=strstr($file,".");
	       if($hz==".gif" or $hz==".jpg" or $hz==".JPG"or $hz==".JPEG"or 
	       $hz==".PNG"or $hz==".png"or $hz==".GIF") 
	    	   {$files[] = $file; }
	         }
	      }
	    if($files){
	        foreach($files as $k=>$v){
	        	
	           $filepath=$folder.'/'.$v;
	           #echo $filepath;
	           ?> 
	           <!--点击相片放大预览-->
	           <button  class="buttonsetup" onclick="Preview('<?php echo $filepath ?>')">
	      		<?php 
	      		echo "<img width=170 height=170 src=".$filepath.">" ?>	      			
	      		</button>
	      		<a id='ablumdet'  href="<?php echo "pic_del.php?pic_path=".$filepath."&&ablum=".$ablum_name ?> " >X</a>
	      <?php 
	         // 循环显示     
	       }
	    }
	   
	  } 		
  ?>
					
			
		</div>
		
	</fieldset>
</form>

</div>
<div id="light" class="white_content" >
						<img id="show" src="filepath.jpg" >
						<?php  # echo "<img  src=".$filepath.">" ?>	
						<input type="button" value="取消预览" class="button_beautiful" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'" />
					</div>
<div id="fade" class="black_overlay"></div>
<div id="footer">
Copyright 魏海南
</div>
<div>
<p>

</p>
</div>


</body>
<script type="text/javascript">
 		function Preview(img){
			var img_path=img;
			 //alert("文件名为" + img_path );
			var a = document.getElementById('light');
			a.style.display='block';
			var b = document.getElementById('fade');
			b.style.display='block';
			document.getElementById('show').setAttribute('src', img_path);
			
		}
		
    </script>
<style type="text/css">
			html, body {
	            width: 100%;
	            height: 100%;
	            margin: 0;
	            padding: 0;
       		 }
       		
			.black_overlay {
				display: none;
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
				top:5%;
				z-index: 1002;
				
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
				left: 30%;
				/* top: 50%; */
				width: 100%;
				height: 100%;
				margin-left: -20px;
				/* margin-top: -125px */;
			}

			#form_submit {
				text-align: center;
				margin-left: 10px;
				margin-top: 10px;
			}

			

			.button_beautiful {
				position:relative;
				width: 78px;
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
	z-index: 1001;
}
#ablumdet{
			position: relative;
			bottom: 160px;
			right:16px;	
			text-decoration:none;
			color:black;
			z-index: 1002;	
       	}
       	
#footer {
    backgroud:white;
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