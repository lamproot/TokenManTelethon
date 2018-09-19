<?php if (!defined('THINK_PATH')) exit();//判断是否加载thinkphp,如果否则退出
/*********文件描述*********
 * @last update 2014-06-12
 * @alter
 * @version 1.0.0
 *
 * 功能简介：商户后台基类
 * @author 张睿
 * @copyright 社区送
 * @time 2014-06-12
 * @version 1.0.0
 */
	Load('extend');//插件

	import('ORG.Util.Page');//分页类

	import('ORG.Net.UploadFile');//文件上传类

	class CommonAction extends Action {

		/**
		 * 初始化方法
		 *
		 * 参数描述：
		 *
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
		public function _initialize()
		{
			if (!$_SESSION['Rongzi']['admin'])
			{
				// die('<meta http-equiv="Content-Type" content="text/html"; charset="utf8">您未登录或登录已过期，点击<a href="'.__APP__.'/Login/login" target="_top">此处</a>重新登录');
				//redirect(__APP__.'/Login/login', 0);
			}
			else
			{
				define('ADMIN_ID', $_SESSION['Rongzi']['admin']['id']);

				$this -> model = D('Common');
				//查询商户
				$params = array(

					'table_name' => 'auth',

					'where' => "name = '".$_SESSION['Rongzi']['admin']['type_str']."'"
				);

				$admin_auth = $this -> model -> my_find($params);

				$_SESSION['Rongzi']['adminauth'] = explode("\n", $admin_auth['auth_action']);

			}
		}

		/**
		 * 返回
		 *
		 * 参数描述：
		 *   message
		 *
		 *
		 * 返回值：
		 *
		 */
	    public function _back($message)
	    {
	    	$msg = $message ? $message : '出现错误，请稍后再试。';

	    	die('<meta http-equiv="Content-Type" content="text/html"; charset="utf8"><script language="javascript">alert("' . $msg . '");window.history.back(-1);</script>');
	    }

	    /**
		*[Rongzi] (Beta)2014-~ 社区送 Crm.
		************************************
		* 经常去APP接口上传图片封装
		************************************
		* @author
		* @time:2014-06-12
		* @version: 1.0.0
		***************参数描述*************
		*   @param width
		*   @param height
		*   @param path
		*   @param prefix
		*
		* 返回值：path图片路径 msg图片名字  status上传状态
		* 使用：$this -> _upload_pic('160,230', '230,121',  "dishes/", 'small_,middle_');
		* 多参数使用 'width1,width2'  , 'height1,height2' , 存放路径 , '第一个图片前缀,第二个图片前缀'
		******************************************************
		* 例子 $pic = $this -> _upload_pic('160,230', '230,121',  "dishes/", 'small_,middle_');
		*$param['dishes_big_pic']=$pic["path"].''.$pic["msg"];
		*$param['dishes_middle_pic']=$pic["path"].'middle_'.$pic["msg"];
		*$param['dishes_small_pic']=$pic["path"].'small_'.$pic["msg"];
		*/
		public function _upload_pic($path='others')
		{

			import('ORG.Net.UploadFile');
			$width = '1000,654,600,130';
			$height = '570,768,400,130';
			$prefix = 'b_,m_,s_,l_';
	        $upload = new UploadFile(); // 实例化上传类
	        $upload->maxSize =10000000; // 设置附件上传大小
	        $upload->savePath = '../Uploads/images/' . $path . '/'; // 设置附件上传目录
	        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
	        // $upload->saveRule = 'time';
	        $upload->uploadReplace = true; //是否存在同名文件是否覆盖
	        $upload->thumb = true; //是否对上传文件进行缩略图处理
	        $upload->thumbMaxWidth = $width; //缩略图处理宽度
	        $upload->thumbMaxHeight = $height; //缩略图处理高度
	        $upload->thumbPrefix = $prefix; //缩略图前缀

	        $upload->thumbPath = '../Uploads/images/' . $path .'/'; //缩略图保存路径
	        //$upload->thumbRemoveOrigin = true; //上传图片后删除原图片
	        $upload->autoSub = false; //是否使用子目录保存图片
	        $upload->subType = 'date'; //子目录保存规则
	        //$upload->dateFormat = 'Ymd'; //子目录保存规则为date时时间格式

	        if (!$upload->upload()) {// 上传错误提示错误信息
	            return array('msg' => $upload->getErrorMsg(), 'status' => 0);
	        } else {// 上传成功 获取上传文件信息
	            $info = $upload->getUploadFileInfo();

	            $picname = $info[0]['savename'];

	            //$picname = explode('/', $picname);
				//$picname = $picname[1];
	            //$picname = $picname[0] . '/' . $prefix . $picname[1];
	            return array('status' => 1, 'old_name' => $info[0]['name'], 'msg' => $picname,'path' => $upload->thumbPath);
	        }
		}

		 /**
		*[Rongzi] (Beta)2014-~ 社区送 Crm.
		************************************
		* 经常去APP接口上传图片封装
		************************************
		* @author
		* @time:2014-06-12
		* @version: 1.0.0
		***************参数描述*************
		*   @param width
		*   @param height
		*   @param path
		*   @param prefix
		*
		* 返回值：path图片路径 msg图片名字  status上传状态
		* 使用：$this -> _upload_pic('160,230', '230,121',  "dishes/", 'small_,middle_');
		* 多参数使用 'width1,width2'  , 'height1,height2' , 存放路径 , '第一个图片前缀,第二个图片前缀'
		******************************************************
		* 例子 $pic = $this -> _upload_pic('160,230', '230,121',  "dishes/", 'small_,middle_');
		*$param['dishes_big_pic']=$pic["path"].''.$pic["msg"];
		*$param['dishes_middle_pic']=$pic["path"].'middle_'.$pic["msg"];
		*$param['dishes_small_pic']=$pic["path"].'small_'.$pic["msg"];
		*/
		public function _upload_pic_all($path='others')
		{

			import('ORG.Net.UploadFile');
			$width = '1000,654,600,130';
			$height = '570,768,400,130';
			$prefix = 'b_,m_,s_,l_';
	        $upload = new UploadFile(); // 实例化上传类
	        $upload->maxSize =10000000; // 设置附件上传大小
	        $upload->savePath = './Uploads/images/' . $path . '/'; // 设置附件上传目录
	        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
	        // $upload->saveRule = 'time';
	        $upload->uploadReplace = true; //是否存在同名文件是否覆盖
	        $upload->thumb = true; //是否对上传文件进行缩略图处理
	        $upload->thumbMaxWidth = $width; //缩略图处理宽度
	        $upload->thumbMaxHeight = $height; //缩略图处理高度
	        $upload->thumbPrefix = $prefix; //缩略图前缀

	        $upload->thumbPath = './Uploads/images/' . $path .'/'; //缩略图保存路径
	        //$upload->thumbRemoveOrigin = true; //上传图片后删除原图片
	        $upload->autoSub = false; //是否使用子目录保存图片
	        $upload->subType = 'date'; //子目录保存规则
	        //$upload->dateFormat = 'Ymd'; //子目录保存规则为date时时间格式

	        if (!$upload->upload()) {// 上传错误提示错误信息
	            return array('msg' => $upload->getErrorMsg(), 'status' => 0);
	        } else {// 上传成功 获取上传文件信息
	            $info = $upload->getUploadFileInfo();

	            foreach ($info as $key => $value) {
	            	# code...
	            	$infos["{$value['key']}"]['status'] = 1;
	            	$infos["{$value['key']}"]['msg'] = $value['savename'];
	            }

	            $picname = $infos;

	            return $picname;
	            //$picname = $info[0]['savename'];

	            //$picname = explode('/', $picname);
				//$picname = $picname[1];
	            //$picname = $picname[0] . '/' . $prefix . $picname[1];
	            //return array('status' => 1, 'old_name' => $info[0]['name'], 'msg' => $picname,'path' => $upload->thumbPath);
	        }
		}

		    /**
		*[Rongzi] (Beta)2014-~ 社区送 Crm.
		************************************
		* 经常去APP 上传封装
		************************************
		* @author
		* @time:2014-06-12
		* @version: 1.0.0
		***************参数描述*************
		*   @param width
		*   @param height
		*   @param path
		*   @param prefix
		*
		* 返回值：path路径 msg名字  status上传状态
		*/
		public function _upload_app($path='others')
		{

			import('ORG.Net.UploadFile');

	        $upload = new UploadFile(); // 实例化上传类
	        $upload->maxSize =10000000; // 设置附件上传大小
	        $upload->savePath = './Uploads/app/' . $path . '/'; // 设置附件上传目录
	        $upload->allowExts = array('apk', 'ipa'); // 设置附件上传类型
	        // $upload->saveRule = 'time';
	        $upload->uploadReplace = true; //是否存在同名文件是否覆盖
	        //$upload->thumbRemoveOrigin = true; //上传图片后删除原图片
	        $upload->autoSub = false; //是否使用子目录保存图片
	        $upload->subType = 'date'; //子目录保存规则
	        //$upload->dateFormat = 'Ymd'; //子目录保存规则为date时时间格式

	        if (!$upload->upload()) {// 上传错误提示错误信息
	            return array('msg' => $upload->getErrorMsg(), 'status' => 0);
	        } else {// 上传成功 获取上传文件信息
	            $info = $upload->getUploadFileInfo();

	            $picname = $info[0]['savename'];

	            //$picname = explode('/', $picname);
				//$picname = $picname[1];
	            //$picname = $picname[0] . '/' . $prefix . $picname[1];
	            return array('status' => 1, 'old_name' => $info[0]['name'], 'msg' => $picname,'path' => $upload->thumbPath);
	        }
		}
		/**
		 * 覆盖式上传
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
		public function _replace_upload_pic($path='others')
		{

			import('ORG.Net.UploadFile');
			$width = '1000,654,600,130';
			$height = '570,768,400,130';
			$prefix = 'b_,m_,s_,l_';
	        $upload = new UploadFile(); // 实例化上传类
	        $upload->maxSize =10000000; // 设置附件上传大小
	        $upload->savePath = './Uploads/images/' . $path . '/'; // 设置附件上传目录
	        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg', 'js'); // 设置附件上传类型
	        $upload->saveRule = ''; //上传文件名不变
	        $upload->uploadReplace = true; //是否存在同名文件是否覆盖
	        $upload->thumb = true; //是否对上传文件进行缩略图处理
	        $upload->thumbMaxWidth = $width; //缩略图处理宽度
	        $upload->thumbMaxHeight = $height; //缩略图处理高度
	        $upload->thumbPrefix = $prefix; //缩略图前缀

	        $upload->thumbPath = './Uploads/images/' . $path .'/'; //缩略图保存路径
	        //$upload->thumbRemoveOrigin = true; //上传图片后删除原图片
	        $upload->autoSub = false; //是否使用子目录保存图片
	        $upload->subType = 'date'; //子目录保存规则
	        //$upload->dateFormat = 'Ymd'; //子目录保存规则为date时时间格式

	        if (!$upload->upload()) {// 上传错误提示错误信息
	            return array('msg' => $upload->getErrorMsg(), 'status' => 0);
	        } else {// 上传成功 获取上传文件信息
	            $info = $upload->getUploadFileInfo();

	            $picname = $info[0]['savename'];

	            //$picname = explode('/', $picname);
				//$picname = $picname[1];
	            //$picname = $picname[0] . '/' . $prefix . $picname[1];
	            return array('status' => 1, 'old_name' => $info[0]['name'], 'msg' => $picname,'path' => $upload->thumbPath);
	        }
		}

		/**
		 * 非空验证
		 *
		 * 参数描述：
		 *
		 *
		 *
		 * 返回值：
		 *
		 */
		public function _is_null($data, $msg = '信息不完整')
		{
			if ($data != null && $data != '')
			{
				return $data;
			}
			else
			{
				$this -> _back($msg);
			}
		}

		/**
		************************************
		* 获取汉字首字母
		************************************
		* @author 张睿:qbx
		* @time:2014-07-21
		* @version: 1.0.0
		***************功能描述*************
		* @param: str 汉字
		************************************
		*/
		public function getFirstCharter($str){
		     if(empty($str)){return '';}
		     $fchar=ord($str{0});
		     if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
		     $s1=iconv('UTF-8','gb2312',$str);
		     $s2=iconv('gb2312','UTF-8',$s1);
		     $s=$s2==$str?$s1:$str;
		     $asc=ord($s{0})*256+ord($s{1})-65536;
		     if($asc>=-20319&&$asc<=-20284) return 'A';
		     if($asc>=-20283&&$asc<=-19776) return 'B';
		     if($asc>=-19775&&$asc<=-19219) return 'C';
		     if($asc>=-19218&&$asc<=-18711) return 'D';
		     if($asc>=-18710&&$asc<=-18527) return 'E';
		     if($asc>=-18526&&$asc<=-18240) return 'F';
		     if($asc>=-18239&&$asc<=-17923) return 'G';
		     if($asc>=-17922&&$asc<=-17418) return 'H';
		     if($asc>=-17417&&$asc<=-16475) return 'J';
		     if($asc>=-16474&&$asc<=-16213) return 'K';
		     if($asc>=-16212&&$asc<=-15641) return 'L';
		     if($asc>=-15640&&$asc<=-15166) return 'M';
		     if($asc>=-15165&&$asc<=-14923) return 'N';
		     if($asc>=-14922&&$asc<=-14915) return 'O';
		     if($asc>=-14914&&$asc<=-14631) return 'P';
		     if($asc>=-14630&&$asc<=-14150) return 'Q';
		     if($asc>=-14149&&$asc<=-14091) return 'R';
		     if($asc>=-14090&&$asc<=-13319) return 'S';
		     if($asc>=-13318&&$asc<=-12839) return 'T';
		     if($asc>=-12838&&$asc<=-12557) return 'W';
		     if($asc>=-12556&&$asc<=-11848) return 'X';
		     if($asc>=-11847&&$asc<=-11056) return 'Y';
		     if($asc>=-11055&&$asc<=-10247) return 'Z';
		     return null;
	 	}

		/**
		* 生成uniqid订单号
		*
		*/
		public function get_order_number(){
			return date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
		}

		/**
		* 生成uniqid订单号
		*
		*/
		public function get_user_number(){
			return rand(0,9).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 6).rand(0,9);
		}


		/**
		* 导出excel
		*
		*/
		public function exportExcel($expTitle,$expCellName,$expTableData){

			$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
			$fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
			$cellNum = count($expCellName);
			$dataNum = count($expTableData);
			import("ORG.PHPExcel");
			$objPHPExcel = new PHPExcel();

			$cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

			$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
		   // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
			for($i=0;$i<$cellNum;$i++){
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
			}
			  // Miscellaneous glyphs, UTF-8
			for($i=0;$i<$dataNum;$i++){
			  for($j=0;$j<$cellNum;$j++){
				$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
			  }
			}

			header('pragma:public');
			header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
			header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		}

		public function fetch ($url, $postdata = null) {
            $ch = curl_init ();
            curl_setopt ($ch, CURLOPT_URL, $url);
            if (!is_null ($postdata)) {
                curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query ($postdata));
            }
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $re = curl_exec ($ch);

            $err_code = curl_errno($ch);
            if($err_code)
            {
                $errorModel = new ErrorModel;
                $errorModel->sendError (MASTER, "err_code" . $err_code);
            }

            curl_close ($ch);

            return $re;
        }


		
	}
