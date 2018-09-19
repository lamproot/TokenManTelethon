<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Response;
use app\index\model\UserModel;

class UserCenter extends App
{

    public function __construct(){

        $apptoken = '46565876666';
        parent::__construct();
        parent::checkAppToken($apptoken);
    }

    // 各种业务方法
    public function register(){

        if(!input('?post.name') || !input('?post.pwd') || !input('?post.mobile')){
            returnApiError("信息不完善~");
            exit();
        }

        $name = input('name');
        $pwd  = input('pwd');
        $mobile = input('mobile');

        $info = array("name"=>$name,"pwd"=>$pwd,"mobile"=>$mobile);

        // 检查是否存在用户
        $result = UserModel::getUserByName($name);

        if(!$result){
            returnApiError("添加用户失败!");
            return;
        }

        // 正式插入
        $task = UserModel::insertUser($info);

        if($task){
            returnApiSuccess("添加用户成功!",null);
        }else{
            returnApiError("添加用户失败!");
        }
        exit();
    }

    //用户登陆
    public function login(){


        

        // exit;

        // $name = $_POST['name'] ?? "";
        // $pwd  = $_POST['pwd'] ?? "";


    // echo $_POST;

        returnApiSuccess("用户登陆成功",$this->request);

        exit;

        if(!$name || !$pwd){
            returnApiError("登陆失败~");
            exit();
        }

        $result = UserModel::verifyUserLogin($name,$pwd);
        if($result){
            returnApiSuccess("用户登陆成功",$result);
        }else{
            returnApiError("用户名或者密码校验失败~");
        }

        exit;
    }
 }

