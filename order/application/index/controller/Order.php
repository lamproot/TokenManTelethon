<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Response;
use app\index\model\OrderModel;

class Order extends App
{

    public function __construct(){
        $apptoken = '46565876666';
        parent::checkAppToken($apptoken);
    }

    public function add(Request $request){

        if(!input('?post.uid') || !input('?post.title') || !input('?post.desc')){
            returnApiError("信息不完善~");
            exit();
        }


        $posts = input('post.');
        $info['fromid'] = $posts['uid'];
        $info['title'] = $posts['title'];
        $info['desc'] = $posts['desc'];

        $res = OrderModel::add($info);

        if($res){
            returnApiSuccess('工单添加成功~');
        }else{
            returnApiErrorExample('添加工单失败~');
        }
        exit;
    }

    public function find(Request $request){

        if(!input('?post.uid')){
            returnApiError("信息不完善~");
            exit();
        }

        $uid = input('post.uid');

        $res = OrderModel::find($uid);

        returnApiSuccess('获取数据成功~',$res);
        exit;
     }

    public function findall(Request $request){

        if(!input('?post.uid')){
            returnApiError("信息不完善~");
            exit();
        }

        $uid = input('post.uid');

        if($uid != 1){
            returnApiError("兄弟..你不行~~~");
        }else{
            $taskList = OrderModel::findall();
            returnApiSuccess('获取数据成功~',$taskList);
        }
        exit;
    }

    public function allOptions(Request $request){
        $res = OrderModel::allOptions();
        returnApiSuccess('获取数据成功~',$res);
        exit;
    }

    public function  edit(Request $request){
        $uid = input('post.uid');
        if($uid != 1){
          returnApiError("您没有此权限");
          exit;
        }

        if(!input('?post.id') || !input('?post.type')){
            returnApiError("信息不完善~");
            exit();
        }

        $oid = input('post.id');
        $type = input('post.d.type');



        $res = OrderModel::edit($oid,$type);

        returnApiSuccess('修改数据成功~');
        exit;
    }

    //工单详情
    public function  detail(Request $request){
      if(!input('?post.id')){
          returnApiError("未找到 id 参数");
          exit();
      }

      $res = OrderModel::detail(input('post.id'));
      

      if(!$res){
          returnApiError("未获取到数据~");
      }else{
          returnApiSuccess('修改数据成功~',$res);
      }

      exit;

    }
 }
