<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Shanghai');
include_once(dirname(dirname(dirname(__FILE__))) . '/360safe/360webscan.php');
/**
 * 趣果仁用户
 *
 **/

class User extends Application
{
    public function __construct()
    {
        // Do something with $params
        parent::__construct();
		if( (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) && $this->uri->segment(2) != 'login' && $this->uri->segment(2) != 'register' && $this->uri->segment(2) != 'forget_pass' )
		{
			redirect('user/login');
//			$this->if_mobile = 'mobile';
		}
		
    }
	

	/*
	*	@注册
	*	@guoliang
	*	@2017年1月26日
	*/
	public function register()
	{
		//判断是否是微信浏览器，微信打开静默授权					
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) 
		{
			if( 1)
			{	
				//静默授权，查看用户是否已授权过
				$app_id = $this->wx_app_id;
				$secret = $this->wx_secret;
				$url = urlencode(base_url()."user/register/?".'invite_id='.$_GET['invite_id']);
		
				$state = rand(1000,9999);
				
				if( !$_GET['code'])
				{
					//获取Code
					//https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxf0e81c3bee622d60&redirect_uri=http%3A%2F%2Fnba.bluewebgame.com%2Foauth_response.php&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect 
					//header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$app_id.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_base&state='.$state.'#wechat_redirect');
					header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$app_id.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect');

				}
				else
				{	
					//获取access_token
					$data = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$app_id.'&secret='.$secret.'&code='.$_GET['code'].'&grant_type=authorization_code');
					$data = json_decode($data,TRUE); 					
					if( $data['openid'] )
					{					
						//查询用户是否存在
						$url = $this->api_url.'/api/get_user_info?action=get_user_info&wx_openid='.$data['openid'];
						$res = file_get_contents($url);
				log_message('error','REGISTER CHECK USER:'.$res);
						$res = json_decode($res,true);
						if($_SESSION['logout']<=0){
							if( $res['status'] == 1  )
							{							
								$_SESSION['uid'] = $res['data']['id'];
								$_SESSION['nickname'] = $res['data']['nickname'];							
								$_SESSION['icon'] = strstr($res['data']['icon'],'http') ? $res['data']['icon'] : $this->api_url.$res['data']['icon'];
								$_SESSION['wx_openid'] = $data['data']['openid'];
								$_SESSION['gr_type'] = $data['data']['gr_type'];
								redirect('user/index');
							}	
							else
							{
								//获取用户信息
								$user_wx = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$data['access_token'].'&openid='.$data['openid'].'&lang=zh_CN');	
							//log_message('error','LGOIN GET WEIXIN USERINFO:'.$user_wx);	
								log_message('error','REGISTER GET WEIXIN USERINFO:'.$user_wx);
								$userinfo_wx = json_decode($user_wx,true);
								
								if( $userinfo_wx )
								{
									$_SESSION['wx_openid'] = $userinfo_wx['openid'];
									$_SESSION['nickname'] = $userinfo_wx['nickname'];
									$_SESSION['sex'] = $userinfo_wx['sex'];
									$_SESSION['city'] = $userinfo_wx['city'];
									$_SESSION['icon'] = $userinfo_wx['headimgurl'];	
									$_SESSION['wx_openid'] = $data['openid'];													
									
								}		
								//redirect('user/register');					
							}
						}
					}
				}
			}							
		}	
		$data['form'] = array(
			'telephone'=>array('check'=>'required,telephone','input_name'=>"手机号码"),
			'code'=>array('check'=>'required','input_name'=>"验证码"),
			'password'=>array('check'=>'required,repeat','repeat'=>'repassword','input_name'=>"密码"),
			'repassword'=>array('check'=>'required','input_name'=>"重复密码"),
			);
		
		$data['postinfo'] = '';

		if($_POST)
		{		
			//查到所有的表单检测
			if( $_POST['gr_type'] == 1 )
			{
				$typeform = array(
					'birthday'=>array('check'=>'required','input_name'=>"出生日期"),
					'xueshengzheng'=>array('type'=>'file','check'=>'required','input_name'=>"上传学生证"),
					'country'=>array('check'=>'required','input_name'=>"国家"),
					'hsk_class'=>array(
						'type'=>'select',
						'check'=>'required',
						'select_arr'=>array(1=>'4级以及4级以下',2=>'5级',3=>'6级以及6级以下')
						,'input_name'=>"汉语等级"),
					
				);												
			}
			else
			{
				$typeform = array(
					'icon' => array('check'=>'require','input_name' => '上传头像'),
					'realname' => array('check'=>'require','input_name'=>'联系人名称'),
					'company_name' => array('check'=>'require','input_name'=>'公司名称'),
					'city' => array('check'=>'require','input_name'=>'城市'),
					'company_need' => array('check' => 'require','input_name'=>'需求描述'),
					);				
			}
			$data = array_merge($data,$typeform);
			$postinfo = html_filter_array($_POST);

			$error = check_form($data['form'],$postinfo);
				
			if(empty($error))
			{
				//上传图片			
				if( $postinfo['gr_type'] == 1 )
				{
					$xueshengzheng = $this->Common->do_upload('xueshengzheng');
//print_r($xueshengzheng);exit;					
					if( !is_array($xueshengzheng) )
						$postinfo['xueshengzheng'] = strstr(base_url(),$this->api_url) ? $xueshengzheng : base_url().$xueshengzheng;
					if( $_SESSION['city'] )
						$postinfo['city'] = $_SESSION['city'];																
				}
				else
				{
					$icon = $this->Common->do_upload('icon');
					if( !is_array($icon) )
						$postinfo['icon'] = strstr(base_url(),$this->api_url) ? $icon : base_url().$icon;					
				}
				
				if( $_SESSION['sex'] )
					$postinfo['sex'] = $_SESSION['sex'];	
				if( $_SESSION['nickname'] )
					$postinfo['nickname'] = $_SESSION['nickname'];
				if( $_SESSION['icon'] )
					$postinfo['icon'] = $_SESSION['icon'];	
				if( $_SESSION['wx_openid'] && $_SESSION['nickname'])
					$postinfo['wx_openid'] = $_SESSION['wx_openid'];	
																		
			
				
				$postinfo['action'] = 'register';
				$url = $this->api_url.'/api/register';
				$res = $this->Common->_curl_init_post( $url, $postinfo );
				$res = json_decode($res,true);
		
				if( $res['status'] == 1 )
				{
					$_SESSION['uid'] = $res['data']['uid'];
					$_SESSION['nickname'] = $res['data']['nickname'];
					$_SESSION['gr_type'] = $res['data']['gr_type'];
					redirect('user/index');
				}
				else
				{							
					$data['data'] = $postinfo;
					echo "<script>alert('".$res['msg']."');</script>";			
				}				
				
				
			}
			else
			{				
				$data['error']=$error;
				$data['data'] = $postinfo;
				echo "<script>alert('".$error."');</script>";	
			}

		}
		$data['invite_id'] = $_GET['invite_id'];
		$this->load->view('user/register',$data);
	}
	/*
	*	@忘记密码
	*	@guoliang
	*	@2017年1月26日
	*/
	public function forget_pass()
	{

		$this->load->view('user/forget_pass');
	}


	/*
	*	@登陆
	*	@guoliang
	*	@2017年1月26日
	*/
	public function login()
	{
		//判断是否是微信浏览器，微信打开静默授权					
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) 
		{

			if( !isset($_SESSION['wx_openid']) || empty($_SESSION['wx_openid']) )
			{	
				//静默授权，查看用户是否已授权过
				$app_id = $this->wx_app_id;
				$secret = $this->wx_secret;
				$url = urlencode(base_url()."user/login/");
		
				$state = rand(1000,9999);
				
				if( !$_GET['code'])
				{
					//获取Code
					//header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$app_id.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_base&state='.$state.'#wechat_redirect');
					header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$app_id.'&redirect_uri='.$url.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect');
				}
				else
				{
					//获取access_token
					$data = file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$app_id.'&secret='.$secret.'&code='.$_GET['code'].'&grant_type=authorization_code');
					$data = json_decode($data,TRUE); 
					//$_SESSION['wx_openid'] = $data['openid'];	
					
					if( $data['openid'] )
					{				
						//$user_wx = file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token='.$data['access_token'].'&openid='.$data['openid'].'&lang=zh_CN');	
						//log_message('error','LGOIN GET WEIXIN USERINFO:'.$user_wx);
						
						//查询用户是否存在
						$url = $this->api_url.'/api/get_user_info?action=get_user_info&wx_openid='.$data['openid'];
						$res = file_get_contents($url);
				log_message('error','GET USER INFO:'.$res);
						$res = json_decode($res,true);
						
						if( $res['status'] == 1 )
						{							
							$user = $res['data'];
							$_SESSION['uid'] = $user['id'];
							$_SESSION['nickname'] = $user['nickname'];							
							$_SESSION['icon'] = strstr($user['icon'],'http') ? $user['icon'] : $this->api_url.$user['icon'];
							$_SESSION['wx_openid'] = $user['wx_openid'];
							$_SESSION['gr_type'] = $user['gr_type'];
							$_SESSION['logout']=0;
							redirect('user/index');
						}	
						else
						{							
							redirect('user/register');					
						}
					}
				}
			}							
		}
		if( $_POST )
		{
			$postdata = html_filter_array( $_POST );
		
			$curl_data['action'] = 'login';
			$curl_data['telephone'] = $postdata['telephone'];
			$curl_data['password'] = $postdata['password'];
			if( $_SESSION['wx_openid'] && $_SESSION['nickname'])
			{
				$curl_data['wx_openid'] = $_SESSION['wx_openid'];
			}
			$url = $this->api_url.'/api/login';
			$res = $this->Common->_curl_init_post( $url, $curl_data );
		
			$res = json_decode($res,true);
		
			if( $res['status'] == 1 )
			{
				$_SESSION['uid'] = $res['uid'];
				$_SESSION['nickname'] = $res['nickname'];
				$_SESSION['wx_openid'] = $res['wx_openid'];
				$_SESSION['gr_type'] = $res['gr_type'];
				$_SESSION['icon'] = strstr($res['icon'],'http') ? $res['icon'] : $this->api_url.$res['icon'];
				$_SESSION['logout']=0;
				redirect('user/index');
			}
			else
			{
				$msg = $res['msg'];
				
				echo "<script>alert('".$msg."');</script>";			
			}
				
		}

		$this->load->view('user/login');
	}

	/*
	*	@邀请
	*	@guoliang
	*	@2017年1月26日
	*/
	public function invite()
	{
		$this->load->view('user/invite');
	}


	/*
	*	@index首页
	*	@guoliang
	*	@2017年1月26日
	*/
	public function index()
	{
		$uid = $_SESSION['uid'];
//print_r($_SESSION);exit;
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		$res = json_decode($res,true);
		
		
		if( $res['data']['gr_type'] == 2 )
		{
			$url =  $this->api_url.'/api/get_myjoin_count?action=get_my_joincount&id='.$_SESSION['uid'];
			$result = file_get_contents($url);	
			$result = json_decode($result,true);			
			$data = $result;
		}
		
		$data['res'] = $res['data'];
		$this->load->view('user/index',$data);
	}
	


	/*
	*	@相册
	*	@guoliang
	*	@2017年1月26日
	*/
	public function photo()
	{
		$uid = $_SESSION['uid'];
		$data['res'] = $this->Quguoren->get_all_photo(array("uid"=>$uid,'orderby'=>'ctime'));
		$this->load->view('user/photo');
	}

	/*
	*	@编辑个人信息
	*	@guoliang
	*	@2017年1月26日
	*/
	public function edit()
	{		
		$uid = $_SESSION['uid'];
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		
		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];	
