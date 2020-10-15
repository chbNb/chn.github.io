<?php
        require "../C/init.php";


    $_SESSION['state']="unlogin";


    $type=0;
    if(isset($_GET['type']))
        $type=$_GET['type'];
    require "../V/header_unlogin.html";



    switch ($type){
        case 0:
            $sql="select * from recent_cer;";
            $recent_cer=$mysqli->Get($sql);
            require "../V/roll.html";
            require "../V/article.html";
            break;
        case 1:
            require "../V/cer_sort.html";
            break;
        case 2:
            require "../V/forum.html";
            break;
    }






    require_once "../V/tail.html";
