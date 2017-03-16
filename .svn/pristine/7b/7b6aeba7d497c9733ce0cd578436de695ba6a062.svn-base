<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Shanghai');
include_once(dirname(dirname(dirname(__FILE__))) . '/360safe/360webscan.php');
/**
 * 趣果仁首页
 **/

class Main extends Application
{
    public function __construct()
    {
        // Do something with $params
        parent::__construct();

		if( $this->Common->if_mobile() )
		{
			$this->if_mobile = 'mobile';
		}
    }
	

	/*
	*	@活动首页
	*	@guoliang
	*	@2017年1月26日
	*/
	public function index()
	{
		$url = $this->api_url.'/api/event?action=get_event_list&page=1';
		
		if( $_POST )
		{
			$postdata = html_filter_array($_POST);
			if( $postdata['dazhou'] )
				$url .= '&dazhou='.$postdata['dazhou'];
		}	

			if( $_POST )
		{
			$postdata = html_filter_array($_POST);
			if( $postdata['hanyu'] )
				$url .= '&hanyu='.$postdata['hanyu'];
		}	


			if( $_POST )
		{
			$postdata = html_filter_array($_POST);
			if( $postdata['fensi'] )
				$url .= '&fensi='.$postdata['fensi'];
		}	



		
		$res = file_get_contents($url);

		if( !is_numeric($res) )
		{
			$res = json_decode($res,true);
		}

/*		$list_arr = array(
		 	'orderby'=>'ctime',
     		'city'=>'all',
     		'status'=>'all',
     		'category'=>'all'
			);
			
		$data['res'] = $this->Quguoren->get_all_info($list_arr);*/
	
		$data['res'] = $res['data'];
		$this->load->view('main/index',$data);
	}

	/*
	*	@主播首页
	*	@guoliang
	*	@2017年1月26日
	*/
	public function student()
	{
		$url = $this->api_url.'/api/anchor_list?action=anchor_list&page=1';
		if($_SESSION['uid'] )
		{
			$url .= '&uid='.$_SESSION['uid'];
		}
		$res = file_get_contents($url);


		if( !is_numeric($res) )
		{
			$res = json_decode($res,true);
		}
	
		$data['res'] = $res['data'];
				
		//处理排序，分页
//		$list_arr = array(
//		 	'dazhou'=>'all',
//     		'hsk_class'=>'all',
//     		'city'=>'all',
//     		'orderby'=>'ctime'
//			);
//		$data['res'] = $this->Quguoren->get_all_zhubo($list_arr);
		$this->load->view('main/student',$data);
	}


	/*
	*	@主播详情
	*	@guoliang
	*	@2017年1月26日
	*/
	public function student_detail($id=1)
	{
		if( $_SESSION['uid'] == '' )
			redirect('user/login');
			
		$data = array();
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$id;

		$res = file_get_contents($url);

		$res = json_decode($res,true);	
		
		if( $res['data']['gr_type'] == 4 )
		{
			redirect('main/show_student/'.$id);
		}
		if( $res['data']['status'] == 0 )
		{
			$data['res'] = $res['data'];
			//查询用户评级
			$url = $this->api_url.'/api/get_user_star?action=get_comment_star&id='.$id;
			$result = file_get_contents($url);
			$result = json_decode($result,true);		
			$data['star'] = number_format($result['star'],1);
			
			//查询用户点赞数量
			$url = $this->api_url.'/api/get_user_support?action=get_support_count&id='.$id;
			$result = file_get_contents($url);
			$result = json_decode($result,true);		
			$data['support'] = $result['support'];	
			
			//查询用户参与活动次数
			$url = $this->api_url.'/api/get_user_join?action=get_join_count&id='.$id;
			$result = file_get_contents($url);
			$result = json_decode($result,true);		
			$data['join'] = $result['join'];	
			
			//查询用户获得的评价个数 
			$url = $this->api_url.'/api/get_comment_count?action=get_comment_count&id='.$id;
			$result = file_get_contents($url);
			$result = json_decode($result,true);		
			$data['comment'] = $result['comment'];	
			
			if( $_SESSION['uid'] )
			{								
				//查询当前用户是否已关注此用户
				$url = $this->api_url.'/api/check_if_follow?action=check_user_follow&zhubo_id='.$id."&uid=".$_SESSION['uid'];
				$result = file_get_contents($url);
				$result = json_decode($result,true);		
				$data['if_follow'] = $result['if_follow'];			
			}
		}
		$data['id'] = $id;
//print_r($data);exit;		
		$this->load->view('main/student_detail',$data);
	}

