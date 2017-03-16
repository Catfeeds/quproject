<?php

class Common extends CI_Model 
{
	
    function __construct() 
	{
        parent::__construct();
    }
	
	function html_filter_array($array){
		foreach($array as $key=>$one){
			if(!is_array($one)){
				$array[$key] = htmlspecialchars($one,ENT_QUOTES);
			}else{
				$array[$key] = $this->html_filter_array($one);
			}
		}
		return $array;
	}



	function passport_encrypt($txt, $key) { 
		srand((double)microtime() * 1000000); 
		$encrypt_key = md5(rand(0, 32000)); 
		$ctr = 0; 
		$tmp = ''; 
		for($i = 0;$i < strlen($txt); $i++) { 
		$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
		$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]); 
		} 
		return base64_encode($this->passport_key($tmp, $key)); 
	} 

	function passport_decrypt($txt, $key) { 
		$txt = $this->passport_key(base64_decode(str_replace(" ","+",$txt)), $key); 
		$tmp = ''; 
		for($i = 0;$i < strlen($txt); $i++) { 
			$md5 = $txt[$i]; 
			$tmp .= $txt[++$i] ^ $md5; 
		} 
		return $tmp; 
	} 
	function passport_key($txt, $encrypt_key) { 
		$encrypt_key = md5($encrypt_key); 
		$ctr = 0; 
		$tmp = ''; 
		for($i = 0; $i < strlen($txt); $i++) { 
		$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr; 
		$tmp .= $txt[$i] ^ $encrypt_key[$ctr++]; 
		} 
		return $tmp; 
	} 

	//邀请信息加密
	function invite_info($uid,$email){
		$info = $uid.'##'.$email;
		$info = $this->passport_encrypt($info,'1day');
		return $info;
	}

	//邀请信息解密
	function parse_info($info){
		$info = $this->passport_decrypt($info,'1day');
		$info = explode("##",$info);
		return $info;
	}

	//百度短连接

	function dwz_cn($url='http://www.1daysos.com'){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,"http://dwz.cn/create.php");
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$data=array('url'=>$url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		$strRes=curl_exec($ch);
		curl_close($ch);
		$arrResponse=json_decode($strRes,true);
		return $arrResponse['tinyurl'];
	}

	
   //2015年8月18日22:41:59添加保存用户名

   function save_user($tel_pre,$tel,$user_from='1'){
   				$where1= array('tel_pre'=>$tel_pre,'tel'=>$tel);
				$res = $this->get_one('sos_users',$where1);
				if(empty($tel))$tel='3';
				if(empty($res)){
					$tel = $tel;
					$insert_data1 = array('tel_pre'=>3,'tel'=>$tel,'user_from'=>$user_from,'ctime'=>time(),'utime'=>time());
					$userid = $this->add('sos_users',$insert_data1);
					$_SESSION['userinfo']['uid']=$userid;
					$_SESSION['userinfo']['tel']=$tel;
					$data['error'] = 'ok='.$userid;
				}else{
					if($res['password']!=''){
						$data['error'] = 'password=';
					}
					
					$update_data1 = array('utime'=>time());
					$this->update('sos_users',array('id'=>$res['id']),$update_data1);
					$_SESSION['userinfo']['uid']=$res['id'];

					$_SESSION['userinfo']['tel']=$res['tel'];
					$data['error'] = 'new='.$res['id'];
					
				}

				return $data['error'];
   }
   //保存大师信息，描述，擅长类型，uid，每次存在就update，2015年8月18日23:53:05更新
   function save_master($uid,$type,$des){
   				$where1= array('uid'=>$uid);
				$res = $this->get_one('sos_master',$where1);
				if(empty($res)){
					$insert_data1 = array('uid'=>$uid,'type'=>$type,'des'=>$des,'ctime'=>time(),'utime'=>time());
					$master_id = $this->add('sos_master',$insert_data1);		
					$data['error'] = 'ok='.$master_id;
				}else{
					$update_data1 = array('type'=>$type,'des'=>$des,'utime'=>time());
					$this->update('sos_master',array('id'=>$res['id']),$update_data1);
					$data['error'] = 'new='.$res['id'];
					
				}
				return $data['error'];
				
   }
  


   //根据结果集获取用户信息并且拼接用户信息
   function get_userinfo_by_arr($arr=array()){
   		if(!empty($arr)){
   			foreach ($arr as $key => $value) {
   				$uid = $value['uid'];
   				$user_tel = $this->get_userinfo_by_uid($uid);

   				$arr[$key]= array_merge($value,$user_tel);

   			}
   		}
   		return $arr;
   }

   
   /**
   **
   ** 作者：杨国良
   **
   ** 创建时间：2015年10月7日21:18:05
   **
   ** 目的：插入发短信的内容
   **
   **/
   public function send_message($receiver, $title ,$uid='')
   {
   		return $this->_insert_send_list("bc_msg_list",array('receiver'=>$receiver,'title'=>$title));
   }
   /**
   **
   ** 作者：杨国良
   **
   ** 创建时间：2015年10月7日21:18:05
   **
   ** 目的：插入发邮件的内容
   **
   **/
   public function send_email($receiver,$title,$content){
   		if(is_numeric($receiver)){
   			$userinfo = $this->get_one('zb_users',array('id'=>$receiver));
   			$receiver = $userinfo['email'];
   		}
   		return $this->_insert_send_list("bc_email_list",array('receiver'=>$receiver,'title'=>$title,'content'=>$content));
   }
   private function _insert_send_list($table,$post)
   {
   		$post = html_filter_array($post);
   		
   		//查询一下内容一模一样的只插入一次
   		$check_if_exist = $this->get_one($table,$post);
   		if(empty($check_if_exist)){
   			$post['ctime'] = time();
   			return $this->add($table,$post);
   		}else{		
   			return '';
   		}
   	
   }


   //模拟POST调用
   function _curl_init_post($c_url, $c_url_data) 
   {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $c_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $c_url_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		
		
		$result = curl_exec($ch);
		$res = curl_multi_getcontent( $ch );
		curl_close($ch);
		unset($ch);
		return $res;
    }

    //模拟POST调用
   function _curl_init_post_short($c_url, $c_url_data) 
   {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $c_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $c_url_data);
		
		curl_exec($ch);
		
		curl_close($ch);
		unset($ch);
    }

    function mkfolder($path)  
	{  
	    if(!is_readable($path))  
	    {  
	        is_file($path) or mkdir($path,0700);  
	    }  
	}  
	
	//上传图片
	public function do_upload($file_name,$limit='')
	{
		
		if(!defined('SAE_TMP_PATH'))
		{
			$date = date('Ymd');
			$config['upload_path'] = './uploads/'.$date.'/';
			$this->mkfolder($config['upload_path']);
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|ppt|txt|ppt';
			$config['max_size'] = '10000';
			$config['max_width'] = '10240';
			$config['max_height'] = '7680';
			$config['encrypt_name'] = TRUE;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($file_name)) 
			{
				 $error = array('error' => $this->upload->display_errors());
			   	return $error;
			} 
			else 
			{
				 $data = array('upload_data' => $this->upload->data());
				
				//本地生成缩略图未做
				 return($data['upload_data']['file_name']?'/uploads/'.$date.'/'.$data['upload_data']['file_name']:'');
			}
		
		}
		else
		{
			// SAE环境下
			if($file_name=='')return false;
			if($limit!='' && is_array($limit)){
				
			}else{
				$limit= array("30000","300000","500");
				//宽，高，大小
			}
			$max_size=$limit[2]*1024*1024;
			$max_width=$limit[0];
			$max_height=$limit[1];
			

			$filesize = filesize($_FILES[$file_name]['tmp_name']);
			if($filesize<=0)return false;
			if($filesize>=$max_size){
				return '1';//太大
			}
			list($width, $height, $type, $attr) = getimagesize($_FILES[$file_name]['tmp_name']);
			
			if($width>=$max_width){
				return '2';//太宽
			}
			if($height>=$max_height){
				return '3';//太高
			}

			$s = new SaeStorage();
			$exten = $this->get_extension($_FILES[$file_name]['name']);
			$remote_file = time().rand(100,999).$exten;
			
			$s->write( 'img' , $remote_file , file_get_contents($_FILES[$file_name]['tmp_name']) );
			$url=$s->getUrl('img', $remote_file );
		  
			#2014-04-24未测试缩略图功能
			$f = new SaeFetchurl();
			$img_data = $f->fetch( $url);
			$img = new SaeImage();
			$img->setData( $img_data );
			$img->resize(300);		  
			$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
			
			$thumb_file = str_replace( $exten,'_small'.$exten,$remote_file);
			$err = $s->write( 'img' , $thumb_file , $new_data );
			
			#end 缩略图功能
			
			return $url;
		}
      }

      function get_extension($filename)
      {
		  $x = explode('.', $filename);
		  return '.'.end($x);
      }	

	

	function if_mobile(){
		if($_SESSION['v']=='pc'){
			 return false;
		}elseif(stristr($_SERVER['HTTP_VIA'],"wap")){// 先检查是否为wap代理，准确度高
       		 return true;
	    }elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){// 检查浏览器是否接受 WML.
	        return true;
	    }elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){//检查USER_AGENT
	        return true;            
	    }elseif($_SESSION['v']=='mb'){
	        return true;   
	    }else {
	    	return false;
	    }

	}		
	
	
	function save( $table, $data )
	{
		$res = $this->db->get_count($table, $data);
		if($res<=0){
			$data['ctime'] = time();
			$res = $this->db->insert($table, $data);
		
			$res = $this->db->insert_id();
		
			return $res;
		}else{
			return 0;
		}
		
	}
	
	function add( $table, $data )
	{
		$res = $this->db->insert($table, $data);
		
		$res = $this->db->insert_id();
	
		return $res;
	}
	
	function update( $table, $where,$data )
	{
		$this->db->where( $where );
		
		$res = $this->db->update($table,$data);	
		
		return $res;
	}
	
	function delete( $table, $where )
	{
		if( !empty($where) )
		{
			#$this->db->where( $where );
			$res = $this->db->delete($table, $where);
		
			return $res;
		}
		else
			return false;
	}
	
	function get_limit_order( $table='',$where='',$from=0,$limit='',$orderby='id',$order_type='desc',$like = array())
	{
      
		if( !empty($table) ){	

			$this->db->from($table);
			$this->db->where($where);	
			if( $like )
			{
				$this->db->like( $like );
			}				
			if( $limit )
			{
				$this->db->limit($limit,$from);
			}
			$this->db->order_by($orderby,$order_type);						
			$query = $this->db->get();

			return $query->result_array();
		}else{
			return '';
		}
	}
	
	function get_all( $table='',$where)
	{
        
		if( !empty($where) ){
			$this->db->where($where);
			$this->db->select($select_field);
			$query = $this->db->get($table);
			return $query->result_array();
		}else{
			return '';
		}
	}
	
	function get_one( $table, $where=array(),$select_field='*' )
	{
		if( !empty($where) )
			$this->db->where($where);
		$this->db->select($select_field);
		$query = $this->db->get($table);
		if($query)
		return $query->row_array();
		else
		return '';
	}

	function get_count( $table ,$where,$like = array()){
		if( !empty($where) )
		$this->db->where($where);
		if( $like )
		{
			$this->db->like( $like );
		}		
		$this->db->from($table);
		
		return $this->db->count_all_results();
	}

	//查询sql语句
	function get_sql($sql, $action='')
	{
		$query = $this->db->query($sql);

		if( $action == 'update' )
		{
			return $query;
		}
		else
		{
			return $query->result_array();
		}
	}
	
   function get_real_ip() {
        $ip = false;
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) {
                array_unshift($ips, $ip);
                $ip = FALSE;
            }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi("^(10|172\.16|192\.168)\.", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }

    function get_thumPic($pic_src) {
    	if($_SERVER['HTTP_APPNAME']=='modian')
		{
			$pic_thum_src = $this->get_sae_picthum($pic_src);
		} else 
			$pic_thum_src = $this->get_gd2_picthum($pic_src,'z');
		return $pic_thum_src;
    }

    /**
	 * 图片压缩 使用sae提供的SaeImage进行缩图 
	 * 缩图以后直接放到图片上传时处理
	 * @param  string $srcFile 图片地址
	 * @param  string $s       压缩尺寸（对应sizeArr）
	 * @return [type]          [description]
	 */
	private function get_sae_picthum($srcFile)
	{
		return $srcFile;
		//杨国良 2014年5月29日14:08:20 临时增加，目前本地不能使用，临时方案
        $pathInfo = pathInfo($srcFile);
        $savepath="thumb_400_".$pathInfo['filename'].'.'.$pathInfo['extension'];
        $s = new SaeStorage();
        if($s->fileExists('modian',$savepath))
        	$file_url = $s->getUrl("modian",$savepath);
        else
        {

        	$f = new SaeFetchurl();
			$img_data = $f->fetch($srcFile);
			$img = new SaeImage();
			$img->setData( $img_data );
			$img->resize(400);		  
			$new_data = $img->exec(); // 执行处理并返回处理后的二进制数据
			
			$s->write('modian',$savepath,$new_data);
			$file_url = $s->getUrl("modian",$savepath);
        }
    	
		return $file_url;
	}

	/**
	 * GD2库处理缩图 暂时用不上 留待从sae上迁移后使用（sae上使用_picthum）
	 * @param [type] $srcFile [description]
	 * @param [type] $s       [description]
	 */
	public function get_gd2_picthum($srcFile, $s)   
    {
	   	return $srcFile;
		//杨国良 2014年5月29日14:08:20 临时增加，目前本地不能使用，临时方案
        $sizeArr = array('s'=>'64x64','m'=>'120x120','b'=>'240x240','l' => '320x320','o' => '450x300','t'=>'135x90','z'=>'400x400');
        $size = $sizeArr[$s];
        $pathInfo = pathInfo($srcFile);
        $toFile = $pathInfo['dirname'].'/'.$pathInfo['filename'].'_'.$size.'.'.$pathInfo['extension'];
        $formatInfo = explode('x',$size);
        $toW = $formatInfo[0];
        $toH = $formatInfo[1];
        $savepath="thumb_".$pathInfo['filename'].'.'.$pathInfo['extension'];
        $info = "";  
        //返回含有4个单元的数组，0-宽，1-高，2-图像类型，3-宽高的文本描述。  
        //失败返回false并产生警告。  
        $data = getimagesize($srcFile, $info);  
        if (!$data)  
            return false;  
          
        //将文件载入到资源变量im中  
        switch ($data[2]) //1-GIF，2-JPG，3-PNG  
        {  
        case 1:  
            if(!function_exists("imagecreatefromgif"))  
            {  
                echo "the GD can't support .gif, please use .jpeg or .png! <a href='javascript:history.back();'>back</a>";  
                exit();  
            }  
            $im = imagecreatefromgif($srcFile);  
            break;  
              
        case 2:  
            if(!function_exists("imagecreatefromjpeg"))  
            {  
                echo "the GD can't support .jpeg, please use other picture! <a href='javascript:history.back();'>back</a>";  
                exit();  
            }  
            $im = imagecreatefromjpeg($srcFile);  
            break;  
                
        case 3:  
            $im = imagecreatefrompng($srcFile);      
            break;  
        }  
          
        //计算缩略图的宽高  
        $srcW = imagesx($im);  
        $srcH = imagesy($im);  
        $toWH = $toW / $toH;  
        $srcWH = $srcW / $srcH;  
        if ($toWH <= $srcWH)   
        {  
            $ftoW = $toW;  
            $ftoH = (int)($ftoW * ($srcH / $srcW));  
        }  
        else   
        {  
            $ftoH = $toH;  
            $ftoW = (int)($ftoH * ($srcW / $srcH));  
        }  
          
        if (function_exists("imagecreatetruecolor"))   
        {  
            $ni = imagecreatetruecolor($ftoW, $ftoH); //新建一个真彩色图像  
            if ($ni)   
            {  
                //重采样拷贝部分图像并调整大小 可保持较好的清晰度  
                imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);  
            }   
            else   
            {  
                //拷贝部分图像并调整大小  
                $ni = imagecreate($ftoW, $ftoH);  
                imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);  
            }  
        }  
        else   
        {  
            $ni = imagecreate($ftoW, $ftoH);  
            imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);  
        }  
  
        //保存到文件 统一为.png格式  
        imagepng($ni, $toFile); //以 PNG 格式将图像输出到浏览器或文件  
        ImageDestroy($ni);  
        ImageDestroy($im);  
        return $toFile;  
    }  

	
	function base64_to_img( $base64_string, $output_file ) 
	{		
		$ifp = fopen($output_file, "wb") or die("Unable to open file!");	 
		fwrite( $ifp, base64_decode( $base64_string) ); 
		fclose( $ifp );
		return( $output_file );
	}	
	
	
	function upload_svg( $file_name, $union_name )
	{		
		$config['upload_path'] = './uploads/svg/';		
		$config['allowed_types'] = 'gif|jpg|png|jpeg|svg';
		$config['max_size'] = 1024*1024*5;
		$config['max_width'] = 8000;
		$config['max_height'] = 8000;
		$config['encrypt_name'] = TRUE;
		$config['file_name'] = $file_name;		
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload($file_name,$union_name)) 
		{
			 $error =  $this->upload->display_errors();
			 $_SESSION['svg_error'] = $error;
			 return false;
		} 
		else 
		{
			$data = array('upload_data' => $this->upload->data());
			return($data['upload_data']['file_name']? $config['upload_path'].$data['upload_data']['file_name']:'');			
		}			
	}
	
	//整理导出excel中的数据内容
	function export_excel( $title_list, $data_list, $filename )
	{
		require_once('application/libraries/PHPExcel.php');
        $objExcel = new PHPExcel();		
		
        #row
        $row_p = 1;

        if( !empty($title_list) )
		{
            $title_p = 0;
            foreach( $title_list as $title )
			{
                $title_en = $this->get_english_char( $title_p ); 				
				$objExcel->getActiveSheet()->setCellValue( $title_en.$row_p,$title );             
                $title_p ++;
            }           
            #row
            $row_p ++;
        }
		        		
    	if( !empty($data_list) )
		{
    	    //start foreach to write each two data
    	    foreach( $data_list as $data )
			{    	        
    	        #each row
    	        if( !empty($data) )
				{
    	            $data_p = 0;
    	            foreach($data as $val)
					{
    	                $data_en = $this->get_english_char($data_p);   
						$objExcel->getActiveSheet()->setCellValue( $data_en.$row_p, $val );                                                
                        $data_p ++;
    	            }
    	        }
    	        
    	        #row
    	        $row_p ++;
    	    }
    	}	
		
        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel5');
	
		header ( "Content-type:application/vnd.ms-excel; charset=UTF-8" );
		header ( "Content-Disposition:filename=".mb_convert_encoding($filename, "GBK","UTF-8" ).".xls" );			
					
		$objWriter->save( "php://output" );				
		
	}	

	
    function get_english_char( $char_pointer = 0 )
	{
    	$char_en = '';
    	$quotient = 0;
    	$remainder = 0;
    	$ascii_basic = 65;
    	
    	$quotient = floor($char_pointer/26);
    	$remainder = $char_pointer%26;	
    	
    	if( $remainder >= 0 && $remainder < 26)
		{
    		$char_ascii = $ascii_basic+$remainder;
    		$char_en =chr($char_ascii);
    	}
    	
    	if( $quotient >0 )
		{
    		$char_en = $this->get_english_char($quotient -1 ).$char_en;
    	}
    	
    	return $char_en;
    }			
}

?>
