<html>
<body>
	<head>
		<meta charset="utf-8" />
		<title>Tabliczka Mnożenia The Game</title>
		<style>
body, html{
	margin:0px;
	padding:0px;
}	
body{
	background-color:#000;
	color:#070;
	font-family:monospace;
	font-size:20px;
}	
h1{
	color:#0b0;
}
input{
	background-color:#000;
	color:#0a0;
	font-family:monospace;
	border:2px solid #080;
}
#punkty, #poziom {
	font-weight:bolder;
	display:block;
	font-size:50px;
}
div.punkty, div.poziom{

	width:50%;
	float:left;
	text-align:center;
}
div.zadanie{
	clear:both;
	padding:50px;
	font-size:80px;
	font-weight:bold;	
	color:#0f0;
}

#wynik{
	font-size:80px;
	padding:10px;
	width:60%;
}	

#komunikat{
	padding:20px;
	font-size:30px;
	color:#0a0;
}

#komunikat span.good{
	color:#0f0;
}
	
#komunikat span.bad{
	color:#f00;
}
#motd {
	/*color:#ff0;*/
}

window.onbeforeunload = function() {
    return "Nie uciekaj z pola bitwy!";
}
	
		</style>
		<script>
	
var A;
var B;
var poziom = 1;
var punkty = 0;
var komunikat = 'Witaj! System jest gotowy do rozgrywki.'; 

	function $E(id){
		return document.getElementById(id);
	}  

  function init(){ 
  	losuj();
	update();
  }

function losuj(){
	A = Math.floor((Math.random() * poziom) + 2);
	B = Math.floor((Math.random() * poziom) + 2);
    $E('zadanie').innerHTML = A + ' x ' + B;
}

function update(){
	$E('komunikat').innerHTML = komunikat;
	$E('punkty').innerHTML = punkty;
	$E('poziom').innerHTML = poziom;
	$E('wynik').value = '';
}
		
  function sprawdz(){
    odpowiedz = $E('wynik').value;
	if( isNaN(odpowiedz)){
		komunikat = '<span clas="bad">Aby wygrać wprowadź liczbę będącą wynikiem zadanego mnożenia.</span>';	
	}
	else{
		if( odpowiedz == (A*B) ){
			komunikat = '<span class="good">Wynik '+odpowiedz+' jest prawidłowy! Otrzymujesz '+poziom+' punktów. Brawo!</span>';
			punkty = punkty + poziom;
		//	losuj();
		}else{
			komunikat = '<span clas="bad"> Wynik '+odpowiedz+' jest nieprawidlowy, tracisz '+poziom+' punktów. Spróbuj jeszcze raz.</span>';
			punkty = punkty - poziom;
		}
	}
	if(punkty < 0) punkty = 0;
	poziom = Math.floor(punkty / 10) + 2;
	losuj();
	update();
  }	
function levelup()
{
	poziom = poziom + 1;
	losuj();
	update();
}  
				
		</script>	
	</head>
	<body onload="init();">
		<center>
		<h1>Tabliczka Mnożenia - The Game</h1>
		<div class="poziom">Poziom: <span id="poziom">x</span></div>
		<div class="punkty">Punkty: <span id="punkty">x</span></div>
		<div class="zadanie"><span id="zadanie">x</span></div>
		<form>
			<div class="wynik"><input id="wynik" placeholder="Podaj wynik"/>
			<br /><input type="submit" value="Sprawdź" onclick="sprawdz(); return false" />
			<input type="button" value="poziom++" onclick="levelup();">
			</div>
		</form>
		<div id="komunikat"><span class="bad">Gra wymaga JavaScript!</span></div>
		<div id="motd">Przybyłem, Pomnożyłem, Wygrałem!</div>
	
	</body>
</html>
