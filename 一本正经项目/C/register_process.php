<?php
require "../C/init.php";

    $user_name=$_POST['user_name'];
    $user_pd=$_POST['user_pd'];
    $sql="insert into user_info (user_name,password,user_photo) values ('$user_name','$user_pd','../photo/6.jpg');";

    echo $sql;
    $mysqli->Copy($sql);

    header("Location:../V/login.html");



