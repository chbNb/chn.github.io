<?php
    require "../M/SqlOperate.php";
session_start();
    $mysqli=new SqlOperate();
$sql="select * from article";
$res=$mysqli->Get($sql);

$sql="select * from question";
$question=$mysqli->Get($sql);

$sql="select id,name from certificate";
$certificate=$mysqli->Get($sql);