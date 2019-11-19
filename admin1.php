
<?php
require_once("header.php");
session_start();
?>

<div style="width:40% ; padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;background: #FE2E2E;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
	<h1 align="center"><u>Bienvenue à l'administrateur</u></h1>
</div>

<p align="left"><a href="?logout"><input type="button" value="Déconnexion"/></a></p>
<p align="center"><a href="?article=add"><input type="button" value="Ajouter un item"/></a></p>
<p align="center"><a href="?article=delete"><input type="button" value="Supprimer un item"/></a></p>
<p align="center"><a href="?vendeur=add"><input type="button" value="Ajouter un vendeur"/></a></p>
<p align="center"><a href="?vendeur=delete"><input type="button" value="Supprimer un vendeur"/></a></p>
<body style="background-image: url('controle.jpg'); background-size:cover; background-attachment: fixed; "></body>


<?php
	if (isset ($_GET['logout']))
	{ 
		session_destroy(); 
		header('Location: index1.php');
	}
?>


<?php 

if(isset($_SESSION['username']))
{
	if(isset($_GET['vendeur']))
	{
		if($_GET['vendeur']=='add')
		{
			if(isset($_POST['submit']))
			{
				
				if(($_POST['email'])&&($_POST['pseudo'])&&($_POST['nom']))
				{
					$email=$_POST['email'];
					$pseudo=$_POST['pseudo'];
					$nom=$_POST['nom'];
					$database = "ece_amazon";
					$db_handle = mysqli_connect('localhost', 'root', '' );
					$db_found = mysqli_select_db($db_handle, $database );
					if ($db_found) 
					{
						$SQL="SELECT * FROM vendeur WHERE (pseudo='$pseudo')";
						$result = mysqli_query($db_handle, $SQL);
						$donnee = mysqli_fetch_array($result);

						if($donnee)
						{
							?>
			    			<script type="text/javascript"> alert("Pseudo déjà pris");</script>
			    			<?php

						}

						else
						{
							$SQL2 = "INSERT INTO vendeur( email, pseudo, nom)  VALUES ('$email', '$pseudo', '$nom')";
	     					$result2 = mysqli_query($db_handle, $SQL2);

    						?>
    						<script type="text/javascript"> alert("Vous avez ajouté un vendeur");</script>
    						<?php

    					}
    					mysqli_close($db_handle);
					}

				}
				else
				{
					?>
    				<script type="text/javascript"> alert("Champs vides: Veuillez Remplir");</script>	
    				<?php
				}	
			}
			?>

			<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">	
	    	
	    	<h3 align="center"><u>Remplir les champs pour ajouter votre vendeur</u></h3>
			
			<body>
				<form align="center"  method="POST" action="" enctype="multipart/form-data">
				<table>
				    <tr>
				          <td><b><u>Email : </u></b></td>
				          <td><input placeholder="Entrez un mail" type="email" name="email"/></td>
				    </tr>
				    <tr>
				          <td><u><b>Pseudo : </b></u></td>
				          <td><input placeholder="Entrez un pseudo" type="text" name="pseudo"></td>
				    </tr>
				    <tr>
				          <td><u><b>Nom : </b></u></td>
				          <td><input placeholder="Entrez un nom" type="text" name="nom"/></td>
				    </tr>
				          <td colspan="3" align="center">
				          <input type="submit" name="submit"/>
				    </td>
				    </tr>
				</table>
				</form>
				</body>
			</div>

			<?php
		}

		else if($_GET['vendeur']=='delete')
		{
			echo "<br><br>";
			$database = "ece_amazon";
			$db_handle = mysqli_connect('localhost', 'root', '' );
			$db_found = mysqli_select_db($db_handle, $database );
			if($db_found)
			{
				$SQL2="SELECT * FROM vendeur";
			    $result = mysqli_query($db_handle, $SQL2);
     			mysqli_close($db_handle);
			}
			echo "<br>";
    		
    		while ($db_field = mysqli_fetch_assoc($result))
    		{
    			?>

    			<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
				<body style="background:#A9F5E1;"></body>

				<?php
    			echo "<br>";
                echo $db_field['pseudo'];
                echo "<br>";
                ?>
            	</div>
            	<?php
            
        	}
        	if(isset($_POST['submit']))
			{
				
				if($_POST['pseudo'])
				{
					$pseudo=$_POST['pseudo'];
					$database = "ece_amazon";
					$db_handle = mysqli_connect('localhost', 'root', '' );
					$db_found = mysqli_select_db($db_handle, $database );
					if ($db_found) 
					{
						$SQL = "DELETE FROM vendeur WHERE pseudo='$pseudo'";
     					$result = mysqli_query($db_handle, $SQL);
     					mysqli_close($db_handle);
     					?>
    						<script type="text/javascript"> alert("Vous avez supprimé un vendeur");</script>
    					<?php
					}
					else 
					{
    					echo "Database NOT Found ";
					}
				}
		
			}

			?>
			<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
			<body style="background:#A9F5E1;"></body>
			<form align="center"action="" method="POST">
			<h3><b><u>Entrez le pseudo du vendeur que vous voulez supprimer</u></b></h3>
			<h3><u>Pseudo</u>:</h3><input placeholder="Entrez le pseudo" type="text" name="pseudo"/>
			<input type="submit" name="submit">
		    </form>
			</div>

		    <?php
        }
    }


	if(isset($_GET['article']))
	{
		if($_GET['article']=='add')
		{
			if(isset($_POST['submit']))
			{
				
				if(($_POST['Nom'])&&($_POST['Description'])&&($_POST['Prix'])&&($_POST['Categorie'])&&($_POST['Photo'])&&($_POST['Stock']))
				{
					$Nom=$_POST['Nom'];
					$Description=$_POST['Description'];
					$Prix=$_POST['Prix'];
					$Categorie=$_POST['Categorie'];
					$Photo=$_POST['Photo'];
					$Stock=$_POST['Stock'];

					$database = "ece_amazon";
					$db_handle = mysqli_connect('localhost', 'root', '' );
					$db_found = mysqli_select_db($db_handle, $database );
					if ($db_found) 
					{
						$SQL = "INSERT INTO item( Nom, Description, Prix, Categorie,Photo,Stock)  VALUES ('$Nom', '$Description', '$Prix', '$Categorie','$Photo','$Stock')";
     					$result = mysqli_query($db_handle, $SQL);
     					
    					?>
    					<script type="text/javascript"> alert("Vous avez ajouté un item au marché");</script>
    					<?php
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
    		<h3 align="center"><u>Remplir les champs pour ajouter votre item</u></h3>
			<body>
				<form align="center"  method="POST" action="" enctype="multipart/form-data">
				<table>
				    <tr>
				          <td><b><u>Nom : </u></b></td>
				          <td><input placeholder="Entrez votre nom" type="text" name="Nom"/></td>
				    </tr>
				    <tr>
				          <td><u><b>Description : </b></u></td>
				          <td><textarea placeholder="Entrez votre description" name="Description"></textarea></td>
				    </tr>
				    <tr>
				          <td><u><b>Prix : </b></u></td>
				          <td><input placeholder="Entrez votre prix" type="text" name="Prix"/></td>
				    </tr>
				    <tr>
				          <td><u><b>Photo(Entrez le nom du fichier) : </b></u></td>
				          <td><input type="text" name="Photo"/></td>
				          <td><input type="hidden" name="MAX_FILE_SIZE" value="250000" /></td>
				    </tr>
				    <tr>
				        <td><u><b>Catégories : </b></u></td>
				        <td><select name="Categorie">
							<option value="Livres">Livres</option>
							<option value="Musique">Musique</option>
							<option value="Vetements">Vêtements</option>
							<option value="Sport&Loisirs">Sport&Loisirs</option>
						</select>
						</td>
				    </tr>
				    <tr>
				    	<td><u><b>Stock : </b></u></td>
				        <td><input placeholder="Entrez votre stock" type="text" name="Stock"/></td>
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
		}

		else if($_GET['article']=='delete')
		{
			echo "<br><br>";
			$database = "ece_amazon";
			$db_handle = mysqli_connect('localhost', 'root', '' );
			$db_found = mysqli_select_db($db_handle, $database );
			if($db_found)
			{
				$SQL2="SELECT * FROM item";
			    $result = mysqli_query($db_handle, $SQL2);
     			mysqli_close($db_handle);
			}
			echo "<br>";
    		
    		while ($db_field = mysqli_fetch_assoc($result))
    		{
    			?>

    			<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
				<body style="background:#A9F5E1;"></body>

				<?php
    			echo "<br>";
                echo $db_field['Nom'];
                echo "<br>";
                ?>
            	</div>
            	<?php

        	}
        	if(isset($_POST['submit']))
			{
				if($_POST['Nom'])
				{
					$Nom=$_POST['Nom'];
					$database = "ece_amazon";
					$db_handle = mysqli_connect('localhost', 'root', '' );
					$db_found = mysqli_select_db($db_handle, $database );
					if ($db_found) 
					{
						$SQL = "DELETE FROM item WHERE Nom='$Nom'";
     					$result = mysqli_query($db_handle, $SQL);
     					mysqli_close($db_handle);
     					?>
    					<script type="text/javascript"> alert("Vous avez supprimé un item");</script>  					
    					<?php
					}
					else 
					{
    					?>
    					<script type="text/javascript"> alert("BDD Non trouvée");</script>  					
    					<?php
					}
				}
			}
			?>

			<div style="background:#A9F5E1;width:45%;padding: 0.5%;margin-left: auto;margin-right: auto;border: 1px solid #f1f1f1;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
			<body style="background:#A9F5E1;"></body>
			<form align="center" action="" method="POST">
			<h3><b><u>Entrez l'item que vous voulez supprimer</u></b></h3>
			<h3><u>Nom:</u></h3><input placeholder="Entrez un Nom"type="text" name="Nom"/>
			<input type="submit" name="submit">
		    </form>
			</div>

		    <?php
        }
    }		
	
}
else
{
	header('Location:index1.php');
}

require_once("footer.php");
?>
