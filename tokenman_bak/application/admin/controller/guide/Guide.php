<?php

namespace app\admin\controller\guide;

use app\admin\model\GuideModel;
use app\common\controller\Backend;

/**
 * 新手指导
 *
 * @icon fa fa-guide
 * @remark
 */
class Guide extends Backend
{


    protected $model = null;
    protected $childrenGroupIds = [];
    protected $childrenAdminIds = [];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('GuideModel');
    }

    /**
     * 查看
     */
    public function index()
    {
        if ($this->request->isAjax() || $this->request->isGet())
        {
          list($where, $sort, $order, $offset, $limit) = $this->buildparams();
          $where = "is_delete = 0";
          $total = $this->model
                  ->where($where)
                  ->order($sort, $order)
                  ->count();

          $list = $this->model
                  ->where($where)
                  ->order($sort, $order)
                  ->limit($offset, $limit)
                  ->select();
          foreach ($list as $key => $value) {
              $list[$key]['url'] = "./guide/guide/detail?id=".$value['id'];
          }


          $result = array("total" => $total, "rows" => $list);

          return json($result);
        }
    }

    /**
     * 详情
     */
    public function detail($id)
    {
        $row = $this->model->get(['id' => $id]);
        if (!$row)
            $this->error(__('No Results were found'));
        $this->view->assign("row", $row->toArray());
        return $this->view->fetch();
    }

    /**
     * 添加
     * @internal
     */
    public function add()
    {
        $this->error();
    }

    /**
     * 编辑
     * @internal
     */
    public function edit($ids = NULL)
    {
        $this->error();
    }

    /**
     * 删除
     */
    public function del($ids = "")
    {
        if ($ids)
        {
            $childrenGroupIds = $this->childrenGroupIds;
            $adminList = $this->model->where('id', 'in', $ids)->where('admin_id', 'in', function($query) use($childrenGroupIds) {
                        $query->name('auth_group_access')->field('uid');
                    })->select();
            if ($adminList)
            {
                $deleteIds = [];
                foreach ($adminList as $k => $v)
                {
                    $deleteIds[] = $v->id;
                }
                if ($deleteIds)
                {
                    $this->model->destroy($deleteIds);
                    $this->success();
                }
            }
        }
        $this->error();
    }

    /**
     * 批量更新
     * @internal
     */
    public function multi($ids = "")
    {
        // 管理员禁止批量操作
        $this->error();
    }

    public function selectpage()
    {
        return parent::selectpage();
    }

}