	/*
	*	@学生详情
	*	@yinting
	*	@2017年3月2日
	*/
	public function show_student($id,$type=1 )
	{
		if( $_SESSION['uid'] == '' )
			redirect('user/login');
			
		$data = array();
		//Step 2 : 查询用户信息
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$id;

		$res = file_get_contents($url);

		$res = json_decode($res,true);	
		$userinfo = $res['data'];
		
		if( $userinfo['gr_type'] == 4 )
		{
			$type = $type == 1 ? 2:$type;
		}
		//Step 2 : 查询用户发起的活动
		if( $type == 1 ) 
		{	
			$url = $this->api_url.'/api/my_event?action=get_my_event&uid='.$id.'&page=1';
			$res = file_get_contents($url);
			$res = json_decode($res,true);	

			$data = $res['data'];			
		}
		elseif( $type == 2 ) //查询用户参加的活动
		{
			$url = $this->api_url.'/api/my_join?action=get_my_join&id='.$id.'&page=1';
			$res = file_get_contents($url);
			$res = json_decode($res,true);	

			$data = $res['data'];			
		}
		else	//查询用户评价
		{
			$url = $this->api_url.'/api/get_user_comment?action=get_user_comment&id='.$id.'&page=1';
			$res = file_get_contents($url);
			$res = json_decode($res,true);
			$data = $res['data'];			
		}
		if( $_SESSION['uid'] )
		{								
			//查询当前用户是否已关注此用户
			$url = $this->api_url.'/api/check_if_follow?action=check_user_follow&zhubo_id='.$id."&uid=".$_SESSION['uid'];
			$result = file_get_contents($url);
			$result = json_decode($result,true);		
			$viewdata['if_follow'] = $result['if_follow'];			
		}		
		
		$viewdata['data'] = $data;
		$viewdata['type'] = $type;
		$viewdata['id'] = $id;
		$viewdata['userinfo'] = $userinfo;
//print_r($data);exit;		
		$this->load->view('main/show_student',$viewdata);	
	}

	/*
	*	@活动详情页面
	*	@guoliang
	*	@2017年1月26日
	*/
	public function info_detail($id=1)
	{
		$url = $this->api_url.'/api/detail?action=get_event_detail&id='.$id;
	
		$res = file_get_contents($url);
		 //ar_dump($url);exit;
		// exit;
		$res = json_decode($res,true);
//print_r($_SESSION);exit;
		if( $res['data']['status'] == 0 )
		{
			if( $_SESSION['uid'] != $res['data']['uid'] )
			{
				redirect('main/');
			}
		}
		
		if( $res['data']['status'] >0 )
		{
			$url = $this->api_url.'/api/set_view?action=release_view&id='.$id;
			$view = file_get_contents($url);			
		}
		$data['data'] = $res['data'];
		//判断当前用户是否已报名
		if( $_SESSION['uid'] )
		{
			$url = $this->api_url.'/api/check_signup?action=check_signup&uid='.$_SESSION['uid'].'&info_id='.$id;	
		
			$res = file_get_contents($url);
			$res = json_decode($res,true);	
			if( $res['status'] == 1 )
			{
				$data['if_joininfo'] = 1;
			}
		}
		
		
			
		//获取精选活动
		$hot_events = file_get_contents($this->api_url.'/api/hot_events?action=get_hot_event');

		$hot_events = json_decode($hot_events,true);						
		unset($hot_events['data']['start_time']);			
		unset($hot_events['data']['end_time']);

		//$data['res'] = $this->Quguoren->get_info($id);
		
		$data['title'] = $res['data']['title'];
		
		$data['hot_events'] = $hot_events['data'];
	
		$if = $this->Quguoren->get_if_user_favorinfo($_SESSION['uid'],$id);
		$data['if_favorinfo'] = empty($if)?0:1;
		$if = $this->Quguoren->get_if_user_guanzhu_zhubo($_SESSION['uid'],$data['data']['uid']);
		
		$data['if_guanzhu'] = empty($if)?0:1;
		$data['id'] = $id;
	
		$this->load->view('main/info_detail',$data);
	}
	
