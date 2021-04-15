<?php 
header("content-type:text/html;charset=UTF-8");
require "conf.php";
session_start();
$account=$_SESSION['account'];
	if($account==false){
		echo" <script>alert('用户已退出登录，即将返回登录界面');window.location.href='index.html';</script>";
	}
//1.限制文件的类型，防止注入php或其他文件，提升安全
//2.限制文件的大小，减少内存压力
//3.防止文件名重复，提升用户体验
    //方法一：  修改文件名    一般为:时间戳+随机数+用户名
    // 方法二:建文件夹  
//4.保存文件
 $file=$_POST["file"];
 #$ablumname=$_POST['ablumname'];


//判断上传的文件是否出错,是的话，返回错误

if($_FILES["file"]["error"])
{
	
    echo $_FILES["file"]["error"];    
}
else
{	
session_start();
$ablumname=$_SESSION['ablumname'];
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过10240000B
    if((  $_FILES["file"]["type"]=="image/png"
    	||$_FILES["file"]["type"]=="image/jpg"
    	||$_FILES["file"]["type"]=="image/jpeg")
    	&&$_FILES["file"]["size"]<10240000)
    {
    		define("PATH",dirname(__DIR__));    		
    		$file_path=PATH."upload_img".'/'.$ablumname;
            //防止文件名重复
            if(!is_dir($file_path)){ //文件目录不存在
            	mkdir($file_path,0777,true); //文件目录不存在新建目录
            }
            $filename =time().rand(10000,99999);
            $filetype=strrchr($_FILES["file"]["name"],'.');
            $filename=$filename.$filetype;
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
              $pic_path=$file_path.'/'.$filename;
    		$sql1="insert into imginfo(ablum_name,account,pic_path) values('$ablumname','$account','$pic_path')";
    		mysql_query($sql1);
    	
           move_uploaded_file($_FILES["file"]["tmp_name"],$pic_path);//将临时地址移动到指定地址    
           
          echo "<script>alert('图片上传成功！现返回相册界面');window.location.href='Ablum.php';</script>";
           
    }
   # else
    #{
   #     echo"文件类型不对";
   # }
}


?>