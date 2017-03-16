    <!-- 底部================================================== -->
    <div class="bottom">
        <!-- <a class="home off" href="/"><i></i>首页</a> -->
         <?php if($_SESSION['gr_type']!=1){;?>
         <style>
             .bottom a {
                width: 33.3% !important;
             }
         </style>
         <a class="activity <?php if( ($this->uri->segment(2)=='' && $this->uri->segment(1) == 'main' )||$this->uri->segment(2)=='info_detail' ):?>on<?php else:?>off<?php endif;?>" href="/"><i></i>活动</a>
        
             <a class="list <?php if( $this->uri->segment(2)=='student'):?>on<?php else:?>off<?php endif;?>" href="/main/student/"><i></i>大使</a>
        <!--<a class="news off" href="/Message/center.html"><i></i>消息</a>-->
        <a class="mine <?php if( $this->uri->segment(1)=='user'):?>on<?php else:?>off<?php endif;?>" href="/user"><i></i><span class=""></span>我的</a>
        <?php };?> 

       
        <!--<a class="special off" href="/Special/index.html"><i></i>专题</a>-->



    <?php if($_SESSION['gr_type']==1){;?>
        
         <a class="activity <?php if( ($this->uri->segment(2)=='' && $this->uri->segment(1) == 'main' )||$this->uri->segment(2)=='info_detail' ):?>on<?php else:?>off<?php endif;?>" href="/"><i></i>Active</a>

        <a class="release <?php if( $this->uri->segment(2)=='post' || $this->uri->segment(2) == 'postinfo' ):?>on<?php else:?>off<?php endif;?>" href="/main/post"><i style="background-size: auto 0.52rem;"></i>Start</a>

                   <a class="list <?php if( $this->uri->segment(2)=='student'):?>on<?php else:?>off<?php endif;?>" href="/main/student/"><i></i>Ambassador</a>
        <!--<a class="news off" href="/Message/center.html"><i></i>消息</a>-->
        <a class="mine <?php if( $this->uri->segment(1)=='user'):?>on<?php else:?>off<?php endif;?>" href="/user"><i></i><span class=""></span>Mine</a>

     <?php };?>   
   
    </div>