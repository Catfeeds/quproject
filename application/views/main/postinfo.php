
<?php $this->load->view("header");?>
	<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
	<link rel="stylesheet" href="/statics/css/cell.css">
	<link rel="stylesheet" href="/statics/css/example.css">
	<link rel="stylesheet" href="/statics/css/mobiscroll.css">
	<link rel="stylesheet" href="/statics/css/LArea.min.css">
	<script src="/statics/js/router.min.js"></script>
	<script src="/statics/js/release.js"></script>
	<script src="/statics/js/mobiscroll_1.js"></script>
	<script src="/statics/js/mobiscroll.js"></script>
	<script src="/statics/js/LArea.js"></script>

	<link href="/statics/css/ueditor.css" type="text/css" rel="stylesheet">

	<script src="/statics/js/codemirror.js" type="text/javascript" defer="defer"></script>

	<link rel="stylesheet" type="text/css" href="/statics/css/codemirror.css">

	<script src="/statics/js/ZeroClipboard.js" type="text/javascript" defer="defer"></script>
	<script type="text/javascript" charset="utf-8" src="/statics/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/statics/js/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/statics/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<body style="background-color: rgb(239, 239, 244);">
	<div class="wrap">
	<div class="container" id="container"></div>
			


	<div class="container" id="home">
		<div class="header">
	<a class="goback" href="javascript:history.go(-1)"><p></p></a>
	<p class="header_title">Publish events</p>
	<div class="menu"><!--<a href="/"><i class="fa fa-home fa-fw fr"></i></a>--><i class="fa fa-bars fr"></i></div>
