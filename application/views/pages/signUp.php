

	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url();?>css/sign_up.css" rel='stylesheet' type='text/css' />
	
	<div id="main_div">
		
		<div class="signUp_form">
			<h1 class="title">Sign Up</h1>
			<?php			
	 			echo form_open('signUp/submit');
 			?>
				<hr>

				<div class="field_div">
					姓名:
					<label for="name" id="icon" >
						<i class="icon-user"></i>
					</label>
					<input id="name" type="text" name="name" placeholder="姓名" required/>
				</div>

				<div class="field_div">
					帳號:
					<label for="account" id="icon" >
						<i class="icon-user"></i>
					</label>
					<input id="account" type="text" name="account" placeholder="帳號" onblur="checkAccount('<?php echo site_url('signUp/checkAccount')?>',this.value , '<?php echo base_url();?>')" required/>
					<div>
						<span id="check_account_img"></span>
						<span id="check_account_msg"></span>
					</div>
				</div>

				<div class="field_div">
					密碼:
					<label for="password" id="icon">
						<i class="icon-shield"></i>
					</label>
					<input id="signup_password" type="password" name="password" placeholder="密碼" required/>
				</div>

				<div class="field_div">
					密碼:
					<label for="confirm_pwd" id="icon">
						<i class="icon-shield"></i>
					</label>
					<input id="signup_confirm_pwd" type="password" name="password_confirm" placeholder="確認密碼" required/>
				</div>
				

				<div class="field_div">
					學校:
					<label for="school" id="icon">
						<i class="icon-star"></i>
					</label>
					<input id="school" type="text" name="school" placeholder="目前就讀的學校" required/>

					<input type="checkbox" id="school_no_public_checkbox" class="regular-checkbox big-checkbox" onclick="checkbox_check(this,'school')" />
					<label for="school_no_public_checkbox"></label>不公開
				</div>

				<div class="field_div">
					科系:
					<label for="department" id="icon">
						<i class="icon-book"></i>
					</label>
					<input id="department" type="text" name="department" placeholder="科/系" required/>
					
					<input type="checkbox" id="department_no_public_checkbox" class="regular-checkbox big-checkbox" onclick="checkbox_check(this,'department')" />
					<label for="department_no_public_checkbox"></label>不公開
				</div>

				<div class="field_div grade_div">
					年級:
					<input type="radio" id="one" name="grade" value="一" checked/>
					<label for="one" class="radio">一</label>
					<input type="radio" id="two" name="grade" value="二"/>
					<label for="two" class="radio">二</label>
					<input type="radio" id="three" name="grade" value="三"/>
					<label for="three" class="radio">三</label>
					<input type="radio" id="four" name="grade" value="四"/>
					<label for="four" class="radio">四</label>
					<input type="radio" id="five" name="grade" value="五"/>
					<label for="five" class="radio">五</label>
					<input type="radio" id="six" name="grade" value="六"/>
					<label for="six" class="radio">六</label>
					<input type="radio" id="grade_no_public" name="grade" value="不公開"/>
					<label for="grade_no_public" class="radio">不公開</label>
				</div>

				<div class="field_div gender_div">
					性別:
					<input type="radio" id="male" name="gender" value="男" checked/>
					<label for="male" class="radio">男生</label>
					<input type="radio" id="female" name="gender" value="女"/>
					<label for="female" class="radio">女生</label>
					<input type="radio" id="gender_no_public" name="gender" value="不公開"/>
					<label for="gender_no_public" class="radio">不公開</label>
				</div>
				<div style="clear:both;">
					<input id="signUpSendBtn" type="submit" class="button" value="送出" />
				</div>
			</form>
		</div>
		
	</div>
	<div class="error_tip">
		<?php echo validation_errors();?>
	</div>
	
</div>

<script src="<?php echo base_url();?>js/signUp.js"></script>