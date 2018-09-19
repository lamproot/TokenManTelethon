<?php if (!defined('THINK_PATH')) exit();//判断是否加载thinkphp,如果否则退出
/*********文件描述*********
 * @last update
 * @alter
 * @version 1.0.0
 *
 * 功能简介：
 * @author
 * @copyright
 * @time
 * @version 1.0.0
 */
	class CorpsAction extends CommonAction {

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

			$this -> model = D('Corps');
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
			$where = "";

			if($_GET['usernumber']){
				$where = "usernumber = ". htmlspecialchars($_GET['usernumber']);
			}

			//获取所有用户数据
			$params = array(

				'table_name' => 'member',

				'where' => $where,

				'order' => "uid desc"

			);

	    	$data = $this -> model -> order_select($params);

	    	$this -> assign('members', $data['result']);

			$this -> assign('page', $data['page']);

	    	$this -> display();
	    }


	    /**
		 * 展示型首页
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function download()
	    {
			$where = "";

			if($_GET['usernumber']){
				$where = "usernumber = ". htmlspecialchars($_GET['usernumber']);
			}

			//获取所有用户数据
			$params = array(

				'table_name' => 'member',

				'where' => $where,

				'order' => "uid desc"

			);

	    	$xlsData = $this -> model -> easy_select($params);

			$xlsName  = "Corps";

		    $xlsCell  = array(
			    array('usernumber','用户编号'),
			    array('realname','姓名'),
			    array('userrank','级别'),
			    array('usertitle','头衔'),
			    array('red_wine_number','数字红酒'),
			    array('jiangjinbi','奖金币'),
			    array('baodanbi','报单币'),
			    array('rongzidun','戎子盾'),
			    array('jianglijifen','奖励积分'),
			    array('tuijiannumber','拓展人'),
			    array('parentnumber','上级人'),
			    array('billcenterid','代理商编号'),
			   	array('reg_time','注册时间'),
			    array('status','状态')
		    );

		    foreach ($xlsData as $key => $value) {

		    	# 处理标题数据
				if ($value['userrank'] == 1) {
					$xlsData[$key]['userrank'] = "普卡销费商";
				} elseif ($value['userrank'] == 2) {
					$xlsData[$key]['userrank'] = "银卡销费商";
				} elseif ($value['userrank'] == 3) {
					$xlsData[$key]['userrank'] = "金卡销费商";
				} elseif ($value['userrank'] == 4) {
					$xlsData[$key]['userrank'] = "钻卡销费商";
				} else {
					$xlsData[$key]['userrank'] = "无";
				}

				$xlsData[$key]['usertitle'] = $xlsData[$key]['usertitle']."级销费商";

				if ($value['status'] == 0) {
					$xlsData[$key]['status'] = "未激活";
				} elseif ($value['status'] == 1) {
					$xlsData[$key]['status'] = "已激活";
				} elseif ($value['status'] == -1) {
					$xlsData[$key]['status'] = "已删除";
				} elseif ($value['status'] == -2) {
					$xlsData[$key]['status'] = "已冻结";
				} else {
					$xlsData[$key]['status'] = "未知";
				}

				$xlsData[$key]['reg_time'] = date("Y-m-d", $value['reg_time']);

		    }
		    $this->exportExcel($xlsName,$xlsCell,$xlsData);
	    }

		/**
		 * 销费商修改相关页面
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function edit()
	    {
			$uid = intval($_GET['uid']);

			//获取用户数据
			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid} AND status = 1"

			);

	    	$member = $this -> model -> my_find($params);

			$usertitle = array("零","一","二","三","四","五","六");

			$member["usertitle"] = $usertitle[$member['usertitle']];

			$zone = array("1" => "左", "2" => "中", "3" => "右");

			$member["zone"] = $zone[$member['zone']];

			//获取代理商编号数据
			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$member['billcenterid']} AND status = 1"

			);

	    	$billmember = $this -> model -> my_find($params);

			//获取拓展人数据
			$params = array(
				'table_name' => 'member',

				'where' => "uid = {$member['tuijianid']} AND status = 1"

			);

	    	$recommendmember = $this -> model -> my_find($params);

			//获取位置编号据 parentid
			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$member['parentid']} AND status = 1"

			);

	    	$parentmember = $this -> model -> my_find($params);

	    	$this -> assign('member', $member);

			$this -> assign('billmember', $billmember);

			$this -> assign('recommendmember', $recommendmember);

			$this -> assign('parentmember', $parentmember);

	    	$this -> display();
	    }


		/**
		 * 设置为代理商编号
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function set_bill_center()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['isbill'] = intval($_GET['isbill']) ? $_GET['isbill'] : 1;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1){
				$this -> redirect("/Corps/edit?uid=".$uid);
			}else{
				$this -> _back('销费商代理商编号设置失败失败');
			}
	    }

		/**
		 * 设置为代理商编号
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function no_set_bill_center()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['isbill'] = 0;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1){
				$this -> redirect("/Corps/edit?uid=".$uid);
			}else{
				$this -> _back('销费商代理商编号取消失败');
			}
	    }

	    /**
		 * 冻结销费商
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function freeze()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['status'] = -2;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1){
				$this -> redirect("/Corps/index");
			}else{
				$this -> _back('冻结销费商失败');
			}
	    }

		/**
		 * 冻结销费商
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function nofreeze()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['status'] = 1;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1){
				$this -> redirect("/Corps/index");
			}else{
				$this -> _back('冻结销费商失败');
			}
	    }

	    /**
		 * 删除销费商
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function delete()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['status'] = -1;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);


			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}"
			);

			$member = $this -> model -> my_find($params);

			if ($my_save == 1){

				if($member){

					if($member['zone'] == 1){
						$parentdata['left_zone'] = 0;
					}

					if($member['zone'] == 2){
						$parentdata['middle_zone'] = 0;
					}


					if($member['zone'] == 3){
						$parentdata['right_zone'] = 0;
					}

					$params = array(

						'table_name' => 'member',

						'where' => "uid = {$uid}",

						'data' => $parentdata
					);

					$parent_save = $this -> model -> my_save($params);
				}

				$this -> redirect("/Corps/index");
			}else{
				$this -> _back('删除销费商失败');
			}
	    }

		/**
		 * 删除销费商
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function nodelete()
	    {
			$uid = intval($_GET['uid']);

			$data['update_time'] = time();

			$data['status'] = 1;

			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1){
				$this -> redirect("/Corps/index");
			}else{
				$this -> _back('删除销费商失败');
			}
	    }


		/**
		 * 获取消费商信息
		 *
		 * 参数描述：@usernumber 拓展人编号
		 *
		 * 返回值：
		 *
		 */
		 public function get_userinfo()
		 {

			$usernumber = htmlspecialchars($_GET['usernumber']);

			//查询用户资料数据
 			$params = array(

 				'table_name' => 'member',

 				'where' => "usernumber = '{$usernumber}' AND status = 1"

 			);

 			$member = $this -> model -> my_find($params);

			$userinfo = array();

 			if($member){

				$userinfo['realname'] = $member['realname'];

				$userinfo['uid'] = $member['uid'];

				$userrank_content = array("","普卡","银卡","金卡","钻卡");

				$userinfo['userrankname'] = $userrank_content[$member['userrank']];

				$userinfo['userrank'] = $member['userrank'];

				$userinfo['canlevel'] = array();

				$userinfo['upgrade_status'] = $member['upgrade_status'];
 			}

			die(json_encode(array("success" => true, "code" => 200, "msg" => "代理商编号获取成功", "data" => $userinfo)));
		 }


		 /**
 		 * 销费商升级
 		 *
 		 * 参数描述：
 		 *
 		 *
 		 *
 		 * 返回值：
 		 *
 		 */
 	    public function upgrade()
 	    {
 			$form_key = htmlspecialchars($_POST['form_key']);

 			if ($form_key == 'yes')
 			{

				$params = array(

 					'table_name' => 'member',

 					'where' => "uid = {$_POST['uid']} AND usernumber = '{$_POST['usernumber']}'"

 				);

 				$member_find = $this -> model -> my_find($params);

				if($member_find['userrank'] == 1){
					$this -> _back('普卡不能升级');return;
				}
				if($member_find && $member_find['upgrade_status'] == 1){
					$this -> _back('消费商只能升级一次');return;
				}

				$data['userrank'] = $_POST['canlevel'];

				$data['upgrade_level'] = $_POST['oldrank'];

				$data['upgrade_status'] = 1;

				$data['upgrade_time'] = time();

 			 	$params = array(
				
 			 		'table_name' => 'member',
				
 			 		'where' => "uid = {$_POST['uid']} AND usernumber = '{$_POST['usernumber']}'",
				
				 	'data' => $data
 			 	);
				
 			 	$my_save = $this -> model -> my_save($params);

				$my_save = 1;
				
				if ($my_save == 1){

					//更新相关信息业绩和激活信息
					$this -> update_upgrade_info($_POST['uid'], $data);

					echo '<script language="JavaScript">;alert("消费商升级成功");</script>;';
					//$this -> redirect("/Corps/upgrade");
				}else{
					$this -> _back('销费商代理商编号设置失败失败');
				}
			}

			$this -> display();
		}


		function update_upgrade_info($uid, $upgrade)
		{

			$Activates=A("Activates");

			//查询该用户是否符合升级条件
			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid} AND status = 1"

			);

			$member = $this -> model -> my_find($params);

			if($member){
				if(intval($upgrade['upgrade_level']) == 2 && intval($upgrade['userrank']) == 3){
					$deduct = 30000 - 10000;
				}elseif(intval($upgrade['upgrade_level']) == 2 && intval($upgrade['userrank']) == 4) {
					$deduct = 50000 - 10000;
				}elseif(intval($upgrade['upgrade_level']) == 3 && intval($upgrade['userrank']) == 4) {
					$deduct = 30000 - 10000;
				}

				//获取代理商编号数据
				$params = array(

					'table_name' => 'member',

					'where' => "uid = 1"

				);

				$billmember = $this -> model -> my_find($params);

				if(intval($billmember['baodanbi']) < $deduct/2){
					$this -> _back("账户注册币不足{$billmember['baodanbi']}");return;
				}

				if(intval($billmember['jihuobi']) < $deduct/2){
					$this -> _back("账户激活币不足{$billmember['jihuobi']}");return;
				}

				//注册币余额计算
				$billdata['baodanbi'] = intval($billmember['baodanbi']) - $deduct/2;

				//激活币余额计算
				$billdata['jihuobi'] = intval($billmember['jihuobi']) - $deduct/2;

				//更新代理商编号相应数据
				$billparams = array(

					'table_name' => 'member',

					'where' => "uid = 1",

					'data' => $billdata
				);

				$bill_member_save = $this -> model -> my_save($billparams);

				if ($bill_member_save == 1){

					$Activates -> add_finance($deduct);

					//添加到戎子财务流水  money_change
					$money_change_data['changetype'] = 2;

					$money_change_data['realname'] = $member['realname'];

					$money_change_data['status'] = 1;

					$money_change_data['targetrealname'] = "戎子";

					$money_change_data['targetuserid'] = 1;

					$money_change_data['targetusernumber'] = 1;

					$money_change_data['userid'] = $member['uid'];

					$money_change_data['usernumber'] = $member['usernumber'];

					$money_change_data['createtime'] = time();

					$add_array = array(
						"0" => array(
							'name' => "baodanbi",
							'moneytype' => 2,
							'ratio' => "0.50",
							'recordtype' => 0
						),
						"1" => array(
							'name' => "jihuobi",
							'moneytype' => 4,
							'ratio' => "0.50",
							'recordtype' => 0
						)
					);

					foreach ($add_array as $key => $value) {

						$money_change_data['recordtype'] = $value['recordtype'];

						$money_change_data['money'] = $deduct * $value['ratio'];

						$money_change_data['moneytype'] = $value['moneytype'];

						//添加财务明细记录
						$params = array(

							'table_name' => 'money_change',

							'data' => $money_change_data
						);

						$money_change_add = $this -> model -> my_add($params);

					}

				}

			}else{
				$this -> _back('升级账号获取失败，请重试。');
			}

			//修改相关所有人业绩
			$contactuserpath_arr = array_reverse(explode(",", $member['contactuserpath']));

			foreach ($contactuserpath_arr as $key => $value) {

				//查询该用户在左区中区还是右区
				if($contactuserpath_arr[$key] && $contactuserpath_arr[$key+1] && $member['userrank'] != 1){

					# 获取当前用户区间
					$contact_uid = $contactuserpath_arr[$key];

					//查询当前用户在父类的哪个区间
					$params = array(

						'table_name' => 'member',

						'where' => "uid = {$contact_uid}"

					);

					$contact = $this -> model -> my_find($params);

					#获取父类用户相关信息
					$contact_parent_uid = $contactuserpath_arr[$key+1];

					//获取父类相关数据
					$params = array(

						'table_name' => 'member',

						'where' => "uid = {$contact_parent_uid}"

					);
					$contact_parent = $this -> model -> my_find($params);

					$contact_parent_data = array();

					if($contact['zone'] == 1){

						$contact_parent_data['leftachievement'] = $contact_parent['leftachievement'] + $deduct;

					}elseif($contact['zone'] == 2){

						$contact_parent_data['middleachievement'] = $contact_parent['middleachievement'] + $deduct;

					}elseif($contact['zone'] == 3){

						$contact_parent_data['rightachievement'] = $contact_parent['rightachievement'] + $deduct;
					}

					$contact_parent_data['achievement'] = $contact_parent['achievement'] + $deduct;

					$contact_parent_data['num'] = $contact_parent['num'] + 1;

					//修改父类相关数据
					$params = array(

						'table_name' => 'member',

						'where' => "uid = {$contact_parent_uid} AND status = 1",

						'data' => $contact_parent_data

					);

					$contact_parent_save = $this -> model -> my_save($params);

					$achievementdata = array();
					//业绩区间
					$achievementdata['zone'] = $contact['zone'];
					//业绩金额
					$achievementdata['deduct'] = $deduct;
					//业绩来源用户
					$achievementdata['fromuid'] = $contact_uid;
					//业绩用户
					$achievementdata['uid'] = $contact_parent_uid;
					//业绩产生用户
					$achievementdata['produceuid'] = $uid;
					//业绩时间
					$achievementdata['created_at'] = time();

					//添加业绩增加LOG
					$params = array(

						'table_name' => 'achievement_log',

						'data' => $achievementdata

					);

					$achievementadd = $this -> model -> my_add($params);
				}
			}


			$data['update_time'] = time();

			if($member['userrank'] == 3){
				$data['red_wine_number'] = 1;
			}elseif($member['userrank'] == 4){
				$data['red_wine_number'] = 3;
			}


			//写入数据库
			$params = array(

				'table_name' => 'member',

				'where' => "uid = {$uid}",

				'data' => $data
			);

			$my_save = $this -> model -> my_save($params);

			if ($my_save == 1)
			{
				//更新上级部门人数
				//$this -> save_member_num($member);

				//更新市场补贴
				$Activates -> save_market_subsidy($deduct);

				//更新拓展补贴
				$Activates -> save_expand_subsidy($member, $deduct);



				//调用Python脚本
				//exec("python ./");
				system("python ./scripts/upgrade.py {$uid}", $ret);
	   			//system("python ./scripts/achievement.py", $ret2);
				//更新消费套餐红酒订单 添加一份订单
				$Activates -> save_red_order($member);

				redirect(__APP__.'/Activates/index', 0);
			}
			else
			{
				$this -> _back('激活失败，请重试。');
			}
		}
	}