	/*
	*	@报名活动
	*	@yinting
	*	@2017年3月2日
	*/
	public function signup( $info_id = '')
	{
		$info_id = (int)$info_id;
		
		if( $_SESSION['uid'] == '' )
		{
			redirect('user/login');
		}
		if( $info_id )
		{	
			$url = $this->api_url.'/api/signup';
	
			$sign_arr['action'] = 'signup';
			$sign_arr['info_id'] = $info_id;
			$sign_arr['uid'] = $_SESSION['uid'];
						
			$res = $this->Common->_curl_init_post( $url, $sign_arr );
			$res = json_decode($res,true);		
			
			if( $res['status'] == 1 )
			{
				$data = $res['infodata'];
				if( $data['type'] == 2 )
				{
					redirect('main/info_detail/'.$info_id);
				}
				else
				{
					//print_r($res);exit;
					$_SESSION['pay_pay_id'] = $res['pay_id'];
					$_SESSION['pay_info_id'] = $info_id;
//print_r($_SESSION);exit;					
					//redirect('main/pay/');
					header('Location:'.base_url().'main/pay/');
				}
			}
			else
			{
				echo '<script>alert("'.$res['msg'].'");location.href="/main/info_detail/'.$info_id.'"</script>';
				//exit;
/*				echo "<script>alert('".$res['msg']."');</script>";		
				redirect('/main/info_detail/'.$info_id);*/
			}
			
		}
		else
		{
			redirect('main/');
		}
	}
	
		
	
	/*
	*	@活动报名管理页面
	*	@guoliang
	*	@2017年1月26日
	*/
	public function info_manage($id=1)
	{
		if( $_SESSION['uid'] == '' )
			redirect('user/login');
			
		$url = $this->api_url.'/api/detail?action=get_event_detail&id='.$id;
	
		$res = file_get_contents($url);
		// var_dump($url);
		// exit;
		$res = json_decode($res,true);
		$data = $res['data'];
		if( $data['uid'] != $_SESSION['uid'] )
		{
			redirect('main/');
		}
//print_r($data);exit;		
		$viewdata['data'] = $data;
				
//		$data['res'] = $this->Quguoren->get_join_users($id);
		$this->load->view('main/info_manage',$viewdata);
	}

