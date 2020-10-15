<?php

$con=mysqli_connect("localhost","root","123456","JoyStu");


$table=$_POST['table'];
$type=$_POST['type'];


switch ($type){
    case 'video_list':
        $sql="select * from video_list where table_id=(select id from table_record where table_name='".$table."')";             //这里要特比注意：table在字符串中是有‘’的
        break;
    case 'intro':
        $video_id=$_POST['video_id'];
        $sql="select * from video_content where id=".$video_id;
        break;
    case 'forum':
        $video_id=$_POST['video_id'];
        $sql="select * from comment where table_id=(select id from table_record where table_name='".$table."') and video_id=".$video_id;
        break;
    case 'forum_':
        $video_id=$_POST['video_id'];
        $sql_="select * from comment_com where owner between (select min(id) from comment where video_id=".$video_id.") and (select max(id) from comment where video_id=".$video_id.")";
        $res_=mysqli_query($con,$sql_);
        $arr_=array();
        $i_=0;
        while($row_=mysqli_fetch_row($res_)){
            $arr_[$i_++]=$row_;
        }
        $arr_=json_encode($arr_);
        echo $arr_;
        exit();

}

    $res=mysqli_query($con,$sql);               //还差关闭连接和释放资源
    $arr=array();
    $i=0;
    while($row=mysqli_fetch_row($res)){
        $arr[$i++]=$row;
    }
    $arr=json_encode($arr);




    echo $arr;

