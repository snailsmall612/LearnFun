	
	<div id="typeGameCanvas">

	</div>
	<audio id="word_appear_sound" src="<?php echo base_url();?>sound/word_appear.mp3">
  	</audio>
</div>
<script>
	document.getElementById("typeGame").className="active";
	var wordQuantity = <?php echo $word_Quantity?>;
	document.getElementById("typeGame_w"+wordQuantity).className="active";
</script>

<link rel="stylesheet" href="<?php echo base_url();?>css/popup_window/messi.min.css" />
<script src="<?php echo base_url();?>js/popup_window/messi.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="<?php echo base_url();?>js/canvas_func.js"></script>

<script>
	// Create the canvas
var canvas = document.createElement("canvas");
var ctx = canvas.getContext("2d");
canvas.width = 1000;
canvas.height = 500;
document.getElementById("typeGameCanvas").appendChild(canvas);



var keysDown = {};
addEventListener("keydown", function(e) {
	keysDown[e.keyCode] = true;
}, false);

addEventListener("keyup", function(e) {
	keysDown[e.keyCode] = false;
}, false);


drawText("rgb(40, 14, 15)","bold 24px 'Microsoft JhengHei'","center","top","快來學習英文單字吧!不但能練習打字還能夠吸收知識哦",canvas.width/2,0);
drawText("rgb(40, 14, 15)","24px Microsoft JhengHei","center","top","按下Enter開始", canvas.width/2, 200);


var gameStatus = "inGameMenu";

var words = [];
var chinese = [];
var charColorArray = [];
var time = 0;
var have_play_word_appear_sound = false;


function timeCount(){
	time++;
	setTimeout("timeCount()",1000);
}


function set_charColorArray(){
	for(var i = 0 ; i < 30 ; i++){
		charColorArray[i] = "rgb(0, 214, 71)";
	}
}

set_charColorArray();

var nowCharIndex = 0;
<?php foreach ($words as $word_item):?>
    words.push("<?php echo $word_item['word'];?>");
    chinese.push("<?php echo $word_item['translation'];?>");
<?php endforeach?>


function ajaxSaveTime(time){
	var ajax_url = "<?php echo site_url('typeGame/checkLoginStatus');?>";
	$.post(ajax_url,{
      	time:time,
      	wordQuantity:wordQuantity
    },
    function(data,status){
    	
    });
}


var update = function(throughTime) {

	if(gameStatus == "inGameMenu"){
		if (13 in keysDown) {   //如果13(Enter)該index存在該陣列中		
        	clearCanvas(0,0,canvas.width,canvas.height);
        	timeCount();
        	gameStatus = "gameStart";
		}       
    }

    else if(gameStatus == "gameStart"){

    	if(have_play_word_appear_sound == false){
	    	document.getElementById("word_appear_sound").play();
	    	have_play_word_appear_sound = true;
	    }
    	if(words[0][nowCharIndex] == " "){
    		nowCharIndex++;
    	}

    	var keyCode = words[0].toLowerCase().charCodeAt(nowCharIndex) - 32;// 先把單字轉成小寫 (之後不管輸入是大寫還小寫字母都可以) //轉換成keyCode
    	if(keyCode == 7){  // 避免出現 ' 時轉換錯誤
    		keyCode = 222;
    	}
    	else if(keyCode == 13){  //避免出現 - 時轉換錯誤
    		keyCode = 189;
    	}
    	else if(keyCode == 14){  //避免出現 . 時轉換錯誤
    		keyCode = 190;
    	}
	    if(keysDown[keyCode] == true){  // 輸入正確
	    	keysDown[keyCode] = false; 	// 避免兩個英文字母連在一起的bug
	    	charColorArray[nowCharIndex] = "rgb(33, 149, 250)";
	    	nowCharIndex++;
		}

		

		if(nowCharIndex == words[0].length){
			words.shift();
			chinese.shift();
			clearCanvas(0,100,canvas.width,300);
			set_charColorArray();
			nowCharIndex = 0;
			have_play_word_appear_sound = false;
		}
		if(words.length == 0){
			gameStatus = "gameOver";
			new Messi('遊戲結束，您共花了' + time + '秒!', {title: 'message', titleClass: 'info',width:'300px' ,buttons: [{id: 0, label: '確定', val: 'X'}]});
			
			ajaxSaveTime(time);
		}
	}

};


var draw = function() {
	if(gameStatus == "gameStart"){
		for(var i = 0 ; i < words[0].length ; i++){	
			drawText(charColorArray[i],"3em 'Signika'","center","top",words[0][i],canvas.width/2 -12*words[0].length + 2 + i*30 ,200);
		}
		clearCanvas(600,0,500,100);
		drawText("rgb(232, 77, 82)","40px Microsoft JhengHei","center","top","經過 "+ time + " 秒",850 ,0);
		drawText("rgb(42, 182, 145)","40px Microsoft JhengHei","center","top",chinese[0],canvas.width/2 ,300);
	}
	else if(gameStatus == "gameOver"){
		drawText(charColorArray[i],"24px Microsoft JhengHei","center","top","遊戲結束",canvas.width/2 ,200);			
	}
};

// The main game loop
var main = function() {

    var now = Date.now();
    var delta = now - then;

    update(delta / 1000);
    draw();

    then = now;

    // Request to do this again ASAP
    requestAnimationFrame(main);  // 不斷重複執行 main
};

// Cross-browser support for requestAnimationFrame
var w = window;
requestAnimationFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;

// Let's play this game!
var then = Date.now();
main();

</script>