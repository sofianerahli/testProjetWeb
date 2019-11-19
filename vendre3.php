<?php
session_start();
require_once("header.php");
?>
<h1 align="center"><u><big>Bienvenue <?php echo $_SESSION['username'];?></big></u></h1>
<h2><I><?php echo $_SESSION['username'];?></I></h2>
<p><a href="?fond"><input type="button" value="Choix du fond d'ecran"/></a></p>
<p><a href="?logout"><input type="button" value="Déconnexion"/></a></p>
<p align="center"><a href="?article=add"><input type="button" value="Ajouter un item"/></a></p>
<p align="center"><a href="?article=delete"><input type="button" value="Supprimer un item"/></a></p>
<body style="background:#81F781;"></body>

<?php
if (isset ($_GET['logout'])){ 
	session_destroy(); 
	header('Location: index1.php');
}
if (isset ($_GET['fond'])){ 
	header('Location: choixfond.php');
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
	}

require_once("footer.php");
?>