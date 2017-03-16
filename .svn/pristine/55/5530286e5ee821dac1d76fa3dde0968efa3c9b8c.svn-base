<?php
/**
**
**
**/
defined('BASEPATH') OR exit('No direct script access allowed');


include_once(dirname(dirname(dirname(__FILE__))).'/360safe/360webscan.php');


class Test extends Application 
{
	
	 public function __construct() 
	 {
		 // Do something with $params
		 parent::__construct();
		 $_SESSION['uid']=2;
     }
	
	/*
	*	@测试用例
	*	@guoliang
	*	@2017年1月26日
	*/
	public function test()
	{
		// log_message("info",'2');
		// log_message("debug",'222');
		// log_message("error",'2error');
		// log_message("all",'2222');


		$arr = array("signature"=>'我勒个去！122！！！！');
		$res =$this->Common->_curl_init_post(base_url("/api/update_user_info"),$arr);
		print_r($res);
		exit;
		// $res = $this->Quguoren->update_service_num(2);
		// echo $res;exit;
		// $list_arr = array(
		// 	'orderby'=>'ctime',
  //   		'city'=>'北京',
  //   		'status'=>'1',
  //   		'category'=>'all');
		// $page = 0;

		$list_arr = array(
			'dazhou'=>'all',
    		'hsk_class'=>'all',
    		'city'=>'all',
    		'orderby'=>'degree');
		//fans_num，	comment_level，service_num
		$page = 0;

	
		$res = $this->Quguoren->get_all_zhubo($list_arr,$page);

		var_dump($res);exit;

		$this->load->view('main/index');
	}

	public function test_add_photo(){

		$data['form'] = array(
			
			'photo'=>array('type'=>'file','check'=>'required','input_name'=>"上传测试"),
			
			);
		$this->load->view("main/add_photo",$data);
	}

	public function test_update_user_icon(){

		$data['form'] = array(
			
			'icon'=>array('type'=>'file','check'=>'required','input_name'=>"上传测试"),
			
			);
		$this->load->view("main/update_user_icon",$data);
	}

	public function test_delete_photo(){
		
		$arr = array("photo_id"=>'12,14,3,4,5');
		$res =$this->Common->_curl_init_post(base_url("/api/delete_photo"),$arr);
		echo $res;exit;
	}


	public function test_get_user_num(){
		
		$res =$this->Quguoren->get_user_num();
		print_r($res);exit;
	}

	public function test_xingzuo($b){
		echo get_xingzuo($b);
		echo 3333;
		exit;
	}

	public function test_add_jifen(){
		$res = $this->Quguoren->add_jifen(2,2,'invite one');
		echo $res;exit;

	}


	public function test_update_degree(){
		$res = $this->Quguoren->update_degree(2);
		print_r($res);exit;

	}
	
	public function test_from()
	{
		$this->load->view('user/test');
	}

	public function test_image()
	{
echo get_order_number();
exit;
var_dump(strlen($_POST['image']));echo "<br/>";		
$_POST['image'] = str_replace(' ','',$_POST['image']);
var_dump(strlen($_POST['image']));echo "<br/>";
		$res1 = preg_match('/^(data:\s*image\/(\w+);base64,)/', $_POST['image'], $result1);
		
		$ext = $result1[2];						
		if( $ext == 'jpeg' )
		{
			$ext = 'jpg';
		}	
		$targetFolder = './uploads/'.date('Ymd');			
		make_dirs($targetFolder);		
		$img_folder = './uploads/'.date('Ymd');
		$filename = $img_folder.'/'.md5(date('Ymdhis').uniqid()).'.'.$ext;
						
		if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $_POST['image'], $result))
		{
			$image = str_replace($result[1], '', $_POST['image']);			 
		}		
		else
		{
			$image = $_POST['image'];
		}							
$img = base64_decode($image);
$a = file_put_contents($filename, $img);//返回的是字节数
print_r($a);
//$a = file_put_contents('./test.jpg', $img);//保存图片，返回的是字节数
//print_r($a);
//Header( "Content-type: image/jpeg");//直接输出显示jpg格式图片
//echo $img;		
		
		
		//$upload_file = $this->Common->base64_to_img( $image,$filename );		
		//echo $upload_file;

	}
}