<?php
session_start();
require_once("header.php");

$database = "ece_amazon";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database );
$Id=$_GET['Id'];
if($db_found)
	{
		$SQL="SELECT * FROM item WHERE Id='$Id'";
	    $result = mysqli_query($db_handle, $SQL);
	    $donnee = mysqli_fetch_assoc($result);
	}
?>
<body style="background:#A9F5E1;"></body>
<div style="background:white;width:30% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
    	<h3 align ="center"><?php echo $donnee['Nom'];?></h3><br/>
    	<?php $_SESSION['Nom']=$donnee['Nom'];?>
    	<img style="width:300px; height: 200px;" src="<?php echo $donnee['Photo'];?>"/>
		<h3>Description: </h3> <?php echo $donnee['Description'];?><br/>
		<h3>Prix : </h3> <?php echo $donnee['Prix'];?> Euros<br/>
		<h3>Stock : </h3> <?php echo $donnee['Stock'];?></p><br/>

<form align="center"  method="POST" action="ajoutPanier.php">
				<table>
				    <tr>
				          <td><b><u>Quantité : </u></b></td>
				          <td><input placeholder="Entrez une quantité" type="text" name="Qte"/></td>
				    </tr>
				    </tr>
				          <td colspan="3" align="center">
				          <input type="hidden" value="<?php echo $donnee['Id'];?>"/>
				          <input type="submit" value="Ajouter au panier"name="submit"/>
				    </td>
				</table>
</form>
</div>