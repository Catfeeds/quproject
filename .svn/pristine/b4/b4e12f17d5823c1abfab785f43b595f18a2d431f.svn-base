<?php

class Quguoren extends CI_Model 
{

    function __construct() 
	{
        parent::__construct();
        $this->load->model("Common");
    }

    //获取所有的活动列表
    function get_all_info($list_arr='',$page=0){
    	
    	$limit = $this->config->item("per_page");

    	$this->db->from("gr_postinfo");

    	if($list_arr['city']!='all' && $list_arr['city'] != '' ){
    		$this->db->like("city",$list_arr['city']);
    	}
    	if($list_arr['status']!='all' && $list_arr['status'] != '' ){
    		$this->db->where("status",$list_arr['status']);
    	}
		else
		{
			$where = array('status >='=>1);
			$this->db->where($where);			
		}
    	if($list_arr['category']!='all' && $list_arr['category'] != '' ){
    		$this->db->where("category",$list_arr['category']);
    	}
		if( $list_arr['title']!='all' && $list_arr['title'] != '' )
		{
			$this->db->like('title',$list_arr['title']);
			$this->db->or_like('en_title',$list_arr['title']);
		}
		if( $list_arr['order_by'])
		{
			$this->db->order_by($list_arr['order_by'],"DESC");
		}
		else
		{
    		$this->db->order_by('ctime',"DESC");
		}
    	$this->db->limit($limit,$page);
    	
    	$res = $this->db->get();
//print_r($this->db->last_query());    	
    	return $res->result_array();
    }


    //获取所有的主播列表
    function get_all_zhubo($list_arr='',$page=0){
    	
    	

    	$limit = $this->config->item("per_page");

    	$this->db->from("gr_users");
		$this->db->where('if_check',1);

    	if($list_arr['dazhou']!='all' && $list_arr['dazhou'] != ''){
    		$this->db->like("dazhou",$list_arr['dazhou']);
    	}
    	if($list_arr['tags']!='all' && $list_arr['tags'] != ''){
    		$this->db->like("tags",$list_arr['tags']);
    	}		
    	if($list_arr['hsk_class']!='all' && $list_arr['hsk_class'] != ''){
    		$this->db->where("hsk_class >= ",$list_arr['hsk_class']);
    	}
    	if($list_arr['city']!='all' && $list_arr['city'] != ''){
    		$this->db->like("city",$list_arr['city']);
    	}
    	if($list_arr['fans_num']!='all' && $list_arr['fans_num'] != ''){
    		$this->db->like("fans_num",$list_arr['fans_num']);
    	}		
		if( $list_arr['gr_type'] )
		{
			$this->db->where('gr_type',$list_arr['gr_type']);
		}	
		if( $list_arr['sex'] )
		{
			$this->db->where('sex',$list_arr['sex']);
		}
        if($list_arr['nickname']!='all' && $list_arr['nickname'] != ''){
            $this->db->like("nickname",$list_arr['nickname']);
        }
    	$this->db->order_by($list_arr['orderby'],"DESC");

    	$this->db->limit($limit,$page);

        $this->db->select("id,birthday,city,icon,nickname,sex,tags,fans_num");
    	
    	$res = $this->db->get();

    	return $res->result_array();
    	


    }

    //获取所有的消息
    function get_all_msg($list_arr='',$page=0){
        

        $limit = $this->config->item("per_page");

        $this->db->from("gr_message");

        if($list_arr['uid']!=''){
            $this->db->where("uid=",$list_arr['uid']);
        }
      
        $this->db->order_by($list_arr['orderby'],"DESC");

        $this->db->limit($limit,$page);
        
        $res = $this->db->get();

        return $res->result_array();

    }

