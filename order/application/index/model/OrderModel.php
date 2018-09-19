<?php

namespace app\index\model;

use think\Model;
use think\Db;

class OrderModel extends Model
{
  //自定义初始化
  protected function initialize() {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }

    public static function detail($id){
        $res = Db::query("SELECT a.id,a.title,a.`desc`,a.fromid,a.optype,b.`name` from abc_order a,abc_operation b where id = ? AND a.optype = b.oid",[$id]);
        print json_encode($res);
        exit;
        return $res;
    }


    //查询所有
    public static function findall(){
        $res = Db::query("SELECT a.id,a.title,a.`desc`,a.fromid,a.optype,b.`name` from abc_order a,abc_operation b where a.optype = b.oid;");
        return $res;
    }


    //查询
    public static function find($uid){
        $list =  Db::query('SELECT a.id,a.title,a.`desc`,a.fromid,a.optype,b.`name` from abc_order a,abc_operation b where fromid = ? AND a.optype = b.oid',[$uid]);
        return $list;
    }

    // 添加
    public static function add($msg){
        $res =  Db::table('abc_order') ->insert($msg);
        return $res;
    }

    //修改
    public static function edit($oid,$optype){
      $res =  Db::table('abc_order')->where('id', $oid)->update(['optype' => $optype]);
      return $res;
    }

    //所有的处理操作
    public static function allOptions(){
        $list = Db::table('abc_operation')->select();
        return $list;
    }

}

?>
