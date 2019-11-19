<?php
require_once("header.php");

session_start();

if(isset($_POST['submit'])) 
{
      if(($_POST['Email'])&&($_POST['mdp']))
      {
          $Email=$_POST['Email'];
          $mdp=$_POST['mdp'];
          $database = "ece_amazon";
            $db_handle = mysqli_connect('localhost', 'root', '' );
            $db_found = mysqli_select_db($db_handle, $database );
            if($db_found)
            {
                  $SQL="SELECT * FROM acheteur WHERE (Email='$Email')";
                  $result = mysqli_query($db_handle, $SQL);
                  $donnee = mysqli_fetch_array($result);
            
            if($donnee)
                  {
                        ?>
                  <script type="text/javascript"> alert("Email déjà pris");</script>
                  <?php
                  }
                  else
                  {
                        $SQL2 = "INSERT INTO acheteur (Email, mdp)  VALUES ('$Email', '$mdp')";
                  $result2 = mysqli_query($db_handle, $SQL2);
                  

                        header('Location:infos.php');               
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


<div style="background:#A9F5E1;width:35% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
    <body style="background-image: url('compteAcheteur.jpg'); background-size:cover;  "></body>
<form align="center" action="" method="POST">
<h1><u><big>Création du compte client</big></u></h1>
<h3>Email :</h3><input placeholder="Entrez un Email" type="email" name="Email"/><br/><br/>
<h3>Mot de Passe :</h3>
<input placeholder="Entrez une mot de passe" type="password" name="mdp"/><br/></br/>
<input type="submit" name="submit"/><br/><br/>
</form>
</div>

<?php
echo
require_once("footer.php");
?>