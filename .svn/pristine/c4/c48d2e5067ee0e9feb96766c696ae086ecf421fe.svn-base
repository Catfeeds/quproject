<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone', 'Asia/Shanghai');
include_once(dirname(dirname(dirname(__FILE__))) . '/360safe/360webscan.php');
/**
 * 趣果仁管理后台
 *
 **/

class Grad extends Application
{
    public function __construct()
    {
        // Do something with $params
        parent::__construct();

        if (!strstr($_SERVER['REQUEST_URI'], "/cead/login")) {
            if (!$_SESSION['admin_id']) {
                redirect('cead/login');
                exit;
            } elseif ($now_url != 'cead/login' && $now_url != 'cead/index') {
                check_admin_access($_SESSION['admin_id']);
            }
        }
    }
	

	/*
	*	@审核发布信息、翻译
	*	@guoliang
	*	@2017年1月26日
	*/
	public function check_info( $start = 0 )
	{
		if( $_GET['clear'] == 1 )
		{
			unset($_SESSION['event']);
		}
		$where = array(1=>1);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			if( $post['title'] )
				$_SESSION['event']['title'] = $search['title'] = $like['title'] = $post['title'];
			if( $post['city'] )
				$_SESSION['event']['city'] = $search['city'] = $like['city'] = $post['city'];
			if( $post['need_num'] )
				$_SESSION['event']['need_num'] = $search['need_num'] = $where['need_num'] = $post['need_num'];			
		}
		elseif( $_SESSION['event'] )
		{
			if( $_SESSION['event']['title'] )
				$search['title'] = $like['title'] = $_SESSION['event']['title'];
			if( $_SESSION['event']['city'] )
				$search['city'] = $like['city'] = $_SESSION['event']['city'];
			if( $_SESSION['event']['need_num'] )
				$search['need_num'] = $where['need_num'] = $_SESSION['event']['need_num'];										
		}
		$total = $this->Common->get_count( $this->event_table, $where, $like );
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 3,
            'base_url' => site_url('grad/check_info/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$data['pagination'] = $pagination; 		
		$data['res'] = $this->Common->get_limit_order( $this->event_table, $where, $start,$this->per_page,'ctime','DESC',$like);
		$data['search'] = $search;
/*		$list_arr = array(
		 	'orderby'=>'ctime',
     		'city'=>'all',
     		'status'=>'all',
     		'category'=>'all'
			);
		$data['res'] = $this->Quguoren->get_all_info($list_arr);*/
		$this->load->view('grad/check_info',$data);
	}

	/*
	*	@审核活动
	*	@yinting
	*	@2017年2月9日
	*/		
	public function examine_info( $id )
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('grad/check_info');
		
		$where = array('id'=>$id);
		//Step 1 : 查询活动状态
		$data = $this->Common->get_one( $this->event_table, $where );
		if( $data['status'] == 0 )
		{
			$update['status'] = 1;
			
			//Step 2 : 更新审核状态为募集中
			$res = $this->Common->update( $this->event_table, $where, $update );
			if( $res )
			{
				echo "<script>if(confirm('审核操作成功'))location.href='grad/check_info';</script>";
				exit;
			}
			else
			{
				echo "<script>if(confirm('审核操作失败，请重试'))location.href='grad/check_info/';</script>";
				exit;
			}
		}
		else
		{
			redirect('grad/check_info');
		}
	}	

	/*
	*	@查看活动报名人员
	*	@yinting
	*	@2017年2月9日
	*/	
	public function user_info( $id,$start=0 )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_info');
		}
		//查询活动信息
		$event = $this->Common->get_one( $this->event_table,array('id'=>$id));
		if( empty($event) )
		{
			redirect('grad/check_info');
		}
		//Step 1 : 查询活动报名人员
		$sql = "SELECT e.*,u.nickname,u.icon,u.telephone FROM ".$this->join_table." as e,".$this->user_table." as u WHERE e.info_id=".$id." AND e.uid=u.id ORDER BY ctime DESC LIMIT ".$start.','.$this->per_page;
		$data = $this->Common->get_sql( $sql );
