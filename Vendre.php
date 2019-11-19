<?php
require_once("header.php");

session_start();

if (isset ($_GET['create'])){ 
	header('Location: creercompte.php');
}
if(isset($_POST['submit'])) 
{
	if(($_POST['username'])&&($_POST['email']))
	{
		$username=$_POST['username'];
		$_SESSION['username']=$_POST['username'];
		$email=$_POST['email'];
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '' );
		$db_found = mysqli_select_db($db_handle, $database );
		if($db_found)
		{
			$SQL="SELECT * FROM vendeur WHERE ((pseudo='$username')AND(email='$email'))";
			$result = mysqli_query($db_handle, $SQL);
			$donnee = mysqli_fetch_array($result);
     		
     		if($donnee)
			{
				header('Location:choixfond.php');

			}
			else
			{
				?>
    			<script type="text/javascript"> alert("Pseudo inexistant: Veuillez créer un compte");</script>
    			<?php
			
			}
			mysqli_close($db_handle);
		
		}
	
		
	}
	else
	{
		?>
    		<script type="text/javascript"> alert("Champs vides: Veuillez remplir");</script>
    	<?php

	}

}
?>

<div style="width:30% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    background: #A9F5E1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
<body style="background-image: url('vendeur.jpg'); background-size:cover;  "></body>
<form align="center" action="" method="POST">
<h1><u><big>Espace vendeur</big></u></h1>
<h3>Pseudo :</h3><input placeholder="Entrez votre pseudo" type="text" name="username"/><br/><br/>
<h3>Votre adresse mail :</h3>
<input placeholder="Entrez votre mail" type="email" name="email"/><br/></br/>
<input type="submit" name="submit"/><br/><br/>
<p><a href="?create"><u>Créer un compte</u></a></p>
</form>
</div><br><br><br><br><br><br>


<?php
echo
require_once("footer.php");
?>
