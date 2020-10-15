<?php
    $type=1;
    require "../C/init.php";
    $cer_id=$_GET['cer_id'];
    $sql="select * from certificate where id='$cer_id'";
    $res=$mysqli->Get($sql);


    if($_SESSION["state"]=="login"){
        require "../V/header_login.html";
        require '../V/cer_detail.html';
    }
    else{
        require "../V/header_unlogin.html";
        require '../V/cer_detail.html';
}