</div>
<div class="headerfull"></div>



		<form action="" method="post" name="form1" id="myform" >
			<input type="hidden" name="business_type" id="business_type" value="5">
			<div class="release">
				<div class="control">
					
					<div class="control_text first">
						<p class="field">Theme:</p>
						<input type="text" name="title" id="proname" value="" placeholder="">
					</div>
				</div>
					
				<div class="control">
					<div class="control_text first">
						<p class="field">City:</p>
						<input type="text" id="chosecity" readonly placeholder="Please choose the city">
						<input type="hidden" id="city" name="city" value="1">
						<input type="hidden" id="province" value="1">
					</div>
					<div class="control_text">
						<p class="field">Location:</p>
						<input type="text" name="address" id="address" placeholder="">
					</div>
				</div>
				<div class="control">
					<div class="control_cover">
						<p class="field">Poster:</p>
						<div class="cover_wrap">
							<a class="pic-inner" href="#/uploadbox">
								<div id="file_box"></div>
							</a>
							<div class="fa uploadbtn"><span>Upload poster</span></div>
							<input type="hidden" name="image" id="cover" value="">
						</div>
					</div>
				</div>
				
				<div class="control">
					<div class="control_text first">
						<p class="field">Start:</p>
						<input class="" readonly="" name="start_time" id="begintime" type="text">
					</div>
					<div class="control_text">
						<p class="field">End:</p>
						<input class="" readonly="" name="end_time" id="overtime" type="text">
					</div>
				</div>
			    <div class="control">
								    	
					<div class="control_text">
						<p class="field">Paying:</p>
						<label><input class='radioninput' type="radio" name="type"  value='2'>Free</label>
						<label><input class='radioninput' type="radio" name="type" value='1' checked>Paid</label>
					</div>

				<script type="text/javascript">
						$('.radioninput').click(function(){
							var val=$(this).val();
							if(val==2){
								$('#price').val(10);
								$('#price').parent().hide();

							}else{
								$('#price').parent().show();
							}
						})


				</script>

			    </div>
				<div class="control">
					<div class="control_text first">
						<p class="field">Number:</p>
						<input id="num" name="demand_num" class="input_volunteer" type="number" placeholder="">
					</div>
					<div class="control_text">
						<p class="field" style="width:3.6rem;">Price:</p>
						<input  id="price" name="single_price" class="input_volunteer" type="number">
						<span style='right:0;display: none;' class="price">total：<span id="total">0</span>¥</span>
					</div>
				</div>

				<h2>Description:</h2>
				<div class="control">
					<div class="control_textarea" style="overflow: hidden;">
						<!--<textarea name="introduce" id="introduce" rows="" cols=""></textarea>-->
						<input type="hidden" name="details" id="introduce" value="">
						<div id="editor" class="edui-default" style="width: 100%;padding-top:.1rem;">
						</div>
						<!-- <div class="textarea_tools">
							<label for="insert_pic"><input type="file" id="insert_pic" onchange="change('insert_pic')" title="插入图片"></label>
							<p>想收获更多围观，多传几张图试试。</p>
						</div> -->
					</div>
				</div>
				
				<h2 class="xieyi" style="font-size:0.3rem;display: none;">
					<input type="checkbox" name="checkbox" id="checkbox" checked="checked">
					<label class="fa fa-check-square-o" for="checkbox"></label>
					I have read and agree
					<a class="a_box" target="_blank">《quguoren service agreement》</a>
				</h2>

				
				<button type="button" class="submit-btn" id="submit-btn">release</button>

				<div class="box" style="display:none;">
					<div class="close_btn fa fa-close"></div>
					<div class="bg-box">
						<h2 style="font-size:0.4rem; color:#333;text-align:center;margin: 0;">服务协议</h2>
						<div style="font-size:0.35rem;line-height:0.8rem;text-align: justify;">
							<p>欢迎您使用趣果仁的服务！</p>
							<p>为保障您使用趣果仁服务的质量，您应当阅读并遵守《趣果仁服务协议》（以下简称“本协议”）。请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款。限制、免责条款可能以黑体加粗形式提示您注意。
						</p><p>除非您已阅读并接受本协议所有条款，否则您无权使用趣果仁提供的服务。您使用趣果仁的服务即视为您已阅读并同意上述协议的约束。</p>
						<p>如果您未满18周岁，请在法定监护人的陪同下阅读本协议，并特别注意未成年人使用条款。用户使用趣果仁服务时应确认为具备相应民事行为能力的自然人、法人或其他组织。若用户不具备前述主体资格，则用户及用户的监护人应承担因此导致的一切后果，且趣果仁有权注销用户的账户，并可向用户及用户监护人索偿。</p>
						<h2>一、协议范围</h2>
						<p>1.1 本协议是您与趣果仁之间关于用户使用趣果仁相关服务所订立的协议。“趣果仁”是指武汉风媒花科技文化有限公司及其相关服务可能存在的运营关联单位。“用户”是指使用趣果仁相关服务的使用人，在本协议中更多地称为“您”。</p>
						<p>1.2 本协议项下的服务是指趣果仁向用户提供的包括但不限于即时通讯、网络媒体、互联网增值、互动娱乐、电子商务和广告等产品及服务 (以下简称"本服务")。</p>
						<p>1.3 本协议内容同时包括“隐私政策”。“隐私政策”主要指：用户使用趣果仁提供的任何服务包括但不限于发布信息，浏览信息，预约服务等将导致用户的微信号码及IP地址为趣果仁获得并在显示作为用户的身份标识，同时趣果仁将可能根据法律法规的规定向第三方提供该微信号码或IP地址，用户应对此表示知情并认可。用户使用趣果仁服务、参加趣果仁活动、访问趣果仁或使用私信聊天时，趣果仁自动接收并记录的用户浏览器传递给趣果仁服务器的数据。但使用趣果仁就意味着同意趣果仁将用户发帖时使用的IP地址及微信号显示出来作为身份标识，即用户IP地址及微信号不受本隐私权政策保护；用户在网络上公开的其他个人信息亦不受此保护；趣果仁不会向任何人出售或出借用户的个人信息，除非事先得到用户的许可；趣果仁亦不允许任何第三方以任何手段收集、编辑、出售、传播或披露用户的个人信息。任何用户如从事上述活动，一经发现，趣果仁将采取法律手段追究责任；为服务用户的目的，趣果仁可能通过使用用户的个人信息，向用户提供服务，包括但不限于向用户发出产品和服务信息，或者与趣果仁合作伙伴共享信息以便他们向用户发送有关其产品和服务的信息。用户的个人信息将在下述情况下部分或全部被披露： </p>
						<p>A．经用户同意用户已经预约第三方，向第三方披露；</p> 
						<p>B．如果用户是具备资格的知识产权投诉人并已提起投诉，应被投诉人要求而向被投诉人披露，以便双方处理可能的权利纠纷；</p> 
						<p>C．根据法律的有关规定，或者行政、司法机构的要求，向第三方或者行政、司法机构披露；如果用户出现违反中国有关法律或者网站政策的情况而需要向第三方披露； </p>
						<p>D.为提供用户所要求的产品和服务，而必须和第三方分享用户的个人信息； </p>
						<p>E.其它趣果仁依据法律或者网站政策认为合适的披露； </p>
						<p>在趣果仁上创建的某一分类信息交易中，如交易任何一方履行或部分履行了交易义务并提出信息披露请求的，趣果仁有权可以决定向该用户提供其交易对方的联络方式等必要信息，以促成交易的完成或纠纷的解决。上述内容一经正式发布，即为本协议不可分割的组成部分，您同样应当遵守。您对前述任何业务规则的接受，即视为您对本协议全部的接受。</p>
							<h2>二、账号与密码安全</h2>
						<p>2.1 您在使用趣果仁的服务时可能需要注册一个账号。</p>
						<p>2.2 趣果仁特别提醒您应妥善保管您的账号和密码。当您使用完毕后，应安全退出。因您保管不善可能导致遭受盗号或密码失窃，责任由您自行承担。</p>
						<h2>三、用户个人信息保护</h2>
						<p>3.1 保护用户个人信息是趣果仁的一项基本原则。趣果仁将按照本协议的规定收集、使用、储存和分享您的个人信息。</p>
						<p>3.2 您在注册账号或使用本服务的过程中，可能需要填写一些必要的信息。若国家法律法规有特殊规定的，您需要填写真实的身份信息。若您填写的信息不完整，则无法使用本服务或在使用过程中受到限制。用户应对其提供的信息的承担法律责任。</p>
						<p>3.3 一般情况下，您可随时浏览、修改自己提交的信息，但出于安全性和身份识别（如号码申诉服务）的考虑，您可能无法修改注册时提供的初始注册信息及其他验证信息。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供；以免用户信息被泄露或盗用的情况。
						</p><p>3.4 趣果仁将运用各种安全技术和程序建立完善的管理制度来保护您的个人信息，以免遭受未经授权的访问、使用或披露。</p>
						<p>3.5 趣果仁不会将您的个人信息转移或披露给任何非关联的第三方，除非： </p>
						<p>（1）相关法律法规或法院、政府机关要求； </p>
						<p>（2）为完成合并、分立、收购或资产转让而转移； </p>
						<p>（3）为提供您要求的服务所必需。</p>
						<p>3.6 趣果仁非常重视对未成年人个人信息的保护。若您是18周岁以下的未成年人，在使用趣果仁的服务前，应事先取得您家长或法定监护人（以下简称"监护人"）的书面同意。</p>
						<h2>四、使用方式</h2>
						<p>4.1 除非您与趣果仁另有约定，您同意本服务仅为您个人使用。
						</p><p>4.2 您应当通过趣果仁提供或认可的方式使用本服务。您依本协议条款所取得的权利不可转让。
						</p><p>4.3 您不得使用未经趣果仁授权的插件、外挂或第三方工具对本协议项下的服务进行干扰、破坏、修改或施加其他影响。
						</p><h2>五、按现状提供服务</h2>
						<p>您理解并同意，趣果仁的服务是按照现有技术和条件所能达到的现状提供的。趣果仁会尽最大努力向您提供服务，确保服务的连贯性和安全性；但趣果仁不能随时预见和防范法律、技术以及其他风险，包括但不限于不可抗力、病毒、木马、黑客攻击、系统不稳定、第三方服务瑕疵、政府行为等原因可能导致的服务中断、数据丢失以及其他的损失和风险。</p>
						<h2>六、自备设备</h2>
						<p>6.1您应当理解，您使用趣果仁的服务需自行准备与相关服务有关的终端设备（如手机、电脑、调制解调器等装置），并承担所需的费用（如电话费、上网费等费用）。</p>
						<p>6.2您理解并同意，您使用本服务时会耗用您的终端设备和带宽等资源。</p>
						<h2>七、广告</h2>
						<p>7.1 您同意趣果仁可以在提供服务的过程中自行或由第三方广告商向您发送广告、推广或宣传信息（包括商业与非商业信息），其方式和范围可不经向您特别通知而变更。</p>
						<p>7.2 趣果仁可能为您提供选择关闭广告信息的功能，但任何时候您都不得以本协议未明确约定或趣果仁未书面许可的方式屏蔽、过滤广告信息。</p>
						<p>7.3 趣果仁依照法律的规定对广告商履行相关义务，您应当自行判断广告信息的真实性并为自己的判断行为负责，除法律明确规定外，您因依该广告信息进行的交易或前述广告商提供的内容而遭受的损失或损害，趣果仁不承担责任。</p>
						<p>7.4 您同意，对趣果仁服务中出现的广告信息，您应审慎判断其真实性和可靠性，除法律明确规定外，您应对依该广告信息进行的交易负责。</p>
						<h2>八、收费服务</h2>
						<p>8.1 趣果仁提供的服务主要是免费的主播商务预约服务，此外趣果仁的部分服务是以收费方式提供的，如您使用收费服务，请遵守相关规则。</p>
						<p>8.2 趣果仁可能根据实际需要对收费服务的收费标准、方式进行修改和变更，趣果仁也可能会对部分免费服务开始收费。前述修改、变更或开始收费前，趣果仁将在相应服务页面进行通知或公告。如果您不同意上述修改、变更或付费内容，则应停止使用该服务。</p>
						<h2>九、第三方提供的产品或服务</h2>
						您在趣果仁平台上使用第三方提供的产品或服务时，除遵守本协议约定外，还应遵守第三方的用户协议。趣果仁和第三方对可能出现的纠纷在法律规定和约定的范围内各自承担责任。<p></p>
						<h2>十、基于软件提供服务</h2>
						<p>10.1 您在使用本服务的过程中可能需要下载软件，对于这些软件，趣果仁给予您一项个人的、不可转让及非排他性的许可。您仅可为访问或使用本服务的目的而使用这些软件。</p>
						<p>10.2 为了改善用户体验、保证服务的安全性及产品功能的一致性，趣果仁可能会对软件进行更新。您应该将相关软件更新到最新版本，否则趣果仁并不保证其能正常使用。</p>
						<p>10.3 趣果仁可能为不同的终端设备开发不同的软件版本，您应当根据实际情况选择下载合适的版本进行安装。您可以直接从趣果仁的网站上获取软件，也可以从得到趣果仁授权的第三方获取。如果您从未经趣果仁授权的第三方获取软件或与软件名称相同的安装程序，趣果仁无法保证该软件能够正常使用，并对因此给您造成的损失不予负责。</p>
						<p>10.4 除非趣果仁书面许可，您不得从事下列任一行为： </p>
						<p>（1）删除软件及其副本上关于著作权的信息； </p>
						<p>（2）对软件进行反向工程、反向汇编、反向编译，或者以其他方式尝试发现软件的源代码； </p>
						<p>（3）对趣果仁拥有知识产权的内容进行使用、出租、出借、复制、修改、链接、转载、汇编、发表、出版、建立镜像站点等；</p> 
						<p>（4）对软件或者软件运行过程中释放到任何终端内存中的数据、软件运行过程中客户端与服务器端的交互数据，以及软件运行所必需的系统数据，进行复制、修改、增加、删除、挂接运行或创作任何衍生作品，形式包括但不限于使用插件、外挂或非经趣果仁授权的第三方工具/服务接入软件和相关系统； </p>
						<p>（5）通过修改或伪造软件运行中的指令、数据，增加、删减、变动软件的功能或运行效果，或者将用于上述用途的软件、方法进行运营或向公众传播，无论这些行为是否为商业目的； </p>
						<p>（6）通过非趣果仁开发、授权的第三方软件、插件、外挂、系统，登录或使用趣果仁软件及服务，或制作、发布、传播非趣果仁开发、授权的第三方软件、插件、外挂、系统。</p>
						<h2>十一、知识产权声明</h2>
						<p>11.1 趣果仁在本服务中提供的内容（包括但不限于网页、文字、图片、音频、视频、图表等）的知识产权归趣果仁所有，用户在使用本服务中所产生的内容的知识产权归用户或相关权利人所有。</p>
						<p>11.2 除另有特别声明外，趣果仁提供本服务时所依托软件的著作权、专利权及其他知识产权均归趣果仁所有。</p>
						<p>11.3 趣果仁在本服务中所使用的 “趣果仁”形象、标语等商业标识，其著作权或商标权归趣果仁所有。</p>
						<p>11.4 上述及其他任何本服务包含的内容的知识产权均受到法律保护，未经趣果仁、用户或相关权利人书面许可，任何人不得以任何形式进行使用或创造相关衍生作品。</p>
						<h2>十二、用户违法行为</h2>
						<p>12.1您在使用本服务时须遵守法律法规，不得利用本服务从事违法违规行为，包括但不限于： </p>
						<p>（1）发布、传送、传播、储存危害国家安全统一、破坏社会稳定、违反公序良俗、侮辱、诽谤、淫秽、暴力以及任何违反国家法律法规的内容； </p>
						<p>（2）发布、传送、传播、储存侵害他人知识产权、商业秘密等合法权利的内容； </p>
						<p>（3）恶意虚构事实、隐瞒真相以误导、欺骗他人； </p>
						<p>（4）发布、传送、传播广告信息及垃圾信息；</p> 
						<p>（5）其他法律法规禁止的行为。</p>
						<p>12.2 如果您违反了本条约定，相关国家机关或机构可能会对您提起诉讼、罚款或采取其他制裁措施，并要求趣果仁给予协助。造成损害的，您应依法予以赔偿，趣果仁不承担任何责任。</p>
						<p>12.3 如果趣果仁发现或收到他人举报您发布的信息违反本条约定，趣果仁有权进行独立判断并采取技术手段予以删除、屏蔽或断开链接。同时，趣果仁有权视用户的行为性质，采取包括但不限于暂停或终止服务，限制、冻结或终止微信号码使用，追究法律责任等措施。</p>
						<p>12.4 您违反本条约定，导致任何第三方损害的，您应当独立承担责任；趣果仁因此遭受损失的，您也应当一并赔偿。</p>
						<h2>十三、遵守当地法律监管</h2>
						您在使用本服务过程中应当遵守当地相关的法律法规，并尊重当地的道德和风俗习惯。如果您的行为违反了当地法律法规或道德风俗，您应当为此独立承担责任。<p></p>
						<h2>十四、用户发送、传播的内容与第三方投诉处理</h2>
						<p>14.1 您通过本服务发送或传播的内容（包括但不限于网页、文字、图片、音频、视频、图表等）均由您自行承担责任。</p>
						<p>14.2 您发送或传播的内容应有合法来源，相关内容为您所有或您已获得权利人的授权。</p>
						<p>14.3 您同意趣果仁可为履行本协议或提供本服务的目的而使用您发送或传播的内容。</p>
						<p>14.4 如果趣果仁收到权利人通知，主张您发送或传播的内容侵犯其相关权利的，您同意趣果仁有权进行独立判断并采取删除、屏蔽或断开链接等措施。</p>
						<h2>十五、不可抗力及其他免责事由</h2>
						<p>15.1 您理解并同意，在使用本服务的过程中，可能会遇到不可抗力等风险因素，使本服务发生中断。不可抗力是指不能预见、不能克服并不能避免且对一方或双方造成重大影响的客观事件，包括但不限于自然灾害如洪水、地震、瘟疫流行和风暴等以及社会事件如战争、动乱、政府行为等。出现上述情况时，趣果仁将努力在第一时间与相关单位配合，及时进行修复，但是由此给您造成的损失趣果仁在法律允许的范围内免责。</p>
						<p>15.2 在法律允许的范围内，趣果仁对以下情形导致的服务中断或受阻不承担责任： </p>
						<p>（1）受到计算机病毒、木马或其他恶意程序、黑客攻击的破坏； </p>
						<p>（2）用户或趣果仁的电脑软件、系统、硬件和通信线路出现故障； </p>
						<p>（3）用户操作不当； </p>
						<p>（4）用户通过非趣果仁授权的方式使用本服务； </p>
						<p>（5）其他趣果仁无法控制或合理预见的情形。</p>
						<p>15.3 您理解并同意，在使用本服务的过程中，可能会遇到网络信息或其他用户行为带来的风险，趣果仁不对任何信息的真实性、适用性、合法性承担责任，也不对因侵权行为给您造成的损害负责。这些风险包括但不限于： </p>
						<p>（1）来自他人匿名或冒名的含有威胁、诽谤、令人反感或非法内容的信息； </p>
						<p>（2）因使用本协议项下的服务，遭受他人误导、欺骗或其他导致或可能导致的任何心理、生理上的伤害以及经济上的损失； </p>
						<p>（3）其他因网络信息或用户行为引起的风险。</p>
						<h2>十六、协议的生效与变更</h2>
						<p>16.1 您使用趣果仁的服务即视为您已阅读本协议并接受本协议的约束。</p>
						<p>16.2 趣果仁有权在必要时修改本协议条款。您可以在相关服务页面查阅最新版本的协议条款。</p>
						<p>16.3 本协议条款变更后，如果您继续使用趣果仁提供的软件或服务，即视为您已接受修改后的协议。如果您不接受修改后的协议，应当停止使用趣果仁提供的软件或服务。</p>
						<h2>十七、服务的变更、中断、终止</h2>
						<p>17.1 趣果仁可能会对服务内容进行变更，也可能会中断、中止或终止服务。</p>
						<p>17.2 </p>您理解并同意，趣果仁有权自主决定经营策略。在趣果仁发生合并、分立、收购、资产转让时，趣果仁可向第三方转让本服务下相关资产；趣果仁也可在单方通知您后，将本协议下部分或全部服务转交由第三方运营或履行。具体受让主体以趣果仁通知的为准。<p></p>
						<p>17.3如发生下列任何一种情形，趣果仁有权不经通知而中断或终止向您提供的服务： </p>
						<p>（1）根据法律规定您应提交真实信息，而您提供的个人资料不真实、或与注册时信息不一致又未能提供合理证明； </p>
						<p>（2）您违反相关法律法规或本协议的约定； </p>
						<p>（3）按照法律规定或主管部门的要求； </p>
						<p>（4）出于安全的原因或其他必要的情形。</p>
						<p>17.4 趣果仁有权按本协议8.2条的约定进行收费。若您未按时足额付费，趣果仁有权中断、中止或终止提供服务。</p>
						<p>17.5 您有责任自行备份存储在本服务中的数据。如果您的服务被终止，趣果仁可以从服务器上永久地删除您的数据,但法律法规另有规定的除外。服务终止后，趣果仁没有义务向您返还数据。</p>
						<h2>十八、管辖与法律适用</h2>
						<p>18.1 本协议签订地为中华人民共和国北京市朝阳区。</p>
						<p>18.2 本协议的成立、生效、履行、解释及纠纷解决，适用中华人民共和国大陆地区法律（不包括冲突法）。</p>
						<p>18.3 若您和趣果仁之间发生任何纠纷或争议，首先应友好协商解决；协商不成的，您同意将纠纷或争议提交本协议签订地有管辖权的人民法院管辖。</p>
						<p>18.4 本协议所有条款的标题仅为阅读方便，本身并无实际涵义，不能作为本协议涵义解释的依据。</p>
						<p>18.5 本协议条款无论因何种原因部分无效或不可执行，其余条款仍有效，对双方具有约束力。</p>
						<h2>十九、未成年人使用条款</h2>
						<p>19.1 若用户未满18周岁，则为未成年人，应在监护人监护、指导下阅读本协议和使用本服务。</p>
						<p>19.2 未成年人用户涉世未深，容易被网络虚象迷惑，且好奇心强，遇事缺乏随机应变的处理能力，很容易被别有用心的人利用而又缺乏自我保护能力。因此，未成年人用户在使用本服务时应注意以下事项，提高安全意识，加强自我保护：</p> 
						<p>（1）在监护人的指导下，学习正确使用网络； </p>
						<p>（2）在接到邀约或自行报名时征求家长意见； </p>
						<p>（3）避免与陌生人随意见面，线下面试时由家长陪同。</p>
						<p>19.3 监护人、学校均应对未成年人使用本服务时多做引导。特别是家长应关心子女的成长，注意与子女的沟通，指导子女上网应该注意的安全问题，防患于未然。</p>
						<h2>二十、其他</h2>
						<p>如果您对本协议或本服务有意见或建议，可与趣果仁客户服务部门联系（ 18602720009 ），我们会给予您必要的帮助。</p>
					</div>
					
					<h3 style="text-align:right; padding-top:1rem; padding-bottom:2.2rem;color:#333;font-size:0.4rem;">Beijing fruit and nuts Network Information Technology Co., Ltd</h3>
				</div>
				</div>
			</div>
			
		</form></div>
		<div id="remref" style="width:100%;height:0.8rem;display:none;"></div>
			
		
	</div>


	<!-- 选择城市-->
	<div class="gearArea" id="gearArea" style="display:none;">
		<div class="area_ctrl slideInUp">
			<div class="area_btn_box">
				<div class="area_btn larea_cancel">cancel</div>
				<div class="area_btn larea_finish">confirm</div>
			</div>
			<div class="area_roll_mask">
				<div class="area_roll">
					<div>
						<div class="gear area_province" data-areatype="area_province" val="0" data-len="35" top="0" style="transform: translate3d(0px, 0px, 0px); transition-duration: 200ms;">
							<div class="tooth" ref="1">全国</div>
							<div class="tooth" ref="2195">海外</div>
							<div class="tooth" ref="52">北京市</div>
							<div class="tooth" ref="343">天津市</div>
							<div class="tooth" ref="10">河北省</div>
							<div class="tooth" ref="23">山西省</div>
							<div class="tooth" ref="19">内蒙古自治区</div>
							<div class="tooth" ref="18">辽宁省</div>
							<div class="tooth" ref="15">吉林省</div>
							<div class="tooth" ref="12">黑龙江省</div>

							<div class="tooth" ref="321">上海市</div>
							<div class="tooth" ref="16">江苏省</div>
							<div class="tooth" ref="31">浙江省</div>
							<div class="tooth" ref="3">安徽省</div>
							<div class="tooth" ref="4">福建省</div>
							<div class="tooth" ref="17">江西省</div>
							<div class="tooth" ref="22">山东省</div>
							<div class="tooth" ref="11">河南省</div>
							<div class="tooth" ref="13">湖北省</div>
							<div class="tooth" ref="14">湖南省</div>
							<div class="tooth" ref="6">广东省</div>
							<div class="tooth" ref="7">广西壮族自治区</div>
							<div class="tooth" ref="9">海南省</div>
							<div class="tooth" ref="394">重庆市</div>
							<div class="tooth" ref="26">四川省</div>
							<div class="tooth" ref="8">贵州省</div>
							<div class="tooth" ref="30">云南省</div>
							<div class="tooth" ref="28">西藏自治区</div>
							<div class="tooth" ref="24">陕西省</div>
							<div class="tooth" ref="5">甘肃省</div>
							<div class="tooth" ref="21">青海省</div>
							<div class="tooth" ref="20">宁夏回族自治区</div>
							<div class="tooth" ref="29">新疆维吾尔自治区</div>
							<div class="tooth" ref="35">台湾省</div>
							<div class="tooth" ref="33">香港特别行政区</div>
							<div class="tooth" ref="34">澳门特别行政区</div>
						</div>
						<div class="area_grid"></div>
					</div>
					<div>
						<div class="gear area_city" data-areatype="area_city" val="180" data-len="0">
							<div class="tooth"></div>
						</div>
						<div class="area_grid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<script type="text/html" id="tpl_home"></script>
		<script type="text/html" id="tpl_uploadbox">
			<div class="tpl_uploadbox">
				<div class="file_box">
					<label class="file_btn clear" id="uploade_btn" for="file">
						<span class="box_l"><i class="fa fa-plus" style="display: block;height: 1.2rem;margin-top: 0.4rem;font-size: 1.35rem;"></i></span>
						<span class="box_r">
							<p>Local Upload</p>
							<p>Suggested image size640X320</p>
						</span>
					</label>
					<input type="file" id="file" style="float: left; margin-top: -1rem;opacity: 0;" onchange="change('file')">
				</div>
				<div class="main_box">
					<div class="title">Promote posters</div>
					<ul class="clear">
						<li>
							<input type="radio" name="radio" id="checkbox1" value="1">
							<label for="checkbox1" picurl="/statics/img/thumb_1.jpg" style="background-image:url(/statics/img/thumb_1.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox2" value="2">
							<label for="checkbox2" picurl="/statics/img/thumb_2.jpg" style="background-image:url(/statics/img/thumb_2.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox3" value="3">
							<label for="checkbox3" picurl="/statics/img/thumb_3.jpg" style="background-image:url(/statics/img/thumb_3.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox4" value="4">
							<label for="checkbox4" picurl="/statics/img/thumb_4.jpg" style="background-image:url(/statics/img/thumb_4.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox5" value="5">
							<label for="checkbox5" picurl="/statics/img/thumb_5.jpg" style="background-image:url(/statics/img/thumb_5.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox6" value="6">
							<label for="checkbox6" picurl="/statics/img/thumb_6.jpg" style="background-image:url(/statics/img/thumb_6.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox7" value="7">
							<label for="checkbox7" picurl="/statics/img/thumb_7.jpg" style="background-image:url(/statics/img/thumb_7.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox8" value="8">
							<label for="checkbox8" picurl="/statics/img/thumb_8.jpg" style="background-image:url(/statics/img/thumb_8.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox9" value="9">
							<label for="checkbox9" picurl="/statics/img/thumb_9.jpg" style="background-image:url(/statics/img/thumb_9.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox10" value="10">
							<label for="checkbox10" picurl="/statics/img/thumb_10.jpg" style="background-image:url(/statics/img/thumb_10.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox11" value="11">
							<label for="checkbox11" picurl="/statics/img/thumb_11.jpg" style="background-image:url(/statics/img/thumb_11.jpg)"></label>
						</li>
						<li>
							<input type="radio" name="radio" id="checkbox12" value="12">
							<label for="checkbox12" picurl="/statics/img/thumb_12.jpg" style="background-image:url(/statics/img/thumb_12.jpg)"></label>
						</li>
					</ul>
				</div>
				<div class="bottom-btn">
					<a id="cancel">cancel</a>
					<a id="confirm-btn">Confirm add</a>
				</div>
			</div>
		</script>

		
		
		<input type="hidden" id="huploadbox" value="">
		<input type="hidden" id="hproname" value="">
		<input type="hidden" id="hcity" value="">
		<input type="hidden" id="haddress" value="">
		<input type="hidden" id="hbegintime" value="">
		<input type="hidden" id="hovertime" value="">
		<input type="hidden" id="hnum" value="">
		<input type="hidden" id="hprice" value="">
		<input type="hidden" id="hintroduce" value="">
		
		<script>
			/*$("#hproname").val(getCookie('proname'));
			$("#hcity").val(getCookie('city'));
			$("#haddress").val(getCookie('address'));
			$("#hbegintime").val(getCookie('begintime'));
			$("#hovertime").val(getCookie('overtime'));
			$("#hnum").val(getCookie('num'));
			$("#hprice").val(getCookie('price'));
			$("#hintroduce").val(getCookie('introduce'));*/

		</script>



	<script type="text/javascript">

		//实例化编辑器
		//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	   
		var ue = UE.getEditor('editor', {
			autoHeight: false,
			enableAutoSave :false,
			saveInterval:999999999,
			indentValue :'2em',
			toolbars: [
			]
		});
			
			// 服务协议
			$('.a_box').on('touchstart',function(){
				$('.box').show();
				$('.header').hide();
			})
			$('.close_btn').on('touchstart',function(e){
				e.preventDefault();
				$('.box').hide();
				$('.header').show();
			})
			
			// 表单提交
			$.extend({
			        myTime: {
			            /**
			             * 当前时间戳
			             * @return <int>        unix时间戳(秒)  
			             */
			            CurTime: function(){
			                return Date.parse(new Date())/1000;
			            },
			            /**              
			             * 日期 转换为 Unix时间戳
			             * @param <string> 2014-01-01 20:20:20  日期格式              
			             * @return <int>        unix时间戳(秒)              
			             */
			            DateToUnix: function(string) {
			                var f = string.split(' ', 2);
			                var d = (f[0] ? f[0] : '').split('-', 3);
			                var t = (f[1] ? f[1] : '').split(':', 3);
			                return (new Date(
			                        parseInt(d[0], 10) || null,
			                        (parseInt(d[1], 10) || 1) - 1,
			                        parseInt(d[2], 10) || null,
			                        parseInt(t[0], 10) || null,
			                        parseInt(t[1], 10) || null,
			                        parseInt(t[2], 10) || null
			                        )).getTime() / 1000;
			            },
			        }
			    });
	    		
				$('#submit-btn').click(function(){
					var that = $(this);
					$(this).addClass('disabled').css('background-color','#ccc');
					setTimeout(function(){
						that.removeClass('disabled').css('background-color','#FF8904')
					},2000)

					var proname = $('#proname').val();
					var option = $('#city').val();
					var address = $('#address').val();
					var begintime = $('#begintime').val();
					var overtime = $('#overtime').val();
					var num =  $('#num').val();
					var price =  $('#price').val();
					var introduce = UE.getEditor('editor').getContent();
					$('#introduce').val(introduce);
					var d = new Date(),str = '';
					str += d.getFullYear()+'-';
					str += d.getMonth() + 1+'-';
					str += d.getDate()+' ';
					str += d.getHours()+':'; 
					str += d.getMinutes()+'';
					str = $.myTime.DateToUnix(str);
					var begin = $.myTime.DateToUnix(begintime);
					var over = $.myTime.DateToUnix(overtime);
					if(proname == ''){
						notice('Your event theme can not be empty!');
						return false;
					}
					if(proname.length<=10){
						notice('Activity subject at least ten words Oh!');
						return false;
					}
					if(option == ''||option == null ||option == 0){
						notice('Please choose the event to host the city!');
						return false;
					}
					if(address ==''){
						notice('Please fill in the detailed event address');
						return false;
					}
					if($('.uploadbtn').css('display') != 'none'){
						notice('Please select a template or upload a picture');
						return false;
					}
					if(begintime == ''){
						notice('Please select the event start time');
						return false;
					}
					if(str > begin){
						notice('Your start time can not be less than the current time');
						return false;
					}
					if(overtime == ''){
						notice('Please select the end time of the event');
						return false;
					}
					if(begin >= over){
						notice('The end time is greater than the start time');
						return false;
					}
					if(num == ''){
						notice('Please enter the number of people you want to recruit');
						return false;
					}
					if(num <= 0){
						notice('Please enter the correct number of recruits');
						return false;
					}
					if(price <= 0){
						notice('Please enter the unit price');
						return false;
					}
					if(introduce == ''){
						notice('Please enter your event description');
						return false;
					}
					if($('#checkbox').prop('checked') == false){
						notice('Please read and check the service agreement');
						return false;
					}

					$('#myform').submit();
				})

				function checkform(){
					 query = $("#myform").serialize();
					 $.post("/BusAjax/release.html",query).success(function(data){
						if(data.status == 1){
							tusi(data.msg);
							setInterval(function(){
								window.location.href = '/p/'+data.id;
							},1500);
						}else{
							notice(data.msg);
						}
					 })
				}
			
			/*
			$('#proname').val($('#hproname').val());
			$('#city').val($('#hcity').val());
			$('#address').val($('#haddress').val());
			$('#begintime').val($('#hbegintime').val());
			$('#overtime').val($('#hovertime').val());
			$('#num').val($('#hnum').val());
			$('#price').val($('#hprice').val());
			$('#introduce').val($('#hintroduce').val());
			
			$("#proname").blur(function(){
				$('#hproname').val($(this).val());
				setCookie('proname',$(this).val());
			});
			$("#city").blur(function(){
				$('#hcity').val($(this).val());
				setCookie('city',$(this).val() , 3600);
			});
			$("#address").blur(function(){
				$('#haddress').val($(this).val());
				setCookie('address',$(this).val() , 3600);
			});
			$("#begintime").change(function(){
				$('#hbegintime').val($(this).val());
				setCookie('begintime',$(this).val() , 3600);
				$('#hovertime').val($(this).val());
				setCookie('overtime',$(this).val() , 3600);
			});
			$("#overtime").change(function(){
				$('#hovertime').val($(this).val());
				setCookie('overtime',$(this).val() , 3600);
			});
			$("#num").blur(function(){
				$('#hnum').val($(this).val());
				setCookie('num',$(this).val() , 3600);
			});
			$("#price").blur(function(){
				$('#hprice').val($(this).val());
				setCookie('price',$(this).val() , 3600);
			});
			$("#introduce").blur(function(){
				$('#hintroduce').val($(this).val());
				setCookie('introduce',$(this).val() , 3600);
			});
			*/

			$(".uploadbtn").click(function(res){
				// location.reload();
				window.location.href='#/uploadbox';
			})


		var txtValue;  
		var numValue; 
		   //////// 预加载  
		 $(function() {  
		   txtValue = $("#price").val();  
		   numValue = $("#num").val(); 
		   //////// 给txtbox绑定键盘事件  
			 $(".input_volunteer").bind("keyup", function() {  
				var currentValue = $(this).val();  
				var thisId = $(this).attr('id');
				if(thisId == 'price'){
					var otherval = $("#num").val(); 
				}else{
					var otherval = $("#price").val(); 
				}
				 TxtChange(currentValue,otherval);  
			
			});
			    function TxtChange(currentValue,otherval) {
					var num = currentValue*otherval;
					var num = parseInt(currentValue)*parseInt(otherval);
					$('#total').html(num);
					if(otherval==''){
						$('#total').html(0);
					}else if(currentValue==''){
						$('#total').html(0);
					}	  
				}  
		   });
	</script>
