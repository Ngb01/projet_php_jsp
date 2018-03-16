<?php
  include 'connexion.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

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
