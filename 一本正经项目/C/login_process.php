<?php
    require "../C/init.php";
    if(isset($_POST['user_id'])&&$_POST['password']){
        $user_id=$_POST['user_id'];
        $user_pd=$_POST['password'];
    }
    $sql="select password from user_info where user_name='$user_id'";

    $res=$mysqli->Get($sql);


    //两个变量在login.html中无法识别，奇怪了！
    $type=0;
    if(isset($_GET["type"]))
        $type=$_GET["type"];

    if(isset($res[0]["password"])){
        if($res[0]["password"]==$user_pd){
            $sql="select user_photo from user_info where user_name='$user_id'";
            $res=$mysqli->Get($sql);
            session_start();
            $_SESSION['state']="login";
            $_SESSION["user_name"]=$user_id;
            $_SESSION["user_id"]=$user_id;
            $_SESSION['user_photo']=$res[0]["user_photo"];
            header("Location:../C/index_login.php");
            exit();
        }
        else
            {
                $warn_pd="密码错误";
                header("Location:../V/login.html");
                exit();
            }
    }
    else{
        $warn_id="账户不存在";
        header("Location:../V/login.html");
        exit();
    }