<div class="ux-popmenu" style="position: fixed; background-color: rgba(0, 0, 0, 0.498039);">
	<div class="content show" style="bottom: 0px; position: fixed;">
		<section class="card-combine"> 
			 <a href="/"><span>Home</span></a>
			 
			<a href="javascript:location.reload();"><span>Refresh</span></a>
			<a class="close" href="javascript:;"><span>cancel</span></a>
		</section>
	</div>
</div>

<script>

$(".menu i.fa-bars").on('touchend',function(){
	$('.ux-popmenu').fadeToggle();
	$('.ux-popmenu .content').slideDown();
})
$(".ux-popmenu .close").click(function(){
	$('.ux-popmenu').fadeToggle();
	$('.ux-popmenu .content').slideUp();
})
</script>
		
			

<script type="text/javascript">
	 

	/*阻止用户双击使屏幕上滑*/
	var agent = navigator.userAgent.toLowerCase();        //检测是否是ios
	var iLastTouch = null;                                //缓存上一次tap的时间
	if (agent.indexOf('iphone') >= 0 || agent.indexOf('ipad') >= 0)
	{
	    document.body.addEventListener('touchend', function(event)
	    {
	        var iNow = new Date()
	            .getTime();
	        iLastTouch = iLastTouch || iNow + 1 /** 第一次时将iLastTouch设为当前时间+1 */ ;
	        var delta = iNow - iLastTouch;
	        if (delta < 500 && delta > 0)
	        {
	            event.preventDefault();
	            return false;
	        }
	        iLastTouch = iNow;
	    }, false);
	}
</script><div id="back_icon" style="display:none" ;=""></div>
 

	
</div>


<?php $this->load->view("footer");?>