//print_r($res['data']);exit;			
		//$data['res'] = $this->Quguoren->get_user($uid);
		if( $res['data']['gr_type'] == 1 )
			$this->load->view('user/edit',$data);	
		else
			$this->load->view('user/edit2',$data);
	}


	/*
	*	@我收到的评价
	*	@guoliang
	*	@2017年1月26日
	*/
	public function comment()
	{
		$uid = $_SESSION['uid'];
		$data['res'] = $this->Quguoren->get_user_comments($uid);
		$this->load->view('user/comment',$data);
	}

	/*
	*	@我收到的留言列表
	*	@guoliang
	*	@2017年1月26日
	*/
	public function message()
	{
		//my_favor
		$url = $this->api_url.'/api/my_message?action=get_my_message&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		
		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];
		$this->load->view('user/message',$data);
	}

	/*
	*	@我收到的留言
	*	@guoliang
	*	@2017年1月26日
	*/
	public function message_info($uid='')
	{
		$url = $this->api_url.'/api/get_message?action=get_message&to_uid='.$uid."&uid=".$_SESSION['uid'];
		
		$res = file_get_contents($url);

		$res = json_decode($res,true);
			
	
		$data['data'] = $res['data'];	

		$this->load->view('user/message_info',$data);
	}
	
	public function delete_msg()
	{
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			if( $post['id'] )
			{
				$url = $this->api_url.'/api/my_message?action=get_my_message&id='.$post['uid'];
				$res = file_get_contents($url);
		
				echo $res;exit;
			}
			else
			{
				echo json_encode(array('status'=>0,'msg'=>'empty id'));
				exit;
			}
		}
		else
		{
			echo json_encode(array('status'=>0,'msg'=>'empty post'));
			exit;			
		}
	}
	/*
	*	@收藏
	*	@guoliang
	*	@2017年1月26日
	*/
	public function favor()
	{		
		//my_favor
		$url = $this->api_url.'/api/my_favor?action=get_my_favor&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

//print_r($url);exit;	
		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];
		//$data['res'] = $this->Quguoren->get_user_favor($uid);
		$this->load->view('user/favor',$data);
	}

	/*
	*	@关注
	*	@guoliang
	*	@2017年1月26日
	*/
	public function follow()
	{
		$url = $this->api_url.'/api/my_follow?action=get_my_follow&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];	
		$this->load->view('user/guanzhu',$data);
	}
	
	/*
	*	@我参与的活动
	*	@guoliang
	*	@2017年1月26日
	*/
	public function joininfo( $type = 0 )
	{
		$type = (int)$type;
		$url = $this->api_url.'/api/my_join?action=get_my_join'.'&id='.$_SESSION['uid'].'&type='.$type;

		$res = file_get_contents($url);
	
		$res = json_decode($res,true);

		$data['data'] = $res['data'];	
		$data['type'] = $type;
		
		//$data['res'] = $this->Quguoren->get_user_joininfo($uid);
		$this->load->view('user/joininfo',$data);
	}

	/*
	* 我发布的活动
	* yinting
	* 2017年2月21日
	*/
	public function mypost( $type = 0 )
	{
		$type = (int)$type;
		$url = $this->api_url.'/api/my_event?action=get_my_event&uid='.$_SESSION['uid'].'&status='.$type;
		//print_r($url);exit;
		
		$res = file_get_contents($url);

		
		$res = json_decode($res,true);

		$data['res'] = $res['data'];	
		$data['type'] = $type;
		
		//$data['res'] = $this->Quguoren->get_user_joininfo($uid);
		$this->load->view('user/myinfo',$data);		
	}


	/*
	*	@标签
	*	@guoliang
	*	@2017年1月26日
	*/
	public function tags()
	{
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		
		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];
		$this->load->view('user/tags',$data);
	}

	/*
	*	@积分
	*	@guoliang
	*	@2017年1月26日
	*/
	public function jifen()
	{
		$this->load->view('user/jifen');
	}
	
	//账号手机号
	public function mobile()
	{
		$url = $this->api_url.'/api/userinfo?action=get_userinfo&id='.$_SESSION['uid'];
		$res = file_get_contents($url);

		$res = json_decode($res,true);
		

		$data['res'] = $res['data'];
		
		$this->load->view('user/mobile',$data);		
	}
	
	public function logout()
	{
		unset($_SESSION['uid']);
		unset($_SESSION['nickname']);
		unset($_SESSION['icon']);
		$_SESSION['logout']=time();
		redirect('main');
	}

	
















}
