<?php

require_once("header.php");



if (isset ($_GET['create'])){ 
      header('Location: creercompteclient.php');
}
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
                  $SQL="SELECT * FROM acheteur WHERE ((Email='$Email')AND(mdp='$mdp'))";
                  $result = mysqli_query($db_handle, $SQL);
                  $donnee = mysqli_fetch_array($result);
                      
            if($donnee)
                  {
                        header('Location:Categories.php');

                  }
                  else
                  {
                        ?>
              <script type="text/javascript"> alert("Email inexistant ou mot de passe incorrect");</script>
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


<div style="background: #A9F5E1;width:30% ; padding: 0.5%;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);box-sizing: border-box;">
<body style="background-image: url('acheteur.jpg'); background-size:cover;  "></body>
<form align="center" action="" method="POST">
<h1><u><big>Compte Client</big></u></h1>
<h3>Votre adresse mail :</h3>
<input placeholder="Entrez un email" type="email" name="Email"/><br/></br/>
<h3>Votre mot de passe :</h3>
<input placeholder="Entrez une adresse" type="password" name="mdp"/><br/></br/>
<input type="submit" name="submit"/><br/><br/>
<p><a href="?create"><u>Créer un compte</u></a></p>
</form>
</div>

<?php
echo
require_once("footer.php");
?>