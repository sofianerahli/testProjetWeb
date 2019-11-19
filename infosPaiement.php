<?php
require_once("header.php");
?>


<p><a href="?logout"><input type="button" value="Déconnexion"/></a></p>
<body style="background-image: url('card.jpg'); "></body>

<?php


if (isset ($_GET['logout'])){ 
	session_destroy(); 
	header('Location: index1.php');
}

		if(isset($_POST['submit']))
		{
			
			if(($_POST['Type'])&&($_POST['num'])&&($_POST['Nom_Prenom'])&&($_POST['Date_exp'])&&($_POST['Codesec']))
			{
				$Type=$_POST['Type'];
				$num=$_POST['num'];
				$Nom_Prenom=$_POST['Nom_Prenom'];
				$Date_exp=$_POST['Date_exp'];
				$Codesec=$_POST['Codesec'];
				
				$database = "ece_amazon";
				$db_handle = mysqli_connect('localhost', 'root', '' );
				$db_found = mysqli_select_db($db_handle, $database );
				if ($db_found) 
				{
					$SQL = "SELECT * FROM  infospaiement WHERE ((Type='$Type')AND(num='$num')AND(Nom_Prenom='$Nom_Prenom')AND(Date_exp='$Date_exp')AND(Codesec='$Codesec'))";
 					$result = mysqli_query($db_handle, $SQL);
                  	$donnee = mysqli_fetch_array($result);
 					
 					if($donnee)
 					{
					?>
					<script type="text/javascript"> alert("Paiement validé");</script>
					<?php
					}
				else 
				{
					?>
					<script type="text/javascript"> alert("Paiement refusé: Contactez votre banque");</script>
					<?php
				}
				}	
				mysqli_close($db_handle);
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
		<body>
			<form align="center"  method="POST" action="">
			<table>
			    <tr>
				    <td><u><b>Type de carte : </b></u></td>
			        <td><select name="Type">
						<option value="Visa">Visa</option>
						<option value="MasterCard">MasterCard</option>
						<option value="American_Express">American Express</option>
						<option value="Paypal">Paypal</option>
					</select>
					</td>
				</tr>
			    <tr>
			        <td><u><b>Numéro Carte: </b></u></td>
			        <td><input placeholder="Entrez votre numero de carte" maxlength="16"type="int" name="num"></td>
			    </tr>
			    <tr>
			        <td><u><b>Nom  : </b></u></td>
			        <td><input placeholder="Entrez votre nom affiché sur la carte" type="text" name="Nom_Prenom"/></td>
			    </tr>
			    <tr>
			    	<td><u><b>Date d'expiration de la carte : </b></u></td>
			         <td><input placeholder="Entrez la date d'expiration" max="2030-01-01" min="2019-05-06" type="date" name="Date_exp"/></td>  
			    </tr>
			
			    <tr>
			    	<td><u><b>Code de securité : </b></u></td>
			        <td><input placeholder="Entrez votre numéro de téléphone" maxlength="4"  type="int" name="Codesec"/></td>
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