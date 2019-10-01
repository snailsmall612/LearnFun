
	<audio id="error_sound" src="<?php echo base_url();?>sound/error.mp3">
  	</audio>
  	<audio id="correct_sound" src="<?php echo base_url();?>sound/correct.mp3">
  	</audio>
  	<audio id="gameover_sound" src="<?php echo base_url();?>sound/gameOver.mp3">
  	</audio>
  	<audio id="score_change_sound" src="<?php echo base_url();?>sound/scoreChange.mp3">
  	</audio>
  	<audio id="score_result_sound" src="<?php echo base_url();?>sound/scoreResult.mp3">
  	</audio>
  	<audio autoplay loop id="backgroundMusic" src="<?php echo base_url();?>music/mathGameBackgroundMusic.mp3">
  	</audio>
	<link href="<?php echo base_url();?>css/mathGame.css" rel='stylesheet' type='text/css' />
	<script>
		var site_url = "<?php echo site_url();?>";
	</script>
	<script type="text/javascript" src="<?php echo base_url();?>js/mathGame.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/popup_window/messi.min.css" />
	<script src="<?php echo base_url();?>js/popup_window/messi.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Rajdhani' rel='stylesheet' type='text/css'>

	<div id="main_div" style="text-align:center;">
		<div id="score_div">

		</div>
		<div id="right_img_div">
			
		</div>
		<div id="error_img_div">
			
		</div>
		<div id="subject_count_div">

		</div>
		<div id="subject_div">
			<?php 
				if($gameType == "add_reduce"){
					echo "加減法運算";
				}
				else if($gameType == "multiply_except"){
					echo "乘除法運算";
				}
				else{
					echo "加減+乘除運算";
				}

			?>
			
			<div style="margin-top:10px;">設定題目數量</div>
			<div>
				<input id="subjectQuantityRange" type="range" min="1" max="30" value="1" onchange="document.getElementById('showSubjectQuantity').innerHTML = this.value" /> 
			</div>
			<div id="showSubjectQuantity">1</div>		
			<div>
				<a class="gameStart_button" onclick='init("<?php echo $gameType;?>", document.getElementById("showSubjectQuantity").innerHTML , "<?php echo base_url();?>");'>遊戲開始</a>
			</div>
		</div>
		<div id="time_div">
			
		</div>
	</div>
	

</div>

<script>
	document.getElementById("mathGame").className="active";
	<?php 
		if($gameType == "add_reduce"){
			echo 'document.getElementById("mathGame_Add_Reduce").className="active";';
		}
		else if($gameType == "multiply_except"){
			echo 'document.getElementById("mathGame_Multiply_Except").className="active";';
		}
		else{
			echo 'document.getElementById("mathGame_Mix").className="active";';
		}
	?>
	
</script>