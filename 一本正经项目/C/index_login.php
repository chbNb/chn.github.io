<?php
    require "../C/init.php";






$type = 0;
if(isset($_GET['type']))
    $type=$_GET['type'];
require "../V/header_login.html";

if($type==0){
    $sql="select * from recent_cer;";
    $recent_cer=$mysqli->Get($sql);
    require "../V/roll.html";
    require "../V/article.html";
}elseif ($type==1)
    require "../V/cer_sort.html";
elseif ($type==2)
    require "../V/forum.html";



require_once "../V/tail.html";