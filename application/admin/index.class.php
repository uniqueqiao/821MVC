<?php
if(!defined("MVC")){
    die("非法侵入");
};
use \libs\smarty;//类的自动载入
use \libs\db;//类的自动载入
class index{//类的自动载入
//class index extends main{//继承父类的方法
    function int(){
        $smarty=new smarty();//类的自动载入
        $smarty->display("admin/login.html");//类的自动载入
//        $this->smarty->display("admin/login.html");//继承父类的方法

//        $smarty=new Smarty();
//        $smarty->setTemplateDir(TPL_PATH);
//        $smarty->setCompileDir(COMPILE_PATH);
//        $smarty->display("admin/login.html");
    }
    function login(){
        $uname=addslashes( $_POST["uname"]);
        $pass=md5(md5($_POST["pass"]));

        if(strlen($uname)<5||empty($pass)){
            echo "用户名或密码不符合规范";
            return;
        }

//        //用户名和密码 匹配 //没有数据库
//        //考虑我们的数据结构
//        //apache如何配置虚拟的服务器 localhost->mvc
//
        //连接数据库
//        $db=new mysqli("localhost","root","root","wui2006");
//        if(mysqli_connect_error()){
//            die("数据库连接错误");
//        }
//        $db->query("set names utf8");

//        $db=$this->db;//继承父类的方法
        $database=new db();//类的自动载入
        $db=$database->db;//类的自动载入

        $result=$db->query("select * from mvc_user where uname='$uname' and pass='$pass'");

//        echo "select * from mvc_user where uname='$uname' and pass='$pass'";
//
//        exit();
        //sql注入 网络安全
//        var_dump($result);
        if($result->num_rows<1){
            echo "没有相应的账号，请重新登录";
        }else{
            header("location:/mvc2/index.php/admin/index/first");
        }
    }
    function first(){
        echo "后台首页";
    }
}