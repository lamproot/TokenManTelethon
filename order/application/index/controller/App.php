<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Response;

class App extends Controller
{
    protected $request;
   
    // 自动加载的东西
    function _initialize() { }
     /**
     * 构造方法
     * @access public
     * @param Request $request Request 对象
     */
    public function __construct(Request $request = null)
    {
        //echo Request::instance()->post('name');exit;
        //$this->request = is_null($request) ? Request::instance() : $request;
        $this->request_post = json_decode(file_get_contents('php://input'));
        echo json_encode($this->request_post);exit;
    }

    // 验证 客户端 token
    public function checkAppToken($apptoken){

        if($this->checkingAppToken($apptoken)){
            return true;
        }else{
            $data['code'] = '404';
            $data['msg'] = 'apptoken无效';
            $data['data'] = "null";
            exit(json_encode($data,JSON_UNESCAPED_UNICODE));
        }
    }

    function checkingAppToken($para)
    {
        $token = "46565876666";
        if($token == $para) {
            return true;
        }else{
            return false;
        }
    }
}