/*		$where = array(
			'info_id' => $id,
			);
		$data = $this->Common->get_limit_order( $this->join_table,$where, $start, $this->per_page,'ctime','DESC');*/
	
		$total = $this->Common->get_count( $this->join_table, $where);
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 4,
            'base_url' => site_url('grad/event_user/'.$id.'/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$viewdata['pagination'] = $pagination; 				
		$viewdata['data'] = $data;
		$viewdata['event'] = $event;		
		$this->load->view('grad/user_info',$viewdata);
	}
	
	/*
	*	@编辑&翻译活动
	*	@yinting
	*	@2017年2月9日
	*/	
	public function edit_info( $id )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_info');
		}
		
		//查询活动信息
		$where = array('id' => $id);
		$data = $this->Common->get_one( $this->event_table,$where);
		
		if( empty($data) )
		{
			redirect('grad/check_info');
		}
		$viewdata['data'] = $data;
		if( $_POST )
		{
			$post = html_filter_array( $_POST );
			$post['start_time'] = strtotime($post['start_time']);
			$post['end_time'] = strtotime($post['end_time']);
			$res = $this->Common->update( $this->event_table, $where, $post );
			if( $res )
			{
				$_SESSION['msg'] = '编辑活动《'.$post['title']."》成功";
				redirect('grad/check_info');
			}
			else
			{
				$_SESSION['msg'] = '编辑活动《'.$post['title']."》失败，请重试";
				$viewdata['data'] = $post;
				$viewdata['id'] = $id;
			}
		}
				
		$this->load->view('grad/edit_info',$viewdata);
	}	

	/*
	*	@审核发布信息、翻译
	*	@guoliang
	*	@2017年1月26日
	*/
	public function check_users( $type = 1,$start = 0 )
	{
		if( $_GET['clear'] == 1 )
		{
			unset($_SESSION['search_user']);
		}
		$list_arr = array(
		 	'dazhou'=>'all',
     		'hsk_class'=>'all',
     		'city'=>'all',
     		'orderby'=>'ctime'
			);
		$where = array('gr_type'=>$type);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			if( $post['nickname'] )
				$_SESSION['search_user']['nickname'] = $search['nickname'] = $like['nickname'] = $post['nickname'];
			if( $post['dazhou'] )
				$_SESSION['search_user']['dazhou'] = $search['dazhou'] = $where['dazhou'] = $post['dazhou'];
			if( $post['country'] )
				$_SESSION['search_user']['country'] = $search['country'] = $like['country'] = $post['country'];
			if( $post['telephone'] )
				$_SESSION['search_user']['telephone'] = $search['telephone'] = $like['telephone'] = $post['telephone'];		
			if( $post['company_name'] )
				$_SESSION['search_user']['company_name'] = $search['company_name'] = $like['company_name'] = $post['company_name'];
			if( $post['company_need'] )
				$_SESSION['search_user']['company_need'] = $search['company_need'] = $like['company_need'] = $post['company_need'];	
		}
		elseif( $_SESSION['search_user'] )
		{
			if( $_SESSION['search_user']['nickname'] )
				$search['nickname'] = $like['nickname'] = $_SESSION['search_user']['nickname'];
			if( $_SESSION['search_user']['dazhou'] )
				$search['dazhou'] = $where['dazhou'] = $_SESSION['search_user']['dazhou'];
			if( $_SESSION['search_user']['country'] )
				$search['country'] = $like['country'] = $_SESSION['search_user']['country'];
			if( $_SESSION['search_user']['telephone'] )
				$search['telephone'] = $like['telephone'] = $_SESSION['search_user']['telephone'];	
			if( $_SESSION['search_user']['company_name'] )
				$search['company_name'] = $like['company_name'] = $_SESSION['search_user']['company_name'];					
			if( $_SESSION['search_user']['company_need'] )
				$search['company_need'] = $like['company_need'] = $_SESSION['search_user']['company_need'];							
		}
		$total = $this->Common->get_count( $this->user_table, $where, $like );
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 4,
            'base_url' => site_url('grad/check_users/'.$type.'/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$data['pagination'] = $pagination; 		
		$data['res'] = $this->Common->get_limit_order( $this->user_table, $where, $start,$this->per_page,'ctime','DESC',$like);
		$data['search'] = $search;
		$data['type'] = $type;
		//$data['res'] = $this->Quguoren->get_all_zhubo($list_arr);
		$this->load->view('grad/check_users',$data);
	}
	
	/*
	*	@查看主播详情
	*	@yinting
	*	@2017年2月9日
	*/
	public function show_user( $type=1, $id='' )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_users/'.$type);
		}
		//Step 1 :设定查询条件 查询主播信息
		$where = array('id' => $id);
		$data = $this->Common->get_one( $this->user_table, $where );
		if( empty($data) )
		{
			redirect('grad/check_users/'.$type);
		}
		//Step 2 : 加载页面
		$viewdata['data'] = $data;
		$viewdata['id'] = $id;
		$viewdata['type'] = $type;
		$this->load->view('grad/show_user',$viewdata);		
	}
	
	/*
	*	@添加老师
	*	@yinting
	*	@2017年2月17日
	*/
	public function add_user( $type =3 )
	{
		$type = (int)$type;		
		if($type!=3)
			redirect('grad/check_users/'.$type.'?clear=1');
	
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$post['gr_type'] = $type;
			$post['password'] = password_hash($post['password'],1);
			
			//$post['if_show_expirence'] = (int)$post['if_show_expirence'];
			$res = $this->Common->add( $this->user_table, $post );		
			if( $res )
			{
				redirect('grad/check_users/'.$type);
			}
			else
			{
				$viewdata['data'] = $post;
				$viewdata['error'] = '保存失败，请重试';
			}
		}
		//Step 3 : 加载页面		
		$viewdata['type'] = $type;
		$this->load->view('grad/edit_user',$viewdata);			
		
	}
	
	/*
	*	@删除老师
	*	@yinting
	*	@2017年2月17日
	*/
	public function delete_user( $type =3 , $id)
	{
		$type = (int)$type;	
		if($type!=3)
			redirect('grad/check_users/'.$type.'?clear=1');
		$where = array('id' => $id);
		$res = $this->Common->delete( $this->user_table, $where );	
		if( $res )
		{
			$_SESSION['msg'] = '删除成功';
		}
		else
		{
			$_SESSION['msg'] = '删除失败，请重试';
		}
		redirect('grad/check_users/'.$type);
		
		
	}	
	
	/*
	*	@编辑主播
	*	@yinting
	*	@2017年2月9日
	*/
	public function edit_user( $type=1, $id='' )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_users/'.$type);
		}
		//Step 1 :设定查询条件 查询主播信息
		$where = array('id' => $id);
		$data = $this->Common->get_one( $this->user_table, $where );
		if( empty($data) )
		{
			redirect('grad/check_users/'.$type);
		}
		$viewdata['data'] = $data;
		//Step 2 : 判断post修改
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			//$post['if_show_expirence'] = (int)$post['if_show_expirence'];
			if( $post['password'] && $type == 3 )
			{
				if( $post['if_update_password'] == 1 )
					$post['password'] = password_hash($post['password'],1);
				unset($post['if_update_password']);
			}
			$res = $this->Common->update( $this->user_table, $where,$post );		
			if( $res )
			{
				redirect('grad/check_users/'.$type);
			}
			else
			{
				$viewdata['data'] = $post;
				$viewdata['error'] = '保存失败，请重试';
			}
		}
		//Step 3 : 加载页面		
		$viewdata['id'] = $id;
		$viewdata['type'] = $type;
		$this->load->view('grad/edit_user',$viewdata);		
	}
	
	/*
	*	@审核主播或发布者
	*	@yinting
	*	@2017年2月9日
	*/	
	public function examine_user( $type=1,$id='' )
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('grad/check_users/'.$type);
		//Step 1 : 查询此用户的审核状态
		$where = array(
			'gr_type' => $type,
			'id' => $id,
			);
		$data = $this->Common->get_one( $this->user_table, $where );
		if( $data['if_check'] == 0 )
		{
			$update['if_check'] = 1;
		}
		else
		{
			$update['if_check'] = 0;
		}
		
		//Step 2 : 更新审核状态
		$res = $this->Common->update( $this->user_table, $where, $update );
		if( $res )
		{
			echo "<script>if(confirm('审核操作成功'))location.href='grad/check_users/".$type."';</script>";
			exit;
		}
		else
		{
			echo "<script>if(confirm('审核操作失败，请重试'))location.href='grad/check_users/".$type."';</script>";
			exit;
		}
	}
	


	/*
	*	@审核留言和互通消息
	*	@guoliang
	*	@2017年1月26日
	*/
	public function check_msg( $start=0 )
	{
		if( $_GET['clear'] == 1 )
		{
			unset($_SESSION['search_msg']);
		}

		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$sql = "SELECT count(*) as count FROM ".$this->message_table." WHERE 1=1 ";
			if( $post['content'] )
			{
				$_SESSION['search_msg']['content'] = $search['content'] = $post['content'];
				$sql .= " content like '%".$post['content']."%'";
			}
			if( $post['uname'] )
			{
				$uids = get_uid_by_username($post['uname']);
				$uids = implode(',',$uids);
				$_SESSION['search_msg']['username'] = $search['uname'] = $post['uname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			if( $post['touser'] )
			{
				$uids = get_uid_by_username($post['touser']);
				$uids = implode(',',$uids);
				if( $uids )
					$sql .= " AND to_uid IN(".$uids.")";				
				$_SESSION['search_msg']['touser'] = $search['touser'] = $post['touser'];
			}
			
			$total = $this->Common->get_sql( $sql );
		
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );
		}
		elseif( $_SESSION['search_msg'] )
		{
			$sql = "SELECT count(*) as count FROM ".$this->message_table." WHERE 1=1 ";
			if( $_SESSION['search_msg']['content'] )
			{
				$search['content'] = $_SESSION['search_msg']['content'];
				$sql .= " content like '%".$searc['content']."%'";
			}
			if( $_SESSION['search_msg']['uname'] )
			{
				$uids = get_uid_by_username($_SESSION['search_msg']['uname']);
				$uids = implode(',',$uids);
				$search['uname'] = $_SESSION['search_msg']['uname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			if( $_SESSION['search_msg']['touser'] )
			{
				$uids = get_uid_by_username($_SESSION['search_msg']['touser']);
				$uids = implode(',',$uids);
				if( $uids )
					$sql .= " AND to_uid IN(".$uids.")";				
				$search['touser'] = $_SESSION['search_msg']['touser'];
			}				
			$total = $this->Common->get_sql( $sql );
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );					
		}
		else
		{
			$where = array(1=>1);
			$data = $this->Common->get_limit_order( $this->message_table, $where,$start,$this->per_page,'ctime','DESC');
			$total = $this->Common->get_count( $this->message_table, $where );
		}
		$total = $total[0]['count'] ? $total[0]['count'] : $total;
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 3,
            'base_url' => site_url('grad/check_msg/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$viewdata['pagination'] = $pagination; 		
		$viewdata['data'] = $data;
		$viewdata['search'] = $search;
		$viewdata['total'] = $total;		
		
		$this->load->view('grad/check_msg',$viewdata);
	}
	
	/*
	*	@审核消息
	*	@yinting
	*	@2017年2月10日
	*/		
	public function examine_msg( $id )
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('grad/check_msg');
		
		$where = array('id'=>$id);
		//Step 1 : 查询活动状态
		$data = $this->Common->get_one( $this->message_table, $where );
		if( $data['if_check'] == 0 )
		{
			$update['if_check'] = 1;
		}
		else
		{
			$update['if_check'] = 0;
		}
		
		//Step 2 : 更新审核状态
		$res = $this->Common->update( $this->message_table, $where, $update );
		if( $res )
		{
			echo "<script>if(confirm('审核操作成功'))location.href='grad/check_msg';</script>";
			exit;
		}
		else
		{
			echo "<script>if(confirm('审核操作失败，请重试'))location.href='grad/check_msg';</script>";
			exit;
		}
	}	

	/*
	*	@查看消息信息
	*	@yinting
	*	@2017年2月10日
	*/	
	public function show_msg( $id )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_msg');
		}
		//Step 1 : 查询消息
		$where = array('id' => $id);
		$data = $this->Common->get_one( $this->message_table, $where );
	
		$viewdata['data'] = $data;
		$viewdata['id'] = $id;	
		$this->load->view('grad/show_msg',$viewdata);
	}
	
	/*
	*	@编辑消息
	*	@yinting
	*	@2017年2月10日
	*/	
	public function edit_msg( $id )
	{
		$id = (int)$id;
		if( empty($id) )
		{
			redirect('grad/check_msg');
		}
		
		//查询活动信息
		$where = array('id' => $id);
		$data = $this->Common->get_one( $this->message_table,$where);
		
		if( empty($data) )
		{
			redirect('grad/check_msg');
		}
		$viewdata['data'] = $data;
		if( $_POST )
		{
			$post = html_filter_array( $_POST );
			
			$res = $this->Common->update( $this->message_table, $where, $post );
			if( $res )
			{
				$_SESSION['msg'] = "编辑消息成功";
				redirect('grad/check_msg');
			}
			else
			{
				$_SESSION['msg'] = "编辑消息失败，请重试";
				$viewdata['data'] = $post;
				$viewdata['id'] = $id;
			}
		}
				
		$this->load->view('grad/edit_msg',$viewdata);
	}	
	


	/*
	*	@审核所有的照片
	*	@guoliang
	*	@2017年2月7日
	*/
	public function check_photo( $start = 0 )
	{
		if( $_GET['clear'] == 1 )
		{
			unset($_SESSION['search_photo']);
		}
		$where = array('if_show'=>1);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$sql = "SELECT count(*) as count FROM ".$this->photo_table." WHERE if_show=1 ";

			if( $post['puname'] )
			{
				$uids = get_uid_by_username($post['puname']);
				$uids = implode(',',$uids);
				$_SESSION['search_photo']['puname'] = $search['puname'] = $post['puname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			
			$total = $this->Common->get_sql( $sql );
		
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );
		}
		elseif( $_SESSION['search_photo'] )
		{
			$sql = "SELECT count(*) as count FROM ".$this->photo_table." WHERE if_show=1 ";

			if( $_SESSION['search_photo']['puname'] )
			{
				$uids = get_uid_by_username($_SESSION['search_photo']['puname']);
				$uids = implode(',',$uids);
				$search['puname'] = $_SESSION['search_photo']['puname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			
			$total = $this->Common->get_sql( $sql );
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );					
		}
		else
		{
			$where = array('if_show'=>1);
			$data = $this->Common->get_limit_order( $this->photo_table, $where,$start,$this->per_page,'ctime','DESC');		
			$total = $this->Common->get_count( $this->photo_table, $where );
		}
		
		$total = $total[0]['count'] ? $total[0]['count'] : $total;
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 3,
            'base_url' => site_url('grad/check_photo/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$viewdata['pagination'] = $pagination; 		
		$viewdata['data'] = $data;		
		$viewdata['search'] = $search;		
/*		$list_arr = array(
		 	'dazhou'=>'all',
     		'hsk_class'=>'all',
     		'city'=>'all',
     		'orderby'=>'ctime'
			);
		$data['res'] = $this->Quguoren->get_all_photo($list_arr);*/
		$this->load->view('grad/check_photo',$viewdata);
	}
	
	/*
	*	@编辑用户相册照片
	*	@yinting
	*	@2017年2月10日
	*/	
	public function edit_photo( $id )
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('grad/check_photo');
		$where = array(
			'id' => $id,
			'if_show' => 1,
			);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$res = $this->Common->update( $this->photo_table, $where, $post );
			if( $res )
			{
				$_SESSION['msg'] = '编辑图片成功';
				redirect('grad/check_photo');
			}
			else
			{
				$_SESSION['msg'] = '编辑图片失败，请重试';
				$viewdata['data'] = $post;
			}
		}
		else
		{
			$data = $this->Common->get_one( $this->photo_table, $where );
		}
		$viewdata['data'] = $data;
		$viewdata['id'] = $id;
		
		$this->load->view('grad/edit_photo',$viewdata);
	}
	
	/*
	*	@隐藏用户相册照片
	*	@yinting
	*	@2017年2月10日
	*/		
	public function delete_photo( $id )
	{
		if( empty($id) )
			redirect('grad/check_photo');
		$where = array(
			'id' => $id,
			);
		$res = $this->Common->update( $this->photo_table, $where, array('if_show'=>0));
		if( $res )
			$_SESSION['msg'] = '删除图片成功';
		else
			$_SESSION['msg'] = '删除图片失败，请重试';
		redirect('grad/check_photo');
	}

	/*
	*	@审核所有的评价
	*	@yinting
	*	@2017年2月10日
	*/
	public function check_comment( $start = 0 )
	{
		if( $_GET['clear'] == 1 )
		{
			unset($_SESSION['search_comment']);
		}
		$where = array('1'=>1);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$sql = "SELECT count(*) as count FROM ".$this->comment_table." WHERE 1=1";

/*			if( $post['cuname'] )
			{
				$uids = get_uid_by_username($post['cuname']);
				$uids = implode(',',$uids);
				$_SESSION['search_comment']['cuname'] = $search['cuname'] = $post['cuname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			if( $post['zbname'] )
			{
				$uids = get_uid_by_username($post['zbname']);
				$uids = implode(',',$uids);
				$_SESSION['search_comment']['zbname'] = $search['zbname'] = $post['zbname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}*/
			if( $post['content'] )
			{
				$sql .= " AND content like '%".$post['content']."'%";
				$_SESSION['search_comment']['content'] = $search['content'] = $post['content'];
			}						
			if( $post['star_num'] )
			{
				$sql .= " AND star_num =".$post['star_num'];
				$_SESSION['search_comment']['star_num'] = $search['star_num'] = $post['star_num'];
			}
			
			$total = $this->Common->get_sql( $sql );
		
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );
		}
		elseif( $_SESSION['search_comment'] )
		{
			$sql = "SELECT count(*) as count FROM ".$this->comment_table." WHERE if_show=1 ";
/*
			if( $_SESSION['search_comment']['cuname'] )
			{
				$uids = get_uid_by_username($_SESSION['search_comment']['cuname']);
				$uids = implode(',',$uids);
				$search['cuname'] = $_SESSION['search_comment']['cuname'];
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}
			if( $_SESSION['search_comment']['zbname'] )
			{
				$uids = get_uid_by_username($_SESSION['search_comment']['zbname']);
				$uids = implode(',',$uids);
				$search['zbname'] = $_SESSION['search_comment']['zbname'] ;
				if( $uids )
					$sql .= " AND uid IN(".$uids.")";
			}*/
			if( $_SESSION['search_comment']['content'] )
			{
				$sql .= " AND content like '%".$_SESSION['search_comment']['content']."'%";
				$search['content'] = $_SESSION['search_comment']['content'];
			}						
			if( $_SESSION['search_comment']['star_num'] )
			{
				$sql .= " AND star_num =".$_SESSION['search_comment']['star_num'];
				$search['star_num'] = $_SESSION['search_comment']['star_num'];
			}
			
			$total = $this->Common->get_sql( $sql );
			$sql = str_replace('SELECT count(*) as count','SELECT *',$sql );
			$sql .= " LIMIT ".$start.",".$this->per_page;
			$data = $this->Common->get_sql( $sql );					
		}
		else
		{
			$data = $this->Common->get_limit_order( $this->comment_table, $where,$start,$this->per_page,'ctime','DESC');		
			$total = $this->Common->get_count( $this->comment_table, $where );
		}
		
		$total = $total[0]['count'] ? $total[0]['count'] : $total;
		//Step 2 : 分页
        $config = array(
            'uri_segment' => 3,
            'base_url' => site_url('grad/check_comment/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links(); 
		$viewdata['pagination'] = $pagination; 		
		$viewdata['data'] = $data;		
		$viewdata['search'] = $search;		
		$this->load->view('grad/check_comment',$viewdata);
	}
	
	/*
	*	@编辑评论
	*	@yinting
	*	@2017年2月10日
	*/	
	public function edit_comment( $id )
	{
		$id = (int)$id;
		if( empty($id) )
			redirect('grad/check_comment');
		$where = array(
			'id' => $id,
			);
		if( $_POST )
		{
			$post = html_filter_array($_POST);
			$res = $this->Common->update( $this->comment_table, $where, $post );
			if( $res )
			{
				$_SESSION['msg'] = '编辑评价成功';
				redirect('grad/check_comment');
			}
			else
			{
				$_SESSION['msg'] = '编辑评价失败，请重试';
				$viewdata['data'] = $post;
			}
		}
		else
		{
			$data = $this->Common->get_one( $this->comment_table, $where );
		}
		$viewdata['data'] = $data;
		$viewdata['id'] = $id;
		
		$this->load->view('grad/edit_comment',$viewdata);
	}
	
	/*
	*	@审核评价
	*	@yinting
	*	@2017年2月10日
	*/		
	public function examine_comment( $id )
	{
		if( empty($id) )
			redirect('grad/check_comment');
		$where = array(
			'id' => $id,
			);
		$data = $this->Common->get_one( $this->comment_table, $where);
		if( $data['if_check'] == 0 )
		{
			$update['if_check'] = 1;
		}
		else
		{
			$update['if_check'] = 0;
		}
		$res = $this->Common->update( $this->comment_table, $where, $update);
		if( $res )
			$_SESSION['msg'] = '评价审核成功';
		else
			$_SESSION['msg'] = '评价审核失败，请重试';
		redirect('grad/check_comment');
	}

	/*
	*	@统计数据分析
	*	@guoliang
	*	@2017年1月26日
	*/
	public function site_info()
	{
		//获取最近的数据
		$data['resent_days'] = get_recent_days(14,-14);

		$res = $this->Quguoren->get_date_num('postinfo',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['info_num'] = $res;

		$res = $this->Quguoren->get_date_num('users',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['zhubo_num'] = $res;

		
		$res = $this->Quguoren->get_date_num('favor',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['favor_num'] = $res;

		$res = $this->Quguoren->get_date_num('guanzhu',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['guanzhu_num'] = $res;
		
		$res = $this->Quguoren->get_date_num('message',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['msg_num'] = $res;

		$res = $this->Quguoren->get_date_num('support',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['support_num'] = $res;
	
		$res = $this->Quguoren->get_date_num('comments',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['comments_num'] = $res;

		$res = $this->Quguoren->get_date_num('invite',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['invite_num'] = $res;
	
		$res = $this->Quguoren->get_date_num('user_photo',$data['resent_days'][0],$data['resent_days'][14]);
		$data['res']['photo_num'] = $res;
		
		$data['resent_days'] = array_reverse($data['resent_days']);

		$this->load->view('grad/site_info',$data);
	}


















}
