<?php
/**
 * BACEI框架后台，包含数据字典、所有数据表管理和用户权限管理、核心代码逻辑展示 四核心部分，以及预留的功能拓展
 *
 * 作者：杨国良
 *
 * 最后一次更新：2015年10月19日07:11:12
 *
 * TODO：自有框架的需求
 *
 **/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cead extends Application
{


    public function __construct()
    {
        parent::__construct();
        $now_url = uri_string();
        $this->load->library('pagination');
        if (!strstr($_SERVER['REQUEST_URI'], "/cead/login")) {
            if (!$_SESSION['admin_id']) {
                redirect('cead/login');
                exit;
            } elseif ($now_url != 'cead/login' && $now_url != 'cead/index') {
                check_admin_access($_SESSION['admin_id']);
            }
        }
    }

    /* 查看发起项目并进行审核 */

    public function index($order = 'ctime', $start = 0)
    {
        $this->load->view('cead/index');
    }

    /**
     *
     * 管理员修改密码
     *
     * 下次登录生效
     *
     **/
    public function change_password()
    {
        $data = array();
        if ($_POST) {
            $postdata = html_filter_array($_POST);
            $postdata['password'] = password_hash($postdata['password'], 1);
            $data['res'] = $this->Common->update($this->admin_user_table, array('id' => $_SESSION['admin_id']), $postdata);
            $this->_save_admin_log($_SESSION['admin_id'],'change_password');
        }
        $this->load->view('cead/change_password', $data);
    }
    /**
     *
     * @ 杨国良
     * @ 2015年10月18日06:08:12
     * @ 处理管理员权限
     *
     **/
    public function admin_access($id)
    {
        if($_POST){
            $postdata = html_filter_array($_POST);
            $postdata['access'] = implode(',',$postdata['access']);
            $res = $this->Common->update($this->admin_user_table,array('id'=>$postdata['id'])
                ,array('access'=>$postdata['access']));
            $this->Common->add($this->admin_log_table,array('admin_uid'=>$_SESSION['admin_id'],
                action=>"添加管理员权限".$postdata['id'].':'.$postdata['access'],'ctime'=>time(),'ip'=>$this->input->ip_address()));
            if(!empty($res))$id='';

        }
        $data['res_all'] = $this->Common->get_limit_order($this->admin_user_table,'1=1');
        $data['id'] = (int)$id;
        $this->load->view('cead/admin_access',$data);
    }

    /**
     *
     *
     *
     *
     **/
    private function _check_ip_ban(){
        //增加IP判断入口

        $ip= $this->input->ip_address();
        $ip_arr = explode('.',$ip);

        //判断一位
        $this->db->where('ip1',$ip_arr[0]);
        $this->db->where('ip2','0');
        $this->db->where('ip3','0');
        $this->db->where('ip4','0');
        $this->db->from($this->bc_banip_table);
        $query = $this->db->count_all_results();

        if($query){
            echo 'ip ban1,no access';exit;
        }
        //判断2位
        $this->db->where('ip1',$ip_arr[0]);
        $this->db->where('ip2',$ip_arr[1]);
        $this->db->where('ip3','0');
        $this->db->where('ip4','0');
        $this->db->from($this->bc_banip_table);
        $query = $this->db->count_all_results();

        if($query){
            echo 'ip ban2,no access';exit;
        }
        //判断3位
        $this->db->where('ip1',$ip_arr[0]);
        $this->db->where('ip2',$ip_arr[1]);
        $this->db->where('ip3',$ip_arr[2]);
        $this->db->where('ip4','0');
        $this->db->from($this->bc_banip_table);
        $query = $this->db->count_all_results();

        if($query){
            echo 'ip ban3,no access';exit;
        }
        //判断4位
        $this->db->where('ip1',$ip_arr[0]);
        $this->db->where('ip2',$ip_arr[1]);
        $this->db->where('ip3',$ip_arr[2]);;
        $this->db->where('ip4',$ip_arr[3]);
        $this->db->from($this->bc_banip_table);
        $query = $this->db->count_all_results();

        if($query){
            echo 'ip ban4,no access';exit;
        }

    }
    /**
     *
     * @ 杨国良
     * @ 2015年10月18日06:08:12
     * @ 处理管理员登录
     *
     **/
    public function login()
    {

        $this->_check_ip_ban();
        $viewdata = array();

        if ($_POST) {
		
            # step 1 : 验证用户名密码
            $username = $this->input->post('username', true);
            $post = html_filter_array($_POST);
            $password_verify = false;
            if (!empty($username)) {
                $result = $this->Common->get_one($this->admin_user_table, array('username' => $username));

                if (!empty($result)) {
                    $password_verify = password_verify($post['password'], $result['password']);
                }
				
                if (!$password_verify) {

                    $error['login_error'] = '*用户名或密码错误，请重新输入';
                    $viewdata['data'] = $post;
                    $viewdata['error'] = $error;
                    unset($_POST);
                    //写入log登录失败
                    $this->_save_admin_log(0,$username.'login error');

                    $this->load->view('cead/login', $viewdata);
                } else {
                    $_SESSION['admin_name'] = $result['username'];
                    $_SESSION['admin_id'] = $result['id'];
                    //写入log登录成功
                    $this->_save_admin_log(0,$username.'login success');
                    if ($result['access'] != 'all')
                        $_SESSION['admin_permission'] = explode(',', $result['access']);
                    else
                        $_SESSION['admin_permission'] = $result['access'];

                    redirect('cead/site');
                }
            } else {
                if (empty($email))
                    $error['username'] = '*请输入用户名';
                if (empty($password))
                    $error['password'] = '*请输入密码';
                $viewdata['error'] = $error;
            }
        } else {
            $this->load->view('cead/login', $viewdata);
        }
    }

    function logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_permisssion']);

        redirect('cead/login');
    }


    #网站概况

    function site()
    {
        # 当前数据统计

        $data = array();
        $this->load->view('cead/site', $data);
    }


    function export($type = 'quick_apply')
    {
        require_once('application/libraries/PHPExcel.php');

        date_default_timezone_set("Asia/Shanghai");
        if ($type == 'quick_apply') {
            $city = array('1' => '北京', '2' => '成都', '3' => '厦门');
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("引水鱼科技")
                ->setLastModifiedBy("引水鱼科技")
                ->setTitle("数据EXCEL导出")
                ->setSubject("数据EXCEL导出")
                ->setDescription("备份数据")
                ->setKeywords("excel")
                ->setCategory("result file");
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', '姓名')
                ->setCellValue('B1', '电话')
                ->setCellValue('C1', '邮件')
                ->setCellValue('D1', '城市')
                ->setCellValue('E1', '报名时间');

            $ActiveSheetIndex = $objPHPExcel->setActiveSheetIndex(0);
            $res = $this->Common->get_limit_order('ce_quick_apply', array(), 0, 100000000, 'ctime');
            reset($res);
            foreach ($res as $k => $row) {
                $num = ($k + 2);
                $ActiveSheetIndex
                    ->setCellValue('A' . $num, $row['username'])
                    ->setCellValue('B' . $num, $row['telephone'])
                    ->setCellValue('C' . $num, $row['email'])
                    ->setCellValue('D' . $num, $city[$row['city']])
                    ->setCellValue('E' . $num, date("Y-m-d H:i:s", $row['ctime']));

            }
            $objPHPExcel->getActiveSheet()->setTitle('User');
            $objPHPExcel->setActiveSheetIndex(0);
            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="导出报名用户_' . date("Y-m-d-H-i-s") . '.xls"');
            header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');


            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit;

        } else {
            exit();
        }
    }


    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日04:36:14
     ** 目的：展示表和结构、注释
     ** 参数：table表名称
     **/
    private function _get_table_info($table = '')
    {
        $res = $this->db->query("show table status like '" . $table . "'");
        $num_rows = $this->db->count_all_results($table);
        if ($res) {
            $res2 = $res->row_array();
            $res2['num_rows'] = $num_rows;
            return $res2;
        } else {
            return '';
        }

    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日18:31:26
     ** 目的：展示所有表的列和结构、注释
     ** 参数：table表名称
     **/
    private function _get_columns_info($table)
    {
        $res = $this->db->query("show full columns from `" . $table . "`");

        if ($res) {
            return $res->result_array();
        } else {
            return '';
        }

    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日18:34:47
     ** 目的：展示所有表
     ** 参数：无
     **/
    function all_tables()
    {
        $tables = $this->db->list_tables();
        $res = array();
        foreach ($tables as $table) {
            $res[$table]['table_info'] = $this->_get_table_info($table);
            $res[$table]['columns_info'] = $this->_get_columns_info($table);

        }
        $data['res'] = $res;
        $this->load->view("cead/all_tables", $data);
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日18:34:47
     ** 目的：展示所有表的管理后台
     ** 参数：无
     **/
    function manage_all_tables()
    {
        $tables = $this->db->list_tables();
        $res = array();
        foreach ($tables as $table) {
            $res[$table]['table_info'] = $this->_get_table_info($table);

        }
        $data['res'] = $res;

        $this->load->view("cead/manage_all_tables", $data);
    }


    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日18:34:47
     ** 目的：展示所有表的管理后台
     ** 参数：无
     **/
    function manage_table($table = '', $page = 0)
    {
        if (empty($table)) {
            exit(0);
        }
        $check_table = $this->db->table_exists($table);
        if (!$check_table) {
            exit('not exist');
        }

        $res['columns_info'] = $this->_get_columns_info($table);


        $page = (int)$page;
        $from = $page > 0 ? ($page) * $this->per_page : 0;

        $config = array(
            'uri_segment' => 4,
            'base_url' => site_url('cead/manage_table/' . $table . '/'),
            'per_page' => $this->per_page,
            'total_rows' => $this->db->count_all($table),
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        if ($_POST) {
            $postdata = html_filter_array($_POST);
            foreach($postdata as $key=>$one){
                if(!empty($one) && preg_match("/^\w[\w\_]*\w$/i",$key)){
                    $this->db->like($key,$one,'both');

                }

            }

            $this->db->from($table);
            $query = $this->db->get();
            if($query)
            $res['all_data'] = $query->result_array();


        } else {
            $res['all_data'] = $this->Common->get_limit_order($table, '1=1', $from, $this->per_page);
        }
        $data['res'] = $res;
        $data['pagination'] = $pagination;
        $data['table'] = $table;

        $this->load->view("cead/manage_table", $data);
    }


    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日18:34:47
     ** 目的：编辑单个表内的单条记录
     ** 参数：无
     **/
    function edit_row($table = '', $id = '')
    {
        if (empty($table) || empty($id)) {
            exit(0);
        }
        $check_table = $this->db->table_exists($table);
        if (!$check_table) {
            exit('not exist');
        }

        $res['columns_info'] = $this->_get_columns_info($table);
        $id = (int)$id;
        if ($_POST || $_FILES) {
            $postdata = html_filter_array($_POST);
            $postdata['id'] = (int)$postdata['id'];
            //图片单独处理
            $upload_arr = array_keys($_FILES);

            foreach ($upload_arr as $key => $value) {
                if ($_FILES[$value]['name'] == '')
                    unset($postdata[$value]);//如果文件未上传就不更新这个字段
                else
                    $postdata[$value] = $this->Common->do_upload($value);
            }

            //富文本单独处理，无需处理，html_filter_array已经处理
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['ctime'])) {
                $postdata['ctime'] = strtotime($postdata['ctime']);
            }

            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['start_time'])) {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['end_time'])) {
                $postdata['end_time'] = strtotime($postdata['end_time']);
            }
            if (!empty($postdata['password']) && !empty($postdata['if_update_password']))
                $postdata['password'] = password_hash($postdata['password'], 1);

            unset($postdata['if_update_password']);


            $this->Common->update($table, array('id' => $id), $postdata);
            //如果修改了id就跳转到新的id
            if ($id != $postdata['id']) redirect("cead/edit_row/" . $table . '/' . $postdata['id']);

        }

        $res['all_data'] = $this->Common->get_one($table, "id = '$id'");

        $data['res'] = $res;
        $data['table'] = $table;

        $this->load->view("cead/edit_row", $data);
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：添加单个表内的单条记录
     ** 参数：无
     **/
    function add_row($table = '')
    {
        if (empty($table)) {
            exit(0);
        }
        $check_table = $this->db->table_exists($table);
        if (!$check_table) {
            exit('not exist');
        }

        $res['columns_info'] = $this->_get_columns_info($table);

        unset($res['columns_info']['0']);

        if ($_POST) {
            $postdata = html_filter_array($_POST);
            //图片单独处理
            $upload_arr = array_keys($_FILES);

            foreach ($upload_arr as $key => $value) {
                if ($_FILES[$value]['name'] == '')
                    unset($postdata[$value]);//如果文件未上传就不更新这个字段
                else
                    $postdata[$value] = $this->Common->do_upload($value);
            }

            //富文本单独处理，无需处理，html_filter_array已经处理


            //时间格式单独处理
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['ctime'])) {
                $postdata['ctime'] = strtotime($postdata['ctime']);
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['start_time'])) {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['end_time'])) {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
            if (!empty($postdata['password']))
                $postdata['password'] = password_hash($postdata['password'], 1);

            $id = $this->Common->add($table, $postdata);
            //如果修改了id就跳转到新的id
            if ($id > 0) redirect("cead/manage_table/" . $table);

        }

        $data['res'] = $res;
        $data['table'] = $table;

        $this->load->view("cead/edit_row", $data);
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：查看表内的单条记录的详情
     ** 参数：table名称，id记录的主键
     **/
    public function show_row($table = '', $id = '')
    {
        if (empty($table) || empty($id)) {
            exit(0);
        }
        $check_table = $this->db->table_exists($table);
        if (!$check_table) {
            exit('not exist');
        }

        $res['columns_info'] = $this->_get_columns_info($table);

        $res['all_data'] = $this->Common->get_one($table, "id = '$id'");

        $data['res'] = $res;
        $data['table'] = $table;

        $this->load->view("cead/show_row", $data);
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：删除表内的单条记录
     ** TODO：删除后跳转到对应分页
     ** 参数：table名称，id记录的主键
     **/
    public function delete_row($table = '', $id = '')
    {
        if (empty($table) || empty($id)) {
            exit('no id or no table');
        }
        $check_table = $this->db->table_exists($table);
        if (!$check_table) {
            exit('not exist');
        }

        $if_show = $this->db->field_exists('if_show', $table);
        if (!$if_show) {
            $res = $this->Common->delete($table, array('id' => $id));
        } else {
            $res = $this->Common->update($table, array('id' => $id), array('if_show' => 0));
        }
        $_SESSION['save_message'] = '删除成功';

        redirect('cead/manage_table/' . $table);
    }


    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：自动生成代码文档，函数，注释，参数说明
     ** TODO：
     ** 参数：
     **/
    public function all_code($table = '', $id = '')
    {
        $this->load->helper('directory');

        $map = directory_map('./application/');
        //获得目录结构
        $data['res'] = $this->_get_map_comment($map);
        //根据目录结构读取相关文件的头部注释，并写入数组

        $this->load->view("cead/all_code", $data);
    }

    /**
     *
     * 作者：杨国良
     * 时间:2015年10月19日07:04:21
     * TODO：记录管理日志
     *
     **/
    private function _save_admin_log($admin_uid,$action){
        $this->Common->add($this->admin_log_table, array('admin_uid' => $admin_uid,
            'action' => $action, 'ctime' => time(), 'ip' => $this->input->ip_address()));
        return TRUE;
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：读取关键的目录里面文件
     ** TODO：
     ** 参数：
     **/
    private function _get_map_comment($map = '')
    {
        //print_r($map);exit;
        $core_dir = array("controllers/", "models/", "views/", "helpers/", "core/");
        $map2 = array();
        foreach ($map as $key => $value) {

            $key_in = str_replace("\\", "/", $key);
            if (in_array($key_in, $core_dir)) {

                foreach ($value as $key2 => $value2) {
                    $file = './application/' . $key_in . $value2;


                    if (is_file($file)) {

                        $map2[$key_in][$key2]['file_name'] = $value2;
                        $map2[$key_in][$key2]['comment'] = $this->_read_file_comment($file);

                    } else {
                        $key_in2 = str_replace("\\", "/", $key2);
                        $file = './application/' . $key_in . $key_in2;
                        $arr_map = array();
                        $map_arr = directory_map($file);

                        foreach ($map_arr as $key => $value) {
                            $arr_map[$key_in][$key] = $key_in2 . $value;
                        }
                        if (!empty($arr_map))
                            $map2[$key_in][$key2]['sub'] = $this->_get_map_comment($arr_map);


                    }
                }

            }
        }
        return $map2;
    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：读取文件头注释
     ** TODO：
     ** 参数：
     **/
    private function _read_file_comment($file = '')
    {
        if (empty($file)) return '';
        $this->load->helper('file');

        $contents = read_file($file);
        //print_r($contents);exit;
        preg_match("/\/\*\*[^\/]*\*\*\//i", $contents, $arr);
        return (str_replace(array("**", "/"), "", $arr[0]));

    }

    /**
     ** 作者:杨国良
     ** QQ：552361127
     ** 创建时间：2015年10月4日22:40:31
     ** 目的：读取文件的函数以及注释
     ** TODO：
     ** 参数：
     **/
    public function show_code($file)
    {
        if (empty($file)) exit('no file');
        $file = "./application/" . $file;
        $file = str_replace("-", "/", $file);
        $data['file'] = $file;
        $this->load->helper('file');
        $contents = read_file($file);
        preg_match_all("|\/\*\*([^\/]*)\*\*\/[^\/]*function ([^\)]*\([^\)]*\))|i", $contents, $arr);
        $data['res']['function_name'] = $arr[2];
        $data['res']['comment'] = str_replace("**", "", $arr[1]);
        log_message('info', 'test');
        $this->load->view("cead/show_code", $data);
    }

	/**
	*	@列表
	*	@参数 ： table -> 表名, start -> 分页
	*	@ yinting
	*	@ 2016-05-27
	**/
    public function lists($table = '', $start = 0)
    {
        if( empty($table) ) 
		{
            exit('empty table');
        }
		if( $_GET['clear'] )
		{
			unset($_SESSION['search']);
		}
        $check_table = $this->db->table_exists( $table );
        if( !$check_table ) 
		{
            exit('table is not exist');
        }
        // get table column info
        $column = $this->_get_columns_info($table);

        $like = array();
        // search condition
        if ($_POST) 
        {
            $postdata = html_filter_array($_POST);
            foreach( $postdata as $key=>$value )
            {
                if(!empty($value) && preg_match("/^\w[\w\_]*\w$/i",$key))
                {
                	$_SESSION['search'][$key] = $like[$key] = $value;
                }
            }
        } 
		elseif( $_SESSION['search'] )
		{
			$search = $_SESSION['search'];
			foreach( $search as $key => $value )
			{
                if(!empty($value) && preg_match("/^\w[\w\_]*\w$/i",$key))
                {
                	$_SESSION['search'][$key] = $like[$key] = $value;
                }				
			}
		}
		
		$viewdata['search'] = $like;
       // where condition
/*        $where = array(
        	'if_show' => 1,
        	);*/
		$where = array(
			1=>1,
			);
		$if_show = $this->db->field_exists('if_show', $table);	
        if( $if_show ) 
        {
			$where['if_show'] = 1;
		}			
        $data = $this->Common->get_limit_order( $table, $where, $start, $this->per_page,'ctime','DESC',$like);
        $total = $this->Common->get_count( $table, $where, $like );
        $config = array(
            'uri_segment' => 4,
            'base_url' => site_url('cead/lists/' . $table . '/'),
            'per_page' => $this->per_page,
            'total_rows' => $total,
        );
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();        
		if( $table == 'bc_admin_users' )
		{
			$access = $this->Common->get_limit_order( 'bc_admin_access',array(1=>1));
			foreach( $data as $key => $value )
			{
				if( $value['access'] != 'all' )
				{
					$user_access = explode(',',$value['access']);
			
					foreach( $access as $val )
					{
						if( in_array($val['id'],$user_access) )
						{
							
							$data[$key]['access_name'] .= $val['access_name'].'  ';
						}
					}
				}
			}			
		}
				
        $viewdata['data'] = $data;
        $viewdata['column']	= $column;
        $viewdata['pagination'] = $pagination;
        $viewdata['table'] = $table;
		$viewdata['table_info'] = $this->_get_table_info($table);

        $this->load->view("cead/lists", $viewdata);

    }
	
	/**
	*	@ add new record
	*	@ parameter : -
	*	@ author : yinting
	*	@ date : 2016-05-23
	**/
	public function add( $table = '' )
	{
        if( empty($table) ) 
        {
			exit('empty table');
        }
        //check table exist
        $check_table = $this->db->table_exists($table);
        if(!$check_table) 
        {
            exit('table is not exist');
        }

        $column = $this->_get_columns_info($table);
        unset($column['0']);

        if ($_POST) 
        {
			//去除图片的宽高设置
			preg_match_all('/<img(.*?)>/', $_POST['content'], $match);		
			$imgs = $match[0];			
			//取出img标签的width height属性
			foreach( $imgs as $k => $v )
			{
				preg_match('/<img.+(height=\"?\d*\"?).+>/i', $v, $res);
				$arr[$k]['height'] = $res[1];
				preg_match('/<img.+(width=\"?\d*\"?).+>/i', $v, $res);
				$arr[$k]['width'] = $res[1];
			}
			foreach( $arr as $key => $value )
			{
				$_POST['content'] = str_replace($value,'',$_POST['content']);
			}
						
            $postdata = html_filter_array($_POST);

            //图片单独处理
            $upload_arr = array_keys($_FILES);

            foreach ($upload_arr as $key => $value)
			{
                if ($_FILES[$value]['name'] == '')
				{
                    unset($postdata[$value]);//如果文件未上传就不更新这个字段
				}
                else
				{
                    $postdata[$value] = $this->Common->do_upload($value);
				}
            }
//print_r($postdata);exit;			

            //filter empty p tag
            if( $postdata['content'])
            {
				$postdata['content'] = str_replace('&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','',$postdata['content']);
				$postdata['content'] = str_replace('&lt;p&gt;								&lt;/p&gt;','',$postdata['content']);	            	
            }

            //format time 
            if(preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['ctime'])) 
            {
                $postdata['ctime'] = strtotime($postdata['ctime']);
            }
            if(preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['start_time'])) 
            {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
            if(preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['end_time'])) 
            {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
		
            if(!empty($postdata['password']))
            {
            	$postdata['password'] = password_hash($postdata['password'], 1);
            }   
			if( $table == 'bc_admin_users' )
			{
				unset($postdata['image']);
				if( $postdata['all_access'] == 1 )
				{
					$postdata['access'] = 'all';
				}
				else
				{		
					if( !in_array(4,$postdata['access']) )
						$postdata['access'][] = 4;	
					if( !in_array(5,$postdata['access']) )
						$postdata['access'][] = 5;	
					if( !in_array(6,$postdata['access']) )
						$postdata['access'][] = 6;													
					$postdata['access'] = implode(',',$postdata['access']);				
				}
				unset($postdata['all_access']);

				$postdata['last_login'] = strtotime($postdata['last_login'].date('H:i:s'));
			
			}				             

            $id = $this->Common->add($table, $postdata);
            //success
            if($id > 0) 
            {
				$_SESSION['msg'] = '保存成功';
            	redirect("cead/lists/" . $table);
            }
            else
            {
				$_SESSION['msg'] = '保存失败，请重试';
            	$viewdata['data'] = $postdata;
            }

        }
		if( $table == 'bc_admin_users' )
		{
			$viewdata['access'] = $this->Common->get_limit_order( 'bc_admin_access', array('if_show'=>1),'','','list_num','DESC' );
		}			
		$viewdata['table_info'] = $this->_get_table_info($table);
        $viewdata['column'] = $column;
        $viewdata['table'] = $table;
        $this->load->view("cead/edit", $viewdata);
	
	}
	
	/**
	*	@ edit new record
	*	@ parameter : table -> table name, id -> edit record's id
	*	@ author : yinting
	*	@ date : 2016-05-23
	**/	
    public function edit( $table = '', $id = '')
    {
        if( empty($table) || empty($id) ) 
        {
			exit('empty table or id');
        }
        //check table exist
        $check_table = $this->db->table_exists($table);
        if(!$check_table) 
        {
            exit('table is not exist');
        }

        $column = $this->_get_columns_info($table);
        $id = (int)$id;
        
        if( $_POST ) 
        {		
			//去除图片的宽高设置
			preg_match_all('/<img(.*?)>/', $_POST['content'], $match);		
			$imgs = $match[0];			
			//取出img标签的width height属性
			foreach( $imgs as $k => $v )
			{
				preg_match('/<img.+(height=\"?\d*\"?).+>/i', $v, $res);
				$arr[$k]['height'] = $res[1];
				preg_match('/<img.+(width=\"?\d*\"?).+>/i', $v, $res);
				$arr[$k]['width'] = $res[1];
			}
			foreach( $arr as $key => $value )
			{
				$_POST['content'] = str_replace($value,'',$_POST['content']);
			}
//print_r($_POST['content']);exit;		
            $postdata = html_filter_array($_POST);
            $postdata['id'] = (int)$postdata['id'];

            //图片单独处理
            $upload_arr = array_keys($_FILES);

            foreach ($upload_arr as $key => $value)
			{
                if ($_FILES[$value]['name'] == '')
				{
                    unset($postdata[$value]);//如果文件未上传就不更新这个字段
				}
                else
				{
                    $postdata[$value] = $this->Common->do_upload($value);				
				}
            }


            if( $postdata['content'])
            {
				$postdata['content'] = str_replace('&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','',$postdata['content']);
				$postdata['content'] = str_replace('&lt;p&gt;								&lt;/p&gt;','',$postdata['content']);	            	
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['ctime'])) {
                $postdata['ctime'] = strtotime($postdata['ctime']);
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['start_time'])) {
                $postdata['start_time'] = strtotime($postdata['start_time']);
            }
            if (preg_match("/\d{4}\-\d{2}\-\d{2}\s\d{2}:\d{2}:\d{2}/i", $postdata['end_time'])) {
                $postdata['end_time'] = strtotime($postdata['end_time']);
            }
            if (!empty($postdata['password']) && !empty($postdata['if_update_password']))
            {
            	$postdata['password'] = password_hash($postdata['password'], 1);
         		unset($postdata['if_update_password']);
        	}
			
			if( $table == 'bc_admin_users' )
			{
				unset($postdata['image']);
				if( $postdata['all_access'] == 1 )
				{
					$postdata['access'] = 'all';
				}
				else
				{		
					if( !in_array(4,$postdata['access']) )
						$postdata['access'][] = 4;	
					if( !in_array(5,$postdata['access']) )
						$postdata['access'][] = 5;	
					if( !in_array(6,$postdata['access']) )
						$postdata['access'][] = 6;													
					$postdata['access'] = implode(',',$postdata['access']);				
				}
				unset($postdata['all_access']);

				$postdata['last_login'] = strtotime($postdata['last_login'].date('H:i:s'));
			
			}			

            $res = $this->Common->update($table, array('id' => $id), $postdata);
            //如果修改了id就跳转到list页面
            if( $res )
            {
				$_SESSION['msg'] = '修改成功';				
	            redirect('cead/lists/'.$table);
            }
            else
            {
				$_SESSION['msg'] = '修改失败，请重试';
            	$viewdata['data'] = $postdata;
            }            
        }
        else
        {
        	$where = array(        		
        		'id' => $id,
        		);
			$if_show = $this->db->field_exists('if_show', $table);	
			if( $if_show ) 
			{
				$where['if_show'] = 1;
			}				
        	$viewdata['data'] = $this->Common->get_one( $table, $where );
        }
		if( $table == 'bc_admin_users' )
		{
			$viewdata['access'] = $this->Common->get_limit_order( 'bc_admin_access', array('if_show'=>1),'','','list_num','DESC' );
		}			

        $viewdata['column'] = $column;
        $viewdata['table'] = $table;
		$viewdata['table_info'] = $this->_get_table_info($table);
		
        $this->load->view("cead/edit", $viewdata);
    }

	/**
	*	@ show record
	*	@ parameter : table -> table name, id -> show record's id
	*	@ author : yinting
	*	@ date : 2016-05-23
	**/	
    public function show( $table = '', $id = '')
    {
        if( empty($table) || empty($id) ) 
        {
			exit('empty table or id');
        }
        //check table exist
        $check_table = $this->db->table_exists($table);
        if(!$check_table) 
        {
            exit('table is not exist');
        }

        $column = $this->_get_columns_info($table);
        $where = array(
        	'id' => $id,
        	);
		$if_show = $this->db->field_exists('if_show', $table);	
        if( $if_show ) 
        {
			$where['if_show'] = 1;
		}
        $data = $this->Common->get_one( $table, $where );

        $viewdata['column'] = $column;
        $viewdata['data'] = $data;
        $viewdata['table'] = $table;

        $this->load->view("cead/show", $viewdata);
    }

	/**
	*	@ delete record
	*	@ parameter : table -> table name, id->delete record's id
	*	@ author : yinting
	*	@ date : 2016-05-23
	**/	
    public function delete( $table = '', $id = '' )
    {
        if( empty($table) || empty($id) ) 
        {
			exit('empty table or id');
        }
        //check table exist
        $check_table = $this->db->table_exists($table);
        if(!$check_table) 
        {
            exit('table is not exist');
        }

        $if_show = $this->db->field_exists('if_show', $table);
        $where = array(
        	'id' => $id,
        	);
        if (!$if_show) 
        {
            $res = $this->Common->delete( $table,$where );
        } 
        else 
        {
            $res = $this->Common->update($table, $where, array('if_show' => 0));
        }
		if( $res )
		{
			$_SESSION['msg'] = '删除成功';
		}
		else
		{
			$_SESSION['msg'] = '删除失败，请重试';
		}
        //$_SESSION['list_msg'] = '删除成功';

        redirect('cead/lists/' . $table);
    }
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */