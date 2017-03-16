<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cron extends Application {

    public function __construct() {
        parent::__construct();
    }

    function sendmail() {
        $all_email = $this->Common->get_limit_order($this->email_list_table,array('if_sent'=>0),0,10);
        foreach ($all_email as $key => $value) {
           $res =  $this->Common->run_send_email($value['receiver'],$value['title'],htmlspecialchars_decode($value['content']));
           if($res=='success'){
            $this->Common->update($this->email_list_table,array('id'=>$value['id']),array('if_sent'=>1,'sent_time'=>time(),'otherinfo'=>$res));
          
           }else{
            $this->Common->update($this->email_list_table,array('id'=>$value['id']),array('if_sent'=>-1,'sent_time'=>time(),'otherinfo'=>$res));
        
           }

        }
        echo 'hh ' . count($all_email);exit;
    }

    
    

}
