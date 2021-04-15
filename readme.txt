1 photoablum文件夹为电子相册php相关代码实现


2 photoablum.sql为mysql数据库的导出文件，我对数据库的设计如下：
  ablum（ablumid, ablum_name, account）   #关于相册的表，属性有id，相册名，用户账号
  imginfo（img_id,account,ablum_name，pic_path）   # 关于照片的表，属性为照片id、用户账号、照片所属相册名，照片保存路径
  user（name，password,tel,account,ablumsum）   #关于用户的表，属性包括姓名，密码，电话，账户，相册总数


3 相册功能展示.docx   #对相册基本功能的一个展示