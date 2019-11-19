<?php
require_once("header.php");
?>
<body style="background-image: url('index.jpg'); background-size:cover;  "></body>
<form align="center" action="" method="POST">
	<!DOCTYPE html>
<html>
<head>
<title>TP4: jQuery - Carroussel</title>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var $carrousel = $('#carrousel');
		var $img = $('#carrousel img');
		var $indexImg = $img.length - 1;
		var i = 0; //compteur
		var $currentImg = $img.eq(i); //image courante
		$img.css('display', 'none');
		$currentImg.css('display', 'block');
//quand on clique sur le bouton "suivant"
		$('.next').click(function(){
			i++;
			if (i <= $indexImg){
				$img.css('display', 'none');
				$currentImg = $img.eq(i);
				$currentImg.css('display', 'block');
			} else {
				i = $indexImg;
			}
		});
//quand on clique sur le bouton "précédent"
		$('.prev').click(function(){
			i--;
			if (i >= 0){
				$img.css('display', 'none');
				$currentImg = $img.eq(i);
				$currentImg.css('display', 'block');
			} else {
				i = 0;
			}
		});
//defilement automatique
		function slideImg(){
			setTimeout(function() {
				if (i < $indexImg) {
					i++;
				} else {
					i = 0;
				}
				$img.css('display', 'none');
				$currentImg = $img.eq(i);
				$currentImg.css('display', 'block');
				slideImg();
			}, 4000);
		}
		slideImg();
	});
</script>


</head>
<body>
<h1>Bienvenue à ECE Amazon le meilleur de la vente à des prix imbattables</h1>
<div id="carrousel" align="center">
<ul>
<img src="victor.jpg" width="500" height="400" align="center">
<img src="johnny.jpg" width="500" height="400" align="center">
<img src="Nike.jpg" width="700" height="400" align="center">
<img src="crampon.jpg" width="500" height="400" align="center">
<img src="Parc.jpg" width="400" height="400" align="center">
</ul>
</div>
<input type="button" value="Précédent" class="prev">
<input type="button" value="Suivant" class="next"><br><br>
</body>
</html>
<?php
require_once("footer.php");
?>