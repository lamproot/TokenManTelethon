<?php if (!defined('THINK_PATH')) exit();

/*********文件描述*********
 * @last
 * @alter
 * @version 1.0.0
 *
 * 功能简介：
 * @author
 * @copyright
 * @time
 * @version 1.0.0
 */

class DownloadAction extends CommonAction {

	/**
	 * 构造方法-实例化MODEL
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */


	public function __construct()
	{
		parent::__construct();

		$this -> model = D('Finances');
	}

    /**
	 * 首页
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function index()
    {
    	$this -> display();
    }

    /**
     * 补贴统计
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function codes()
    {

        $start = $_GET['start'] ? strtotime($_GET['start']) : "";

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : "" ;

		$chat_id = $_GET['chat_id'];

		$where = "chat_id = {$chat_id} AND status = 3";

        if($start && $stop){

            $where = $where." AND created_at >= {$start} AND created_at <= {$stop}";

        }

//echo $where;exit;
		$params = array(

			'table_name' => 'codes',

			'order' => 'id desc',

			'where' => $where
		);

		$result = $this -> model -> easy_select($params);

		foreach ($result as $key => $value) {

			$params = array(

				'table_name' => 'codes',

				'order' => 'id desc',

				'where' => "parent_code = '{$value['code']}'"
			);

			$result[$key]['invited']  = $this -> model -> get_count($params);
		}

        $xlsData = $result;

            $xlsName  = "用户邀请导出";

            $xlsCell  = array(
                array('id','ID'),
                array('chat_id','群'),
                array('from_id','用户ID'),
                array('from_username','用户名称'),
                array('eth','钱包'),
                array('code','邀请码'),
                array('created_at','加入时间'),
                array('invited','邀请人数')
            );

            foreach ($xlsData as $key => $value) {
                $xlsData[$key]['created_at'] = date('Y-m-d', $value['created_at']);
            }
            $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }

    /**
	 * 奖金明细
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function bonus_info()
    {
    	$id = isset($_GET['id']) ? intval($_GET['id']) : $this -> _back('非法的参数');

    	$params = array(

    		'table_name' => 'bonus_count',

    		'where' => "id = {$id}"
    	);

    	$count_find = $this -> model -> my_find($params);

    	if (!$count_find)
    	{
    		$this -> _back('没有找到相关记录');
    	}

    	$that_day = strtotime(date('Y-m-d', $count_find['count_date']));

    	$tomorrow = $that_day + (60 * 60 * 24);

    	$params = array(

    		'table_name' => 'bonus_detail',

    		'where' => "touserid = {$count_find['touserid']} AND createdate >= {$that_day} AND createdate <= {$tomorrow}"
    	);

    	$result = $this -> model -> easy_select($params);

    	$this -> assign('result', $result);

    	$this -> display();
    }

    /**
     * 财务流水
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function finance_flow()
    {

        //默认导出今天数据
        $start = $_GET['start'] ? strtotime($_GET['start']) : time();

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() ;

        $where = "1";

        if($start && $stop){

            $where = "createtime >= {$start} AND createtime <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND tousernumber = {$_GET['usernumber']}";

        }

        //导出筛选数据
        $params = array(

            'table_name' => 'money_change',

            'where' => $where,

            'order' => 'createtime desc'
        );

        //相关销费商   目标销费商   变更金额    变更币种    类型  变更状态    时间
        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "Corps";

        $xlsCell  = array(
            array('realname','相关销费商'),
            array('targetrealname','目标销费商'),
            array('money','变更金额'),
            array('moneytype','变更币种'),
            array('changetype','类型'),
            array('recordtype','变更状态'),
            array('createtime','时间')
        );

        foreach ($xlsData as $key => $value) {

            if ($value['moneytype'] == 1){
                $xlsData[$key]['moneytype'] = "奖金币";
            } elseif ($value['moneytype'] == 2){
                $xlsData[$key]['moneytype'] = "注册币";
            } elseif ($value['moneytype'] == 3){
                $xlsData[$key]['moneytype'] = "戎子盾";
            } elseif ($value['moneytype'] == 4){
                $xlsData[$key]['moneytype'] = "激活币";
            } elseif ($value['moneytype'] == 5){
                $xlsData[$key]['moneytype'] = "福利积分";
            } elseif ($value['moneytype'] == 6){
                $xlsData[$key]['moneytype'] = "爱心基金";
            } elseif ($value['moneytype'] == 7){
                $xlsData[$key]['moneytype'] = "平台管理费";
            } elseif ($value['moneytype'] == 8){
                $xlsData[$key]['moneytype'] = "税费";
            }

            if ($value['recordtype'] == 0){
                $xlsData[$key]['recordtype'] = "减少";
            }elseif ($value['recordtype'] == 1){
                $xlsData[$key]['recordtype'] = "增加";
            }

            if($value['changetype'] == 0){
                $xlsData[$key]['changetype'] = '未知';
            }elseif ($value['changetype'] == 1){
                $xlsData[$key]['changetype'] = '公司充值';
            }elseif ($value['changetype'] == 2){
                $xlsData[$key]['changetype'] = '激活扣币';
            }elseif ($value['changetype'] == 3){
                $xlsData[$key]['changetype'] = '分红';
            }elseif ($value['changetype'] == 4){
                $xlsData[$key]['changetype'] = '管理补贴';
            }elseif ($value['changetype'] == 5){
                $xlsData[$key]['changetype'] = '互助补贴';
            }elseif ($value['changetype'] == 6){
                $xlsData[$key]['changetype'] = '拓展补贴';
            }elseif ($value['changetype'] == 7){
                $xlsData[$key]['changetype'] = '市场补贴';
            }elseif ($value['changetype'] == 8){
                $xlsData[$key]['changetype'] = '销售补贴';
            }elseif ($value['changetype'] == 9){
                $xlsData[$key]['changetype'] = '服务补贴';
            }elseif ($value['changetype'] == 10){
                $xlsData[$key]['changetype'] = '服务补贴';
            }elseif ($value['changetype'] == 11){
                $xlsData[$key]['changetype'] = '销费商提现';
            }elseif ($value['changetype'] == 12){
                $xlsData[$key]['changetype'] = '处理提现';
            }elseif ($value['changetype'] == 13){
                $xlsData[$key]['changetype'] = '消费';
            }elseif ($value['changetype'] == 14){
                $xlsData[$key]['changetype'] = '内部转账';
            }elseif($value['changetype'] == 15){
                $xlsData[$key]['changetype'] = '币种转换';
            }
            // $xlsData[$key]['title'] = $xlsData[$key]['title']."级销费商";

            // if ($value['status'] == 0) {
            //     $xlsData[$key]['status'] = "未激活";
            // } elseif ($value['status'] == 1) {
            //     $xlsData[$key]['status'] = "已激活";
            // } elseif ($value['status'] == -1) {
            //     $xlsData[$key]['status'] = "已删除";
            // } elseif ($value['status'] == -2) {
            //     $xlsData[$key]['status'] = "已冻结";
            // } else {
            //     $xlsData[$key]['status'] = "未知";
            // }
            $xlsData[$key]['createtime'] = date('Y-m-d', $value['createtime']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }

    /**
	 * 转账明细
	 *
	 * 参数描述：
	 *
	 *
	 * 转出账户编号  转出账户姓名  转入账户编号  转入账户姓名  币种  转账金额    状态  转账时间
	 * 返回值：
	 *
	 */
    public function transfer_list()
    {
    	//默认导出今天数据
        $start = $_GET['start'] ? strtotime($_GET['start']) : time();

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() ;

        $where = "1";

        if($start && $stop){

            $where = "createtime >= {$start} AND createtime <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND tousernumber = {$_GET['usernumber']}";

        }

        $params = array(

            'table_name' => 'transfer',

            'where' => $where,

            'order' => 'createtime desc'
        );

        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "转账明细";

        $xlsCell  = array(
            array('usernumber','转出账户编号'),
            array('username','转出账户姓名'),
            array('targetusernumber','转入账户编号'),
            array('targetusername','转入账户姓名'),
            array('moneytype','币种'),
            array('money','转账金额'),
            array('status','状态'),
            array('createtime','转账时间')
        );

        foreach ($xlsData as $key => $value) {

            if ($value['status'] == 0){
                $xlsData[$key]['status'] = "转账成功";
            }elseif ($value['status'] == 1){
                $xlsData[$key]['status'] = "转账失败";
            }

            $xlsData[$key]['moneytype'] = "报单币";
            $xlsData[$key]['createtime'] = date('Y-m-d', $value['createtime']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }

    /**
	 * 公司充值
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function company_recharge()
    {
    	if (isset($_POST['form_key']) && htmlspecialchars($_POST['form_key']) == 'yes')
    	{
    		$usernumber = isset($_POST['usernumber']) ? intval($_POST['usernumber']) : $this -> _back('非法的销费商');

    		$money = isset($_POST['money']) ? floatval($_POST['money']) : $this -> _back('非法的金额');

    		$type = isset($_POST['type']) ? intval($_POST['type']) : $this -> _back('非法的类型');

    		//查询目标用户
    		$params = array(

    			'table_name' => 'member',

    			'where' => "usernumber = {$usernumber}"
    		);

    		$member_find = $this -> model -> my_find($params);

    		if (!$member_find)
    		{
    			$this -> _back('无效的销费商');
    		}

    		//查询当前登陆者
    		$params = array(

    			'table_name' => 'member',

    			'where' => "uid = {$_SESSION['Rongzi']['admin']['id']}"
    		);

    		$user_find = $this -> model -> my_find($params);

    		if (!$user_find)
    		{
    			$this -> _back('请先登录');
    		}

    		switch ($type)
    		{
    			case 1 : //奖金币

    				$data['jiangjinbi'] = $member_find['jiangjinbi'] + $money;

    				$balance = $data['jiangjinbi'];

    				$moneytype = 6;

    				break;

    			case 2 : //注册币

    				$data['baodanbi'] = $member_find['baodanbi'] + $money;

    				$balance = $data['baodanbi'];

    				$moneytype = 2;

    				break;

    			case 3 : //激活币

    				$data['jihuobi'] = $member_find['jihuobi'] + $money;

    				$balance = $data['jihuobi'];

    				$moneytype = 4;

    				break;

    			case 4 : //戎子盾

    				$data['rongzidun'] = $member_find['rongzidun'] + $money;

    				$balance = $data['rongzidun'];

    				$moneytype = 3;

    				break;

    			case 5 : //福利积分

    				$data['jianglijifen'] = $member_find['jianglijifen'] + $money;

    				$balance = $data['jianglijifen'];

    				$moneytype = 5;

    				break;
    		}

    		$data['update_time'] = time();

    		$params = array(

    			'table_name' => 'member',

    			'where' => "usernumber = {$usernumber}",

    			'data' => $data
    		);

    		$member_save = $this -> model -> my_save($params);

    		$money_change_data['moneytype'] = $moneytype;

			$money_change_data['status'] = $member_save ? 1 : 0;

			$money_change_data['targetuserid'] = $member_find['uid'];

			$money_change_data['targetusernumber'] = $member_find['usernumber'];

			$money_change_data['targetrealname'] = $member_find['realname'];

			$money_change_data['userid'] = $user_find['uid'];

			$money_change_data['usernumber'] = $user_find['usernumber'];

			$money_change_data['realname'] = $user_find['realname'];

			$money_change_data['changetype'] = 1;

			$money_change_data['recordtype'] = 1;

			$money_change_data['money'] = $money;

			$money_change_data['hasmoney'] = $balance;

			$money_change_data['createtime'] = time();

			//存入流水
			$params = array(

				'table_name' => 'money_change',

				'data' => $money_change_data
			);

			$money_change_add = $this -> model -> my_add($params);

    		if ($member_save)
    		{
    			redirect(__APP__.'/Finances/recharge_list', 0);
    		}
    		else
    		{
    			$this -> _back('充值失败 请重试');
    		}
    	}

    	$this -> display();
    }

    /**
	 * 激活扣币
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function company_deduct_money()
    {
    	if (isset($_POST['form_key']) && htmlspecialchars($_POST['form_key']) == 'yes')
    	{
    		$usernumber = isset($_POST['usernumber']) ? intval($_POST['usernumber']) : $this -> _back('非法的销费商');

    		$money = isset($_POST['money']) ? floatval($_POST['money']) : $this -> _back('非法的金额');

    		$type = isset($_POST['type']) ? intval($_POST['type']) : $this -> _back('非法的类型');

    		//查询目标用户
    		$params = array(

    			'table_name' => 'member',

    			'where' => "usernumber = {$usernumber}"
    		);

    		$member_find = $this -> model -> my_find($params);

    		if (!$member_find)
    		{
    			$this -> _back('无效的销费商');
    		}

    		//查询当前登陆者
    		$params = array(

    			'table_name' => 'member',

    			'where' => "uid = {$_SESSION['Rongzi']['admin']['id']}"
    		);

    		$user_find = $this -> model -> my_find($params);

    		if (!$user_find)
    		{
    			$this -> _back('请先登录');
    		}

    		switch ($type)
    		{
    			case 1 : //奖金币

    				$data['jiangjinbi'] = $member_find['jiangjinbi'] - $money;

    				$balance = $data['jiangjinbi'];

    				$moneytype = 6;

    				break;

    			case 2 : //注册币

    				$data['baodanbi'] = $member_find['baodanbi'] - $money;

    				$balance = $data['baodanbi'];

    				$moneytype = 2;

    				break;

    			case 3 : //激活币

    				$data['jihuobi'] = $member_find['jihuobi'] - $money;

    				$balance = $data['jihuobi'];

    				$moneytype = 4;

    				break;

    			case 4 : //戎子盾

    				$data['rongzidun'] = $member_find['rongzidun'] - $money;

    				$balance = $data['rongzidun'];

    				$moneytype = 3;

    				break;

    			case 5 : //福利积分

    				$data['jianglijifen'] = $member_find['jianglijifen'] - $money;

    				$balance = $data['jianglijifen'];

    				$moneytype = 5;

    				break;
    		}

    		$data['update_time'] = time();

    		$params = array(

    			'table_name' => 'member',

    			'where' => "usernumber = {$usernumber}",

    			'data' => $data
    		);

    		$member_save = $this -> model -> my_save($params);

    		$money_change_data['moneytype'] = $moneytype;

			$money_change_data['status'] = $member_save ? 1 : 0;

			$money_change_data['targetuserid'] = $member_find['uid'];

			$money_change_data['targetusernumber'] = $member_find['usernumber'];

			$money_change_data['targetrealname'] = $member_find['realname'];

			$money_change_data['userid'] = $user_find['uid'];

			$money_change_data['usernumber'] = $user_find['usernumber'];

			$money_change_data['realname'] = $user_find['realname'];

			$money_change_data['changetype'] = 2;

			$money_change_data['recordtype'] = 0;

			$money_change_data['money'] = $money;

			$money_change_data['hasmoney'] = $balance;

			$money_change_data['createtime'] = time();

			//存入流水
			$params = array(

				'table_name' => 'money_change',

				'data' => $money_change_data
			);

			$money_change_add = $this -> model -> my_add($params);

    		if ($member_save)
    		{
    			redirect(__APP__.'/Finances/finance_flow', 0);
    		}
    		else
    		{
    			$this -> _back('扣币失败 请重试');
    		}
    	}

    	$this -> display();
    }

    /**
	 * 充值记录
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function recharge_list()
    {
        //默认导出今天数据
        $start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d',time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() ;

        $where = "1";

        if($start && $stop){

            $where = "createtime >= {$start} AND createtime <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND tousernumber = {$_GET['usernumber']}";

        }

        $params = array(

            'table_name' => 'money_change',

            'where' => $where." AND changetype = 1",

            'order' => 'createtime desc'
        );

    	$xlsData = $this -> model -> easy_select($params);

        $xlsName  = "充值记录";

        //销费商编号 销费商姓名   充值者编号   充值者姓名   充值币种    充值金额    状态  充值时间
        $xlsCell  = array(
            array('targetusernumber','销费商编号'),
            array('targetrealname','销费商姓名'),
            array('usernumber','充值者编号'),
            array('realname','充值者姓名'),
            array('moneytype','充值币种'),
            array('money','充值金额'),
            array('status','状态'),
            array('createtime','充值时间')
        );

        foreach ($xlsData as $key => $value) {

            if ($value['moneytype'] == 1){
                $xlsData[$key]['moneytype'] = "现金币";
            }elseif ($value['moneytype'] == 2){
                $xlsData[$key]['moneytype'] = "报单币";
            }elseif ($value['moneytype'] == 3){
                $xlsData[$key]['moneytype'] = "戎子盾";
            }elseif ($value['moneytype'] == 4){
                $xlsData[$key]['moneytype'] = "激活币";
            }elseif ($value['moneytype'] == 5){
                $xlsData[$key]['moneytype'] = "福利积分";
            }elseif ($value['moneytype'] == 6){
                $xlsData[$key]['moneytype'] = "奖金币";
            }

            if ($value['status'] == 0){
                $xlsData[$key]['status'] = "失败";
            }elseif ($value['status'] == 1){
                $xlsData[$key]['status'] = "成功";
            }

            $xlsData[$key]['createtime'] = date('Y-m-d', $value['createtime']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }

	/**
	 * 提现申请
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function cash()
    {
        $start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d', time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() ;

        $where = "1";

        if($start && $stop){

            $where = "createtime >= {$start} AND createtime <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND usernumber = {$_GET['usernumber']}";

        }

    	$params = array(

    		'table_name' => 'withdrawal',

    		'where' => $where ." AND status = 1",

    		'order' => 'createtime desc'
    	);

		$xlsData = $this -> model -> easy_select($params);

        $xlsName  = "提现申请";

        $xlsCell  = array(
            array('usernumber','提现账户编号'),
            array('realname','提现账户姓名'),
            array('banknumber','银行账号'),
            array('bankname','开户银行'),
            array('bankholder','开户姓名'),
            array('money','提取金额'),
            array('fee','手续费'),
			array('money_fee','应到金额'),
            array('createtime','申请时间')
        );

        foreach ($xlsData as $key => $value) {
			$xlsData[$key]['money_fee'] = $value['money'] - $value['fee'];

            $xlsData[$key]['createtime'] = date('Y-m-d', $value['createtime']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }

    /**
	 * 提现处理
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    public function cash_action()
    {
    	$id = isset($_GET['id']) ? intval($_GET['id']) : $this -> _back('非法的指向');

    	$type = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : $this -> _back('非法的类型');

    	//查询这个提现申请
    	$params = array(

    		'table_name' => 'withdrawal',

    		'where' => "id = {$id} AND status = 1"
    	);

    	$cash_find = $this -> model -> my_find($params);

    	if (!$cash_find)
    	{
    		$this -> _back('没有找到该提现记录');
    	}

    	//查询这个人
    	$params = array(

    		'table_name' => 'member',

    		'where' => "usernumber = {$cash_find['usernumber']}"
    	);

    	$member_find = $this -> model -> my_find($params);

    	if (!$member_find)
    	{
    		$this -> _back('查无此人');
    	}

    	if ($type == 'agreen')
    	{
    		//同意
    		$data['status'] = 0;
    	}
    	elseif ($type == 'refuse')
    	{
    		//拒绝
    		$data['status'] = 2;
    	}

    	$data['arrival_amount'] = $cash_find['money'] - $cash_find['fee'];

    	$data['handtime'] = time();

    	$params = array(

    		'table_name' => 'withdrawal',

    		'where' => "id = {$id}",

    		'data' => $data
    	);

    	$cash_save = $this -> model -> my_save($params);

    	if ($cash_save)
    	{
    		if ($type == 'refuse')
    		{
    			if ($cash_find['moneytype'] == 0)
    			{
	    			//退回原账户
	    			$member_data['jiangjinbi'] = $member_find['jiangjinbi'] + $cash_find['money'];
	    		}

	    		$member_data['update_time'] = time();

	    		$params = array(

	    			'table_name' => 'member',

	    			'where' => "uid = {$member_find['uid']}",

	    			'data' => $member_data
	    		);

	    		$member_save = $this -> model -> my_save($params);

	    		$money_change_data['status'] = $member_save ? 1 : 0;

				$money_change_data['recordtype'] = 1;

				$money_change_data['hasmoney'] = $cash_find['moneytype'] == 0 && $member_save ? $member_find['jiangjinbi'] + $cash_find['money'] : $member_find['jiangjinbi'];
    		}
    		elseif ($type == 'agreen')
    		{
				$money_change_data['status'] = 1;

				$money_change_data['recordtype'] = 0;

				$money_change_data['hasmoney'] = $cash_find['moneytype'] == 0 ? $member_find['jiangjinbi'] : 0;
    		}

    		$money_change_data['moneytype'] = $cash_find['moneytype'] == 0 ? 6 : 0;

			$money_change_data['targetuserid'] = $member_find['uid'];

			$money_change_data['targetusernumber'] = $member_find['usernumber'];

			$money_change_data['targetrealname'] = $member_find['realname'];

			$money_change_data['realname'] = '系统';

			$money_change_data['changetype'] = 12;

			$money_change_data['money'] = $cash_find['money'];

			$money_change_data['createtime'] = time();

			//存入流水
			$params = array(

				'table_name' => 'money_change',

				'data' => $money_change_data
			);

			$money_change_add = $this -> model -> my_add($params);

    		redirect(__APP__.'/Finances/cash');
    	}
    	else
    	{
    		$this -> _back('操作失败 请重试');
    	}

    	$this -> display();
    }

    /**
     * 提现记录
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function cash_list()
    {

        //默认导出今天数据
        $start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d',time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() ;

        $where = "1";

        if($start && $stop){

            $where = "createtime >= {$start} AND createtime <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND tousernumber = {$_GET['usernumber']}";

        }

        $params = array(

            'table_name' => 'withdrawal',

            'where' => $where." AND (status = 0 OR status = 2)",

            'order' => 'createtime desc'
        );

        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "提现记录";

        //提现账户编号  提现账户姓名  银行账号    开户银行    开户姓名    提取金额    手续费 到账金额    提现时间    提现状态
        $xlsCell  = array(
            array('usernumber','提现账户编号'),
            array('realname','提现账户姓名'),
            array('banknumber','银行账号'),
            array('bankname','开户银行'),
            array('realname','开户姓名'),
            array('money','提取金额'),
            array('fee','手续费'),
            array('fee_money','到账金额'),
            array('createtime','提现时间'),
            array('status','提现状态')
        );

        foreach ($xlsData as $key => $value) {

            if ($value['status'] == 0){
                $xlsData[$key]['status'] = "提现成功";
            }elseif ($value['status'] == 1){
                $xlsData[$key]['status'] = "申请提现";
            }elseif ($value['status'] == 1){
                $xlsData[$key]['status'] = "提现失败";
            }

            $xlsData[$key]['fee_money'] = $value['money'] - $value['fee'];

            $xlsData[$key]['createtime'] = date('Y-m-d', $value['createtime']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }



	/**
     * 未发货订单
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function order_wait()
    {

		$start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d', time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() + 24 * 60 * 60 ;

        $where = "1";

        if($start && $stop){

            $where = "created_at >= {$start} AND created_at <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND usernumber = {$_GET['usernumber']}";

        }


    	$params = array(

    		'table_name' => 'orders',

    		'where' => $where ." AND is_del = 0 AND status = 1",

    		'order' => 'created_at desc'
    	);

        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "未发货订单";

        //销费商姓名 realname	级别 user_rank	消费套餐 order_item_name	下单时间 created_at	订单编号 order_code	手机号	sendTel 销费商所属省市县 user_area
		//详细收货地址 sendAddress	物流公司 sendCommpany	物流编号 logistics_number 物流电话 logistics_tel
        $xlsCell  = array(
            array('realname','销费商姓名'),
            array('userrank','级别'),
            array('order_item_name','消费套餐'),
            array('created_at','下单时间'),
            array('order_code','订单编号'),
            array('sendTel','手机号'),
            array('area','销费商所属省市县'),
            array('sendAddress','详细收货地址'),
            array('sendCommpany','物流公司'),
            array('logistics_number','物流编号')
        );

        foreach ($xlsData as $key => $value) {
			//获取消费商 姓名 级别 realname userrank area
			//获取该订单商品列表 order_item_name
			$params = array(

				'table_name' => 'member',

				'where' => "uid = '{$value['user_id']}' AND status = 1"

			);

			$member = $this -> model -> my_find($params);

			$userrank_content = array("","普卡","银卡","金卡","钻卡");

			$xlsData[$key]['userrank'] = $userrank_content[$member['userrank']];

			$xlsData[$key]['area'] = $member['area'];

			$xlsData[$key]['realname'] = $member['realname'];

			$params = array(

				'table_name' => 'order_items',

				'where' => "order_id = '{$value['id']}'"

			);

			$order_items = $this -> model -> easy_select($params);

			$order_item_name = "";

			foreach ($order_items as $key1 => $value1) {
				$order_item_name = $order_item_name.$value1['name'];
			}

			$xlsData[$key]['order_item_name'] = $order_item_name;

            $xlsData[$key]['created_at'] = date('Y-m-d H:i:s', $value['created_at']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }


	/**
     * 已发货订单
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function order_sent()
    {

		$start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d', time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() + 24 * 60 * 60 ;

        $where = "1";

        if($start && $stop){

            $where = "created_at >= {$start} AND created_at <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND usernumber = {$_GET['usernumber']}";

        }


    	$params = array(

    		'table_name' => 'orders',

    		'where' => $where ." AND is_del = 0 AND status = 2",

    		'order' => 'created_at desc'
    	);

        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "已发货订单";

        //销费商姓名 realname	级别 user_rank	消费套餐 order_item_name	下单时间 created_at	订单编号 order_code	手机号	sendTel 销费商所属省市县 user_area
		//详细收货地址 sendAddress	物流公司 sendCommpany	物流编号 logistics_number 物流电话 logistics_tel
        $xlsCell  = array(
            array('realname','销费商姓名'),
            array('userrank','级别'),
            array('order_item_name','消费套餐'),
            array('created_at','下单时间'),
            array('order_code','订单编号'),
            array('sendTel','手机号'),
            array('area','销费商所属省市县'),
            array('sendAddress','详细收货地址'),
            array('sendCommpany','物流公司'),
            array('logistics_number','物流编号')
        );

        foreach ($xlsData as $key1 => $value) {
			//获取消费商 姓名 级别 realname userrank area
			//获取该订单商品列表 order_item_name
			$params = array(

				'table_name' => 'member',

				'where' => "uid = '{$value['user_id']}' AND status = 1"

			);

			$member = $this -> model -> my_find($params);

			$userrank_content = array("","普卡","银卡","金卡","钻卡");

			$xlsData[$key]['userrank'] = $userrank_content[$member['userrank']];

			$xlsData[$key]['area'] = $member['area'];

			$xlsData[$key]['realname'] = $member['realname'];

			$params = array(

				'table_name' => 'order_items',

				'where' => "order_id = '{$value['id']}'"

			);

			$order_items = $this -> model -> easy_select($params);

			$order_item_name = "";

			foreach ($order_items as $key => $value1) {
				$order_item_name = $order_item_name.$value1['name'];
			}

			$xlsData[$key]['order_item_name'] = $order_item_name;

            $xlsData[$key]['created_at'] = date('Y-m-d H:i:s', $value['created_at']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }



	/**
     * 已签收订单
     *
     * 参数描述：
     *
     *
     *
     * 返回值：
     *
     */
    public function order_sign()
    {

		$start = $_GET['start'] ? strtotime($_GET['start']) : strtotime(date('Y-m-d', time()));

        $stop = $_GET['stop'] ? strtotime($_GET['stop']) + 24 * 60 * 60 : time() + 24 * 60 * 60 ;

        $where = "1";

        if($start && $stop){

            $where = "created_at >= {$start} AND created_at <= {$stop}";

        }

        if($_GET['usernumber']){

            $where = $where ." AND usernumber = {$_GET['usernumber']}";

        }


    	$params = array(

    		'table_name' => 'orders',

    		'where' => $where ." AND is_del = 0 AND status = 2",

    		'order' => 'created_at desc'
    	);

        $xlsData = $this -> model -> easy_select($params);

        $xlsName  = "已签收订单";

        //销费商姓名 realname	级别 user_rank	消费套餐 order_item_name	下单时间 created_at	订单编号 order_code	手机号	sendTel 销费商所属省市县 user_area
		//详细收货地址 sendAddress	物流公司 sendCommpany	物流编号 logistics_number 物流电话 logistics_tel
        $xlsCell  = array(
            array('realname','销费商姓名'),
            array('userrank','级别'),
            array('order_item_name','消费套餐'),
            array('created_at','下单时间'),
            array('order_code','订单编号'),
            array('sendTel','手机号'),
            array('area','销费商所属省市县'),
            array('sendAddress','详细收货地址'),
            array('sendCommpany','物流公司'),
            array('logistics_number','物流编号')
        );

        foreach ($xlsData as $key1 => $value) {
			//获取消费商 姓名 级别 realname userrank area
			//获取该订单商品列表 order_item_name
			$params = array(

				'table_name' => 'member',

				'where' => "uid = '{$value['user_id']}' AND status = 3"

			);

			$member = $this -> model -> my_find($params);

			$userrank_content = array("","普卡","银卡","金卡","钻卡");

			$xlsData[$key]['userrank'] = $userrank_content[$member['userrank']];

			$xlsData[$key]['area'] = $member['area'];

			$xlsData[$key]['realname'] = $member['realname'];

			$params = array(

				'table_name' => 'order_items',

				'where' => "order_id = '{$value['id']}'"

			);

			$order_items = $this -> model -> easy_select($params);

			$order_item_name = "";

			foreach ($order_items as $key => $value1) {
				$order_item_name = $order_item_name.$value1['name'];
			}

			$xlsData[$key]['order_item_name'] = $order_item_name;

            $xlsData[$key]['created_at'] = date('Y-m-d H:i:s', $value['created_at']);

        }

        $this->exportExcel($xlsName,$xlsCell,$xlsData);
    }
    /**
	 * 业绩统计
	 *
	 * 参数描述：
	 *
	 *
	 *
	 * 返回值：
	 *
	 */
    // public function performance()
    // {
    // 	$params = array(

    // 		'table_name' => 'withdrawal',

    // 		'where' => "status = 0 OR status = 2",

    // 		'order' => 'createtime desc'
    // 	);

    // 	$result = $this -> model -> order_select($params);

    // 	$this -> assign('result', $result);

    // 	$this -> display();
    // }
}