    //获取所有的图片
    function get_all_photo($list_arr='',$page=0){
        

        $limit = $this->config->item("per_page");

        $this->db->from("gr_user_photo");
		$this->db->where('if_show',1);
        if($list_arr['uid']!=''){
            $this->db->where("uid=",$list_arr['uid']);
        }

        $this->db->order_by($list_arr['orderby'],"DESC");

        $this->db->limit($limit,$page);
        
        $res = $this->db->get();

        return $res->result_array();

    }
    //增加用户积分
    function add_jifen($uid='',$jifen='',$reason=''){
    	$insert_id = 0;
    	if(!empty($uid) && !empty($jifen)){
    		$insert_id = $this->Common->add("gr_jifen",
    			array('uid'=>$uid,'jifen'=>$jifen,'ctime'=>time(),'reason'=>$reason));
    		$this->update_degree($uid);
    	}
    	return $insert_id;
    }


    //更新用户等级
    function update_degree($uid=''){
    	
    	$this->db->where('uid=',$uid);
    	$this->db->select_sum('jifen');
    	$res = $this->db->get('gr_jifen');
    	$res = $res->row_array();
    	$all_jifen = $res['jifen'];
    	//100积分就是1级，200积分就是2级
    	$degree = floor($all_jifen/100);

    	if($degree>=100){
    		$degree = 100;
    	}
    	if($degree==0){
    		$degree = 1;
    	}
    	$res = $this->Common->update('gr_users',array('id'=>$uid),array('degree'=>$degree));
    	
    	return $res===true?1:-1;

    }


    //获取活动信息
    function get_info($info_id=1){
    	$res = $this->Common->get_one("gr_postinfo",array('id'=>$info_id));
    	return $res;
    }

    //获取用户信息
    function get_user($uid=1){
    	$res = $this->Common->get_one("gr_users",array('id'=>$uid));
    	return $res;
    }

    //获取用户信息
    function get_user_simple($uid=1){
    	$res = $this->Common->get_one("gr_users",array('id'=>$uid),'id,icon,nickname,telephone,if_check');
    	return $res;
    }

    //获取所有报名的主播（包含已经审核通过的）
    function get_join_users($info_id=1,$from=0,$limit=1000){
    	$res = $this->Common->get_limit_order("gr_joininfo",array('info_id'=>$info_id),$from,$limit,'ctime');
    	return $res;
    }

    //获取是否我参加了这个活动
    function get_if_user_joininfo($uid=1,$info_id=1){
        $res = $this->Common->get_one("gr_joininfo",array('uid'=>$uid,'info_id'=>$info_id,'if_accept'=>1));
        return $res;
    }
    //获取是否我参加了这个活动
    function get_if_user_guanzhu_zhubo($uid=1,$zhubo_id=1){
        $res = $this->Common->get_one("gr_guanzhu",array('uid'=>$uid,'zhubo_id'=>$zhubo_id));
        return $res;
    }
    //获取是否我参加了这个活动
    function get_if_user_favorinfo($uid=1,$info_id=1){
        $res = $this->Common->get_one("gr_favor",array('uid'=>$uid,'info_id'=>$info_id));
        return $res;
    }
   

    //获取所有已经加入的主播（审核通过）
    function get_accept_users($info_id=1,$from=0,$limit=1000){
    	$res = $this->Common->get_limit_order("gr_joininfo",array('info_id'=>$info_id,'if_accept'=>1),$from,$limit,'ctime');
    	return $res;
    }

    //获取所有我报名的活动
    function get_user_joininfo($uid=1,$from=0,$limit=1000){
        $res = $this->Common->get_limit_order("gr_joininfo",array('uid'=>$uid),$from,$limit,'ctime');
        return $res;
    }

    //获取用户收藏
    function get_user_favor($uid=1,$from=0,$limit=1000){
    	$res = $this->Common->get_limit_order("gr_favor",array('uid'=>$uid),$from,$limit,'ctime','DESC');
    	return $res;
    }


    //获取用户关注
    function get_user_guanzhu($uid=1,$from=0,$limit=1000){
    	$res = $this->Common->get_limit_order("gr_guanzhu",array('uid'=>$uid),$from,$limit,'ctime');
    	return $res;
    }

    //获取用户评论
    function get_user_comments($uid=1,$from=0,$limit=1000,$list_arrr = array())
	{
		$where = array(
			'zhubo_id' => $uid,
			);
		if( $list_arrr['type'] == 1 )
			$where['star_num >='] = 4;
		if( $list_arrr['type'] == 2 )
			$where['star_num'] = 3;
		if( $list_arrr['star_num'] == 3 )
			$where['star_num<='] = 2;
        $res = $this->Common->get_limit_order("gr_comments",$where,$from,$limit,'ctime');
        return $res;
    }


