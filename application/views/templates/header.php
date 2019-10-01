<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>
		<?php 
			echo $title;
		?>
	</title>


	<link href="<?php echo base_url();?>css/primary.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/login_dropdown.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url();?>css/top_fixed_menu.css" rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-2.1.1.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?php echo base_url();?>js/login.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/login_dropdown.js"></script>

</head>
<body>
	

	<div class="Layout_header"> 
		<div>
			<img width="300" src="<?php echo base_url();?>images/top_menu/logo.png"/>
		</div>
		
		<?php
			if ( session_status() == PHP_SESSION_NONE ) {
				session_start();
			}
			if(isset($_SESSION["userName"])){
				echo   '<div id="login_info">
							<div id="login_dropdown" class="login-dropdown"><img id="user_img" width="30" src="'.base_url().'images/login_dropdown/user_icon2.png"/><div id="userName">'.$_SESSION["userName"].'</div>
								<ul class="dropdown">
									<li><img width="30" src="'.base_url().'images/login_dropdown/user_icon.png" /><span>個人資料</span></li>
									<li><img width="30" src="'.base_url().'images/login_dropdown/score_record_icon.png" /><span>排行紀錄</span></li>
									<li><a href='.site_url('logout/index').'><img width="30" src="'.base_url().'images/login_dropdown/logout_icon.png" /><span>登出</span></a></li>
								</ul>
							</div>
						</div>';
			}
			else{
				$signIn_url = site_url('signIn/index');
				$signUp_url = site_url('signUp/index');
				echo 	"<div class='login_div'>
							<a href='#' class='login_btn' id='toggle-login' onclick=\"$('#login').toggle(200);\">登入</a>
							<div id='login'>
								<div id='triangle'></div>
								<h1>Sign in</h1>
								<div id='login_block'>
									<input id='login_account' type='text' placeholder='請輸入帳號' />
									<input id='login_password' type='password' placeholder='請輸入密碼' />
									<input type='button' value='登入' onclick=\"check('".$signIn_url."')\" />
									<div id='login_error_msg'>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href='".$signUp_url."' class='signup_btn'>註冊</a>
						</div>";
			}
		?>
		
		
		
		<nav>
			<ul class="top-menu">
				<li>
					<a id="home" href="<?php echo site_url('pages/view/home');?>">
						<img width="30" src="<?php echo base_url();?>images/top_menu/home.png"/>
						<strong>首頁</strong>
						<small>home</small>
					</a>
				</li>
				<li>
					<a id="typeGame">
						<img width="30" src="<?php echo base_url();?>images/top_menu/type_game_icon.png"/>
						<strong>打字遊戲</strong>
						<small>type game</small>
					</a>
					<ul>
						<li>
							<a id="typeGame_w10" href="<?php echo site_url('typeGame/index/10');?>">10個單字</a>
						</li>
						<li>
							<a id="typeGame_w20" href="<?php echo site_url('typeGame/index/20');?>">20個單字</a>
						</li>
						<li>
							<a id="typeGame_w30" href="<?php echo site_url('typeGame/index/30');?>">30個單字</a>
						</li>
					</ul>					
				</li>
				<li>
					<a id="mathGame">
						<img width="30" src="<?php echo base_url();?>images/top_menu/math_icon.png"/>
						<strong>數學遊戲</strong>
						<small>math game</small>						
					</a>
					<ul>
						<li>
							<a id="mathGame_Add_Reduce" href="<?php echo site_url('mathGame/index/add_reduce');?>">加減法運算</a>
						</li>
						<li>
							<a id="mathGame_Multiply_Except" href="<?php echo site_url('mathGame/index/multiply_except');?>">乘除法運算</a>
						</li>
						<li>
							<a id="mathGame_Mix" href="<?php echo site_url('mathGame/index/mix');?>">加減+乘除運算</a>
						</li>
					</ul>
				</li>				
			</ul>
		</nav>
	</div>

	<div style="position:relative;" class="Layout_center">