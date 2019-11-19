<?php
session_start();
require_once("header.php");
?>

<div style="background:#A9F5E1;width:30% ; padding: 1%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
<body style="background-image: url('panierFOND.jpg'); background-size:cover;  "></body>
<h2 align="center">Mon Panier</h2>
<table style="width: 400px">
	<tr>
		<td>Photo</td>
		<td>Nom</td>
		<td>Description</td>
		<td>Quantité</td>
		<td>Prix </td>
	</tr>
</table>

</div>
<br/><br/>
<div style="background:#A9F5E1;width:30% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
    <p align="center"><a href="CompteVERIF.php"><input type="button" value="Passer à la commande"/></a></p>
</div>

