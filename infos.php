<?php
require_once("header.php");
?>

<h1 align="center"><u><big>Infos Client</big></u></h1>
<p><a href="?logout"><input type="button" value="Déconnexion"/></a></p>
<body style="background:#A9F5E1;"></body>

<?php


if (isset ($_GET['logout'])){ 
	session_destroy(); 
	header('Location: index1.php');
}

		if(isset($_POST['submit']))
		{
			
			if(($_POST['Nom_Prenom'])&&($_POST['Adresse_1'])&&($_POST['Adresse_2'])&&($_POST['Ville'])&&($_POST['Code'])&&($_POST['Pays'])&&($_POST['Tel']) )
			{
				$Nom_Prenom=$_POST['Nom_Prenom'];
				$Adresse_1=$_POST['Adresse_1'];
				$Adresse_2=$_POST['Adresse_2'];
				$Ville=$_POST['Ville'];
				$Code=$_POST['Code'];
				$Pays=$_POST['Pays'];
				$Tel=$_POST['Tel'];
			

				$database = "ece_amazon";
				$db_handle = mysqli_connect('localhost', 'root', '' );
				$db_found = mysqli_select_db($db_handle, $database );
				if ($db_found) 
				{
					$SQL = "INSERT INTO infosclient(Nom_Prenom, Adresse_1, Adresse_2, Ville,Code,Pays,Tel)  VALUES ('$Nom_Prenom', '$Adresse_1', '$Adresse_2', '$Ville','$Code','$Pays','$Tel')  ";
 					$result = mysqli_query($db_handle, $SQL);
 					
					?>
					<script type="text/javascript"> alert("Vous avez ajouté vos informations avec succés");</script>
					<?php
					header('Location:infosPaiement.php'); 
					mysqli_close($db_handle);
				}
				else 
				{
					?>
					<script type="text/javascript"> alert("BDD non trouvée");</script>
					<?php
				}		
			}
			else
			{
				?>
				<script type="text/javascript"> alert("Champs vides : Veuillez remplir");</script>	
				<?php
			}	
		}
		?>
	

		
		<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
		<h3 align="center"><u>Remplir les champs </u></h3>
		<body>
			<form align="center"  method="POST" action="" enctype="multipart/form-data">
			<table>
			    <tr>
			        <td><b><u>Nom et Prénom : </u></b></td>
			        <td><input placeholder="Entrez votre Nom et Prenom" type="text" name="Nom_Prenom"/></td>
			    </tr>
			    <tr>
			        <td><u><b>Adresse Ligne 1: </b></u></td>
			        <td><input placeholder="Entrez votre ligne 1" type="text" name="Adresse_1"></td>
			    </tr>
			    <tr>
			        <td><u><b>Adresse Ligne 2 : </b></u></td>
			        <td><input placeholder="Entrez votre ligne 2" type="text" name="Adresse_2"/></td>
			    </tr>
			    <tr>
			        <td><u><b>Ville : </b></u></td>
			        <td><input placeholder="Entrez votre ville" type="text" name="Ville"/></td>
			    </tr>
			    <tr>
			    	<td><u><b>Code Postal : </b></u></td>
			         <td><input placeholder="Entrez votre Code postal"maxlength="5" type="int" name="Code"/></td>  
			    </tr>
			    <tr>
			    	<td><u><b>Pays : </b></u></td>
			        <td><input placeholder="Entrez votre Pays" type="text" name="Pays"/></td>
			    </tr>
			    <tr>
			    	<td><u><b>Numéro de téléphone : </b></u></td>
			        <td><input placeholder="Entrez votre numéro de téléphone"maxlength="10" type="tel" name="Tel"/></td>
			    </tr>
			    <tr>
			          <td colspan="3" align="center">
			          <input type="submit" name="submit"/>
			    </td>
			    </tr>
			</table>
			</form>
		</body>
		</div>
		</html>


<?php
require_once("footer.php");
?>