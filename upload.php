<?php
session_start();
$ablum_name=$_GET['ablum'];
			#echo 'khjhjh'.$ablum_name;
require "conf.php";
$_SESSION['ablumname']=$ablum_name;
//判断用户是否登录；登录才进行页面操作 否则退出
$account=$_SESSION['account'];
if($account==false)
	echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";

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
		<div id="divPreview">
        <img id="imgHeadPhoto" src="noperson.jpg" style="width: 160px; height: 170px; border: solid 1px #d2e2e2;"
            alt="" />
		</div>
	<!--enctype 属性规定在发送到服务器之前应该如何对表单数据进行编码,"multipart/form-data"在使用包含文件上传控件的表单时，必须使用该值。-->
		<form action="upload_end.php" method="post" enctype="multipart/form-data">
	<!--file定义输入字段和 "浏览"按钮，供文件上传。-->
    	<input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" />
    	<input type="hidden" name="ablumname" value=<?php echo $ablum_name ?> />
    	<input  type="submit" value="上传"/>
		</form>
	</fieldset>


</div>

<div id="footer">
Copyright 魏海南
</div>
<div>
<p>

</p>
</div>
</body>
	<script type="text/javascript">
        //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
        function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
            var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
            var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
            var browserVersion = window.navigator.userAgent.toUpperCase();
            if (allowExtention.indexOf(extention) > -1) {
                if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
                    if (window.FileReader) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(fileObj.files[0]);
                    } else if (browserVersion.indexOf("SAFARI") > -1) {
                        alert("不支持Safari6.0以下浏览器的图片预览!");
                    }
                } else if (browserVersion.indexOf("MSIE") > -1) {
                    if (browserVersion.indexOf("MSIE 6") > -1) {//ie6
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                    } else {//ie[7-9]
                        fileObj.select();
                        if (browserVersion.indexOf("MSIE 9") > -1)
                            fileObj.blur(); //不加上document.selection.createRange().text在ie9会拒绝访问
                        var newPreview = document.getElementById(divPreviewId + "New");
                        if (newPreview == null) {
                            newPreview = document.createElement("div");
                            newPreview.setAttribute("id", divPreviewId + "New");
                            newPreview.style.width = document.getElementById(imgPreviewId).width + "px";
                            newPreview.style.height = document.getElementById(imgPreviewId).height + "px";
                            newPreview.style.border = "solid 1px #d2e2e2";
                        }
                        newPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";
                        var tempDivPreview = document.getElementById(divPreviewId);
                        tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                        tempDivPreview.style.display = "none";
                    }
                } else if (browserVersion.indexOf("FIREFOX") > -1) {//firefox
                    var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                    if (firefoxVersion < 7) {//firefox7以下版本
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                    } else {//firefox7.0+                    
                        document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[0]));
                    }
                } else {
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                }
            } else {
                alert("仅支持" + allowExtention + "为后缀名的文件!");
                fileObj.value = ""; //清空选中文件
                if (browserVersion.indexOf("MSIE") > -1) {
                    fileObj.select();
                    document.selection.clear();
                }
                fileObj.outerHTML = fileObj.outerHTML;
            }
            return fileObj.value;    //返回路径
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