<?php
  include 'connexion.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un diplôme</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div id="titre">
          <a href="index.php"><h1>Gestion de la mobilité des étudiatnts</h1></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
          <li><a href="#">Contrat</a></li>
          <li><a href="afficherCours.php">Cours</a></li>
          <li><a href="#">Demande financière</a></li>
          <li><a href="#">Demande mobilité</a></li>
          <li><a href="afficherDiplomes.php">Diplome</a></li>
          <li><a href="#">Etudiant</a></li>
          <li><a href="#">Programme</a></li>
        </ul>
      </div>
    </nav>

    <h1>Ajouter un diplôme</h1>
    <form method="post" action="ajouterDiplomes.php">
        Intitulé : <input type="text" name="intitule"/> <br/>
        Adresse web : <input type="text" name="adresseweb"/> <br/>
        Niveau : <input type="text" name="niveau"/> <br/>

        <br/><input type="submit" name="envoyer" value="Envoyer"/>
        <input type="reset" name="vider" value="Vider"/>
    </form>

    <?php
      if (isset($_POST['envoyer'])) {
        $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
	      $message = $msg_erreur;

        //verification des champs
        if (empty($_POST['intitule']))
          $message .= "Intitulé<br/>";
        if (empty($_POST['adresseweb']))
          $message .= "Adresse web<br/>";
        if (empty($_POST['niveau']))
          $message .= "Niveau<br/>";

      //si un champ est vide, on affiche le message d'erreur
      if (strlen($message) > strlen($msg_erreur)) {
        echo $message;
      } else {
        //Recupération des paramètres du formulaire
        $req = $linkpdo->prepare('INSERT INTO diplomes (INTITULEDIP, ADRESSEWEBD, NIVEAU) VALUES (:intitule, :adresseweb, :niveau)');

        $req->execute(array(
      		'intitule' => $_POST['intitule'],
      		'adresseweb' => $_POST['adresseweb'],
      		'niveau' => $_POST['niveau']
        ));

        if ($req) {
          echo 'Le diplome a bien été ajouté !';
        } else {
          echo 'Le diplome n a pas été ajouté: erreur !';
        }
      }

    }

    ?>

  </body>
</html>
