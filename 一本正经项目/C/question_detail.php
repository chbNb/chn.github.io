<?php
$type=2;
require "../C/init.php";

$id=$_GET["id"];
$title=$_GET['title'];

$sql="select * from question_detail where question_id='$id'";
$res=$mysqli->Get($sql);

require "../V/header_unlogin.html";
require "../V/forum_detail.html";
require "../V/tail.html";
