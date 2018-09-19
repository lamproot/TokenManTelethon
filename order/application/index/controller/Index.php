<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Response;

class Index {

    public function index(Request $request) {
//        var_dump($request);
        return "test";
    }

    // 各种业务方法
    public function get() {
        $res = Db::table('abc_user')->select();
//        return $res;

        // $model = model('User');
        // $data = $model->getUserById(1);
        //
      // if ($data) {
        $code = 200;
        // } else {
        //     $code = 404;
        // }
        $data = [
            'code' => $code,
            'data' => '233333'
        ];

        return json($data);
//        exit();
    }

}
