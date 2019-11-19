<?php
session_start();
require_once("header.php");
?>
<h1><u><big>Bienvenue</big></u></h1>
<h2 align="center"><big>Musique</big></h2>
<?php
$database = "ece_amazon";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database );
	if($db_found)
	{
		$SQL="SELECT * FROM item WHERE Categorie='Musique' ORDER BY Id DESC";
	    $result = mysqli_query($db_handle, $SQL);
		mysqli_close($db_handle);
	}
	echo "<br>";
	while ($db_field = mysqli_fetch_assoc($result))
	{
		echo '<br>';
		?>
		<body style="background:#A9F5E1;"></body>
<div style="background:white;width:46% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    background: #fff;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
   		<h3 align ="center"><?php echo ''; echo $db_field['Nom'];?></h3><br/>
    	<img style="width:300px; height: 200px;" src="<?php echo $db_field['Photo'];?>"/>
		<h3>Description: </h3> <?php echo $db_field['Description'];?><br/>
		<h3>Prix : </h3> <?php echo $db_field['Prix'];?> Euros<br/>
		<h3>Stock : </h3> <?php echo $db_field['Stock'];?></p><br/>
		<?php 
		if($db_field['Stock']==0)
		{
			?><h4 style="color:red;">Stock épuisé</h4>
			<?php
		} 
		else
		{
			?><a href="Panier.php?Id=<?php echo $db_field['Id'];?>">Voir article</a>
			<?php
		}
?>
	</div>
		<?php
	}
require_once("footer.php");
?>