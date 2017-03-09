<?php
/*
*
* 作者：杨国良
*
* 创建日期：2015年10月4日10:45:12
*
* 目的：超类，公共方法
*
* TODO：集成一些常用方法
*
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application extends CI_Controller {

	public $per_page = '15'; 
	public $if_mobile = 'main';
		
    public $admin_user_table = 'bc_admin_users';
    public $email_list_table = 'bc_email_list';
    public $bc_banip_table = 'bc_admin_banip';
    public $msg_list_table = 'bc_msg_list';
    public $admin_access_table = 'bc_admin_access';
	public $admin_log_table = 'bc_admin_log';
	
	public $user_table = 'gr_users';
	public $event_table = 'gr_postinfo';
	public $join_table = 'gr_joininfo';
	public $message_table = 'gr_message';
	public $photo_table = 'gr_user_photo';
	public $comment_table = 'gr_comments';
	public $sms_table = 'gr_sms_code';
	public $favor_table = 'gr_favor';
	public $integral_table = 'gr_jifen';
	public $follow_table = 'gr_guanzhu';
	public $support_table = 'gr_support';
	public $api_url = '';

	/**
	 | 短信网关
	 */
	public $alidayu_app_id = '23641534';// 短信网关阿里大于appid
	
	public $alidayu_app_secrect = '8fef13ec84e4d3727f8485e88b0b102b';// 阿里大于app secrect(阿里大于 管理中心-短信模板管理 获取)

	public $alidayu_sms_code = 'SMS_47855078';// 阿里大于短信模版id
	public $alidayu_sms_sign = '趣果仁';// 阿里大于短信sign
	
	public $wx_app_id = 'wxccd7a467a9566196';
	public $wx_secret = '3fac447cd3def503663cef54eb02959d';
	public $wx_mch_id = '';
	public $wx_key = '';

    public function __construct() {
        parent::__construct();
        $this->per_page = $this->config->item('per_page');
        $this->load->helper(array('url','baseci'));
        $this->load->model(array("Common","Quguoren"));
		$this->api_url = base_url();
		$this->api_url = substr($this->api_url,0,strlen($this->api_url)-1);
		
        //$this->output->enable_profiler(TRUE);
        //$this->lang->load('error');
		if( strstr(base_url(),'local') )
		{
			$this->img_url = base_url();
		}
       
    }

}