	/*
	*	@发布活动
	*	@guoliang
	*	@2017年1月26日
	*/
	public function post()
	{
		if( $_SESSION['gr_type'] != 1 )
			redirect('main/');
		$this->load->view('main/post');
	}
	/*
	*	@发布活动
	*	@guoliang
	*	@2017年1月26日
	*/
	public function postinfo( $type = 0 )
	{
		if( $_SESSION['gr_type'] != 1 )
			redirect('main/');
					
		$data['form'] = array(
			'title'=>array('check'=>'required','input_name'=>"活动标题"),
			'city'=>array('check'=>'required','input_name'=>"活动城市"),
			'address'=>array('check'=>'required','input_name'=>"详细地址"),
			'image'=>array('check'=>'required','input_name'=>"活动海报"),
			'start_time'=>array('check'=>'required,time','input_name'=>"开始时间"),
			'end_time'=>array('check'=>'required,time','input_name'=>"结束时间"),
			'type' => array('check'=>'required','input_name'=>'活动类型'),
			//'demand_num'=>array('check'=>'required,number','input_name'=>"招募人数"),
			//'single_price'=>array('check'=>'required','input_name'=>"酬谢单价"),
			'details'=>array('check'=>'required','input_name'=>"活动描述"),
			);
		$data['postinfo'] = '';
//print_r($_POST);
		if($_POST){
			//查到所有的表单检测
			$postinfo = html_filter_array($_POST);
//print_r($_POST);
			$error = check_form($data['form'],$postinfo);
//		var_dump($error);exit;
			 $city = array('1'=>'全国','343'=>'天津市','321'=>'上海市','394'=>'重庆市','52'=>'北京市','2195'=>'海外','35'=>'台湾省','33'=>'香港特别行政区','34'=>'澳门特别行政区');
			if(empty($error))
			{
				$release['action'] = 'release_event';
				$release['title'] = $postinfo['title'];
				$release['category'] = $type;
				$release['city'] = $postinfo['city'];
				$release['address'] = $postinfo['address'];
				$release['image'] = $postinfo['image'];
				$release['start_time'] = strtotime($postinfo['start_time']);
				$release['end_time'] = strtotime($postinfo['end_time']);
				
				
				$release['details'] = $postinfo['details'];	
				$release['type'] =$postinfo['type'];
				$release['need_num'] = $postinfo['demand_num'];
				if( $postinfo['type'] == 1 )
				{					
					$release['single_price'] = $postinfo['single_price'];
				}
				$release['uid'] = $_SESSION['uid'];
				if(in_array($release['city'],array(1,343,321,394,52,2195,35,33,34))){
					$release['city'] = $city[$release['city']];
				}
//print_r($release);exit;				
				$url = $this->api_url.'/api/release';
				$res = $this->Common->_curl_init_post( $url, $release );
				$res = json_decode($res,true);
		
				if( $res['status'] == 1 )
				{				
					redirect('main/info_detail/'.$res['id']);
//					$_SESSION['pay_info_id'] = $res['id'];
//					$_SESSION['pay_pay_id'] = $res['pay_id'];
//					//支付保证金 
//					redirect('main/pay/');
					
				}
				else
				{							
					$data['data'] = $postinfo;
					echo "<script>alert('".$res['msg']."');</script>";			
				};
			}
			else
			{
				$data['error']=$error;
				$data['data'] = $postinfo;
			}

		}

		$this->load->view('main/postinfo',$data);
	}

	/**
	 * 已经加入的人员列表
	 * @return [type] [description]
	 */
	public function join_list($id=1)
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('main/post');
		//查询活动信息
		$url = $this->api_url.'/api/get_signup_list?action=get_info_list&id='.$id;
	
		$res = file_get_contents($url);
		$res = json_decode($res,true);
		$data = $res['data'];
		$viewdata['data'] = $data;		
		$viewdata['id'] = $id;
		$this->load->view('main/join_list',$viewdata);
	}

	/**
	 * 确认加入人员列表
	 * @return [type] [description]
	 */
	public function accept_list($id=1)
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('main/post');
		//查询活动信息
		$url = $this->api_url.'/api/get_accept_list?action=get_accept_list&id='.$id;
	
		$res = file_get_contents($url);
		$res = json_decode($res,true);
		$data = $res['data'];
		$viewdata['data'] = $data;		
		$viewdata['id'] = $id;
		$this->load->view('main/accept_list',$viewdata);
	}
	//确认保证金页面
	public function pay( )
	{
//print_r(111);exit;
		$id = $_SESSION['pay_info_id'];
		$pay_id = $_SESSION['pay_pay_id'];
	
		if( empty($id) )
			redirect('main/');
		//查询活动信息
		$url = $this->api_url.'/api/detail?action=get_event_detail&id='.$id;
	
		$res = file_get_contents($url);
		$res = json_decode($res,true);
		$data = $res['data'];
		
		//查询订单信息		
		$url = $this->api_url.'/api/get_pay_info?action=get_pay_info&id='.$pay_id.'&uid='.$_SESSION['uid'].'&info_id='.$id;	
//print_r($url);exit;		
		$result = file_get_contents($url);
		$result = json_decode($result,true);		
		$payinfo = $result['data'];
		log_message('error','PAY INFO:'.serialize($payinfo));
		
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);
		$res = json_decode($res,true);		
		$userinfo = $res['data'];
		
