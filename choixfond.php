<?php
require_once("header.php");
?>

<body style="background-image: url('multicolorFD.jpg'); background-size:cover;  "></body>

<div style="background:white;width:73% ; padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box; ">

<h1 align="center"><u><big>CHOIX DE LA COULEUR DU FOND D'ECRAN</big></u></h1>
</div>

<div style="background:white;width:20% ; padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;background: #fff;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">

	<form align="center" action="" method="POST">

		<h3><font color="blue"><u>BLEU :</u></font></h3>
		<input type="submit" name="Bleu"/><br/><br/>
		<h3><font color="red"><u>ROUGE :</u></font></h3>
		<input type="submit" name="Rouge"/><br/><br/>
		<h3><font color="green"><u>VERT :</u></font></h3>
		<input type="submit" name="Vert"/><br/><br/>
		<h3><font color="yellow"><u>JAUNE :</u></font></h3>
		<input type="submit" name="Jaune"/><br/><br/>
	</form>
</div>


<?php

	if(isset($_POST['Bleu']))
	{
		header('Location: vendre1.php');
	}

	if(isset($_POST['Rouge']))
	{
		header('Location: vendre2.php');
	}

	if(isset($_POST['Vert']))
	{
		header('Location: vendre3.php');
	}

	if(isset($_POST['Jaune']))
	{
		header('Location: vendre4.php');
	}

?>

<?php
require_once("footer.php");
?>