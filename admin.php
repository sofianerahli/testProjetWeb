
<?php

session_start();
if(isset($_POST['submit'])) {
	if(($_POST['username'])&&($_POST['password'])){
		if(($_POST['username']=="admin")&&($_POST['password']=="admin")) {


			$_SESSION['username']=$_POST['username'];
			header('Location:admin1.php');
		}
		else{
			?>
    		<script type="text/javascript"> alert("Accés non autorisé");</script>
    		<?php
		}
	}
	else{
		?>
    		<script type="text/javascript"> alert("Champs vides: Veuillez remplir");</script>
    		<?php
	}
}
?>
<div style="background:#A9F5E1;width:30% ; padding: 0.5%; 
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
<body style="background-image: url('admin.jpg'); background-size:cover;  "></body>
<h1 align="center"><u><big> Page Administrateur <img src="admin_photo" ></big></u></h1>
<form align="center" action="" method="POST">
<h2>Pseudo :</h2>
<input placeholder="Entrez votre pseudo" type="text" name="username"/><br/><br/>
<h2>Mot de passe :</h2>
<input placeholder="Entrez votre mot de passe"type="password" name="password"/><br/></br/>
<input type="submit" name="submit"/><br/><br/>
</form>
</div>