//		print_r($payinfo);exit;
//print_r($payinfo);exit;	
/*		//获取支付参数
		$url = $this->api_url.'/api/pay?action=get_pay_param&uid='.$_SESSION['uid'].'&info_id='.$id.'&id='.$pay_id;	
		$result = file_get_contents($url);
print_r($url);echo "<br/>";
var_dump($result);exit;		
		$params = json_decode($result,true);
		//$params = $params['data'];		

		$viewdata['jsApiParameters'] = $params;*/

			
			$path = dirname(dirname(__FILE__));
			
			include_once($path . "/libraries/wx_pay/lib/WxPay.Api.php");
			include_once($path . "/libraries/wx_pay/WxPay.JsApiPay.php");
	
			$tools = new JsApiPay();
			$openId = $userinfo['wx_openid'] ? $userinfo['wx_openid'] : $tools->GetOpenid();		
			
			//②、统一下单
			$input = new WxPayUnifiedOrder();
			$input->SetBody($this->config->item('site_name').'活动报名');
			//$input->SetAttach($userinfo['id']);
			$input->SetOut_trade_no($payinfo['out_trade_no']);
			$input->SetTotal_fee($payinfo['money'] * 100);
			//$input->SetTime_start(date("YmdHis"));
			//$input->SetTime_expire(date("YmdHis", time() + 600));
			//$input->SetGoods_tag($postdata['info_id']);
			//$notify_url = base_url() . 'api/pay_notify';
			//$input->SetNotify_url($notify_url);
			$input->SetTrade_type("JSAPI");
			$input->SetOpenid($openId);
	//print_r($input);exit;		
			$order = WxPayApi::unifiedOrder($input);	
log_message('error','SESSION INFO:'.serialize($_SESSION));
log_message('error','openid INFO:'.$openId);
log_message('error','INPUT PAY :'.serialize($input));
log_message('error','id:'.$id." pay_id:".$pay_id);			
log_message('error','GET PAY PARAM ORDER INFO:'.serialize($order));		
			$viewdata['jsApiParameters']  = $tools->GetJsApiParameters($order);
			
       // $viewdata['jsApiParameters'] = $tools->GetJsApiParameters($order);	
		
		$viewdata['id'] = $id;
		$viewdata['pay_id'] = $pay_id;
		$viewdata['payinfo'] = $payinfo;
		$viewdata['data'] = $data;
//print_r($viewdata);exit;		
		$this->load->view('main/confirm',$viewdata);			  
				
	}

	/*
	*	@支付活动保证金，发起支付
	*	@guoliang
	*	@2017年1月26日
	*/
	public function payment()
	{
		$this->load->view('main/payment');
	}



	/*
	*	@支付活动保证金，完成支付，支付通知
	*	@guoliang
	*	@2017年1月26日
	*/
	public function pay_notify()
	{
		$this->load->view('main/pay_notify');
	}

	/*
	*	@私信给主播
	*	@yinting
	*	@2017年2月20日
	*/
	public function message( $id = '')
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('main/student');
		
		if( empty($_SESSION['uid']) )
		{
			redirect('user/login');
		}
		//查询主播信息
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);
		$res = json_decode($res,true);
		$viewdata['zb'] = $res['data'];
		
		//查询当前用户与主播之前的消息
		$url = $this->api_url.'/api/get_my_message?action=get_my_message&id='.$_SESSION['uid']."&zhubo_id=".$id;
	
		$message = file_get_contents($url);
		$message = json_decode($message,true);		
		$viewdata['message'] = $message['data'];
		$viewdata['id'] = $id;

		$this->load->view('main/message',$viewdata);					
	}


	/*
	*	@查看主播的评价
	*	@yinting
	*	@2017年2月20日
	*/
	public function comment( $id = '')
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('main/student');
		
		//查询主播信息
		$url = $this->api_url.'/api/get_user_comment?action=get_user_comment&id='.$id;
//print_r($url);exit;		
		$res = file_get_contents($url);
		$res = json_decode($res,true);
		
		$viewdata = $res;
		$viewdata['id'] = $id;
//print_r($res);exit;
		$this->load->view('main/comment',$viewdata);					
	}


		/*
	*	@搜索
	*	@guoliang
	*	@2017年1月26日
	*/
	public function search()
	{

		$this->load->view('main/search');
	}

	public function test()
	{
		$_SESSION['pay_info_id'] = 36;
		$_SESSION['pay_pay_id'] = 1;
		echo 1;
	}










}
