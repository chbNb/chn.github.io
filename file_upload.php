<?php

if(!empty($_GET['type'])){
    $title=$_GET['title'];
    $phone=$_GET['phone'];
    $name=$_GET['video_name'];
    $brief=$_GET['brief'];
    $cover=$_GET['cover'];
    videoToDB($name,$title,$phone,$brief,$cover);
}
else{
    if(!empty($_FILES['file']))
         $file=$_FILES['file'];
    upload_file($file);
}

function videoToDB($name,$title,$phone,$brief,$cover){                   //将上传的视频的相关信息录入数据库               <<<成功啦！！！后期需要将数据库操作封装起来>>>
    $con=mysqli_connect("localhost","root","123456","JoyStu");
    $sql='insert into video_info(name,phone,title,brief,cover) values'.'(\''.$name.'\',\''.$phone.'\',\''.$title.'\',\''.$brief.'\',\''.$cover.'\')';
    echo $sql;
    echo mysqli_query($con,$sql);
}

function upload_file($files, $path = "D:\server\Apache24\htdocs\untitled\upload")     //为上传的视频建立一个独一无二的文件名，并将其从默认目录移动到指定目录
  {
        // 判断错误号
    if ($files['error'] == 00) {
                // 判断文件类型
       $ext = strtolower(pathinfo($files['name'], PATHINFO_EXTENSION));             //获取文件类型

      if (!is_dir($path)) {
                       mkdir($path, 0777, true);
        }

        // 生成唯一的文件名
        $fileName = md5(uniqid(microtime(true), true)) . '.' . $ext;
        echo $fileName;
         // 拼接成完整的绝对路径
        $destName = $path . "/" . $fileName;

        // 进行文件移动
         if (!move_uploaded_file($files['tmp_name'], $destName)) {              //上传的文件会放在一个默认的路径，需将文件移动至指定路径
                       echo "文件上传失败！";
       }
    } else {
                // 根据错误号返回提示信息
       switch ($files['error']) {
                  case 1:
                              echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
                break;
            case 2:
                              echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                 break;
             case 3:
                               echo "文件只有部分被上传";
              break;
            case 4:
                               echo "没有文件被上传";
                break;
             case 6:
                             case 7:
                                echo "系统错误";
               break;
        }
     }

 }




