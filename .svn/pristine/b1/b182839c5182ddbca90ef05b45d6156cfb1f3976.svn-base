<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title><?php echo $title ? $title.'-' : '';?><?php echo $this->config->item('site_name');?></title>
    <meta name="description" content="<?php echo $this->config->item('description');?>">

    <link rel="stylesheet" href="/statics/mobile/css/resest.css">
    <link rel="stylesheet" href="/statics/mobile/css/swiper.min.css">
    <link rel="stylesheet" href="/statics/mobile/css/style.css">
    <script src="/statics/mobile/js/jquery.min.js"></script>
    <script src="/statics/mobile/js/html5.js"></script>
    <script src="/statics/mobile/js/swiper.min.js"></script>
    <script src="/statics/mobile/js/main.js"></script>
    <script>
        document.querySelector('html').style.fontSize = document.documentElement.clientWidth / 320 * 50 + 'px';
    </script>
	<script> var _hmt = _hmt || []; (function() { var hm = document.createElement("script"); hm.src = "//hm.baidu.com/hm.js?9ebe2a5719dead2bea381925f1a823a8"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s); })(); </script>    
</head>
<body>
<header>
    <nav>
        <ul class="nav">
            <li>
                <a class="none" href="javascript:;">公司介绍</a>
                <ul class="sub_nav">
                    <li><a href="/main/aboutus/1">公司简介</a></li>
                    <li><a href="/main/aboutus/2">董事长致辞</a></li>
                    <li>
                        <a href="javascript:;">专家团队</a>
                        <?php if( $expert ):?>
                            <ul class="sub_sub_nav">
                                <?php foreach( $expert as $key => $value ):?>
                                    <li><a href="/main/intro/<?php echo $value['id'];?>"><?php echo $value['name'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                    <li><a href="/main/aboutus/3">企业文化</a></li>
                    <li><a href="/main/aboutus/4">企业风采</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">业务体系</a>

                <ul class="sub_nav">
                    <li>
                        <a href="javascript:;">iPSC常识</a>
<!--                        <a href="/main/ipsc/">iPSC常识</a>-->
                        <?php if( $ipsc ):?>
                            <ul class="sub_sub_nav">
                                <?php foreach( $ipsc as $key => $value ):?>
                                    <li><a href="/main/show/<?php echo $value['id'];?>"><?php echo $value['title'] == '诱导多功能干细胞（iPSC）' ? '了解iPSC' : $value['title'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                    <li>
                        <a href="javascript:;">核心技术</a>
<!--                        <a href="/main/core/1">核心技术</a>-->
                        <?php if( $technology ):?>
                            <ul class="sub_sub_nav">
                                <?php foreach( $technology as $key => $value ):?>
                                    <li><a href="/main/service/1/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                    <li>
                        <a href="javascript:;">产品和服务</a>
<!--                        <a href="/main/core/2">产品和服务</a>-->
                        <?php if( $service ):?>
                            <ul class="sub_sub_nav">
                                <?php foreach( $service as $key => $value ):?>
                                    <li><a href="/main/service/2/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                </ul>
            </li>
          <!--  <li>
                <a href="javascript:;">产品和服务</a>
                <?php /*if( $technology ):*/?>
                    <ul class="sub_nav">
                        <?php /*foreach( $service as $key => $value ):*/?>
                            <li><a href="/main/service/2/<?php /*echo $value['id'];*/?>"><?php /*echo $value['title'];*/?></a></li>
                        <?php /*endforeach;*/?>
                    </ul>
                <?php /*endif;*/?>

            </li>-->
            <li>
                <a href="javascript:;">新闻动态</a>
                <ul class="sub_nav">
                    <li><a href="/main/news/1?data=1" >公司新闻</a></li>
                    <li><a href="/main/news/2?data=2">行业新闻</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">合作交流</a>
                <ul class="sub_nav">
                    <li><a href="/main/partner">合作伙伴</a></li>
                    <li><a href="/main/cases">案例鉴赏</a></li>
                    <li><a href="/main/question">常见问题</a></li>
                    <li><a href="/main/download">下载中心</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">联系我们</a>
                <ul class="sub_nav">
                    <li><a href="/main/contact">联系我们</a></li>
                    <li><a href="/main/job">招聘信息</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <img class="fl nav-button" src="/statics/img/nav-icon.png" alt="" onclick="location.href='/'">
    <img class="fr menu" src="/statics/img/menu1.png" alt="">



