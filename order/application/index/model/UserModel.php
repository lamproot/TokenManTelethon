<?php

namespace app\index\model;

use think\Model;
use think\Db;

class UserModel extends Model
{
  //自定义初始化
  protected function initialize() {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }

    // 获取用户
    public static function getUserById($id = 1) {
        $info = Db::table('abc_user')->where('id', '=', $id)->find();
        if (empty($info)) {
            return [];
        }
        return $info;
    }

    // 用过用户名获取检查用户是否存在
    public static function getUserByName($name) {

        if(!$name) {
            returnApiError("必须填入用户名~");
            exit;
        }

        $info = Db::table('abc_user')->where('name', '=', $name)->find();

        if(!$info){
            return 1;
        }else{
            returnApiError("用户已存在~");
            exit;
        }
    }


    public static function insertUser($user) {
        $info = Db::table('abc_user')->insert($user);
        return $info;
    }

    public static function verifyUserLogin($name,$pwd){

       $list =  Db::query('select * from abc_user where name=? AND pwd=?',[$name,$pwd]);
       if(is_array($list) && count($list,COUNT_NORMAL)>0 ){
            $user = $list[0];
            $user['token'] = settoken();
            Db::table('abc_user')->where('id', $user['id'])->update(['token' => $user['token']]);
            return $user;
       }else{
           return null;
       }
    }

    // TODO
    public static function verifyToken($uid,$token){

    }
}

?>