    //获取用户的所有消息
    function get_user_message($uid=1,$from=0,$limit=1000){
    	$this->db->from("gr_message");
    	$this->db->where('uid = ',$uid);
    	$this->db->or_where('to_uid = ',$uid);
    	$this->db->order_by("ctime","DESC");

    	$this->db->limit($limit,$from);
    	$res = $this->db->get();
    	$res = $res->result_array();

        $return = '';
        foreach ($res as $key => $value) {
           $key2 = $value['uid']>$value['to_uid']?$value['uid'].$value['to_uid']:$value['to_uid'].$value['uid'];
           if(empty($return[$key2])){
             $return[$key2] = $value;
           }
        }
        return $return;


    }


    //获取两个人的所有消息
    function get_our_message($uid=1,$to_uid=1,$from=0,$limit=1000){
      
        $res = $this->db->query("SELECT *
FROM `gr_message`
WHERE (`uid` = '".$uid."'
AND `to_uid` = '".$to_uid."')
OR (`uid` = '".$to_uid."'
AND `to_uid` = '".$uid."')
ORDER BY `ctime` ASC
 LIMIT 1000");
        $res = $res->result_array();
        return $res;


    }





    //更新粉丝数量
    function update_fans_num($uid){
    	$num = $this->Common->get_count("gr_guanzhu",array('zhubo_id'=>$uid));
    	$this->Common->update("gr_users",array('id'=>$uid),array('fans_num'=>$num));
    	return 'ok';
    }


    //更新评论等级
    function update_comments_level($uid){
    	$this->db->from("gr_comments");
    	$this->db->where('zhubo_id = ',$uid);
    	$this->db->where('if_check=' ,1);
    	$this->db->select_avg("star_num");
    	$res= $this->db->get();
    	$num = $res->result_array();
    	$num = $num[0]['star_num'];
    	
    	$this->Common->update("gr_users",array('id'=>$uid),array('comment_level'=>$num));
    	return 'ok';
    }

    //更新服务次数
    function update_service_num($uid){
    	$service_num = $this->Common->get_count("gr_joininfo",array('uid'=>$uid,'if_finish'=>1));
    	$this->Common->update("gr_users",array('id'=>$uid),array('service_num'=>$service_num));
    	return 'ok';
    }


    //获取到个人的消息、收藏、关注数量

   	function get_user_num( $uid =''){

   		$uid = $_SESSION['uid'] ? $_SESSION['uid'] : $uid ;
   		
   		$res['message_num'] = $this->Common->get_count('gr_message',
   			array('to_uid'=>$uid,'if_read'=>0,'if_check'=>1));

   		$res['favor_num'] = $this->Common->get_count('gr_favor',array('uid'=>$uid));
   		
   		$res['guanzhu_num'] = $this->Common->get_count('gr_guanzhu',array('uid'=>$uid));
		$res['photo_num'] = $this->Common->get_count('gr_user_photo',array('uid'=>$uid,'if_show'=>1));
   		
   		return $res;
   	}

    function reload_arr($ress=array()){
        $arr = array();
        if(!empty($ress)){
            foreach ($ress as $key => $value) {
                $arr[$value['time']]=$value['count'];
            }
        }
        return $arr;
    }

    //获取活动数量
    function get_date_num($table='',$start='',$end=''){
        $start = strtotime($start." 00:00:00");
        $end = strtotime($end." 23:59:59");

        $this->db->select ("count(id) AS count,FROM_UNIXTIME(ctime,'%Y-%m-%d') AS time");
        $this->db->where("ctime >=",$start);
        $this->db->where("ctime<= ",$end);
        $this->db->group_by("FROM_UNIXTIME(ctime,'%Y-%m-%d')");
        $this->db->order_by("time","desc");
        $res = $this->db->get("gr_".$table);
        $arr = $res->result_array();

        return $this->reload_arr($arr);
    }






}