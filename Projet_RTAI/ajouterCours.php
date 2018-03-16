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

    <h1>Ajouter un cours</h1>

    <form method="post" action="ajouterCours.php">
        Code Cours: <input type="text" name="codecours"/> <br/>
        Libellé : <input type="text" name="libelle"/> <br/>
        Nombres d'ECTS : <input type="number" name="nbects"/> <br/>

        <br/><input type="submit" name="envoyer" value="Envoyer"/>
        <input type="reset" name="vider" value="Vider"/>
        <br>
    </form>

    <?php
      if (isset($_POST['envoyer'])) {
        $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
	      $message = $msg_erreur;

        //verification des champs
        if (empty($_POST['codecours']))
          $message .= "Code cours<br/>";
        if (empty($_POST['libelle']))
          $message .= "Libelle<br/>";
        if (empty($_POST['nbects']))
          $message .= "Nb ECTS<br/>";

      //si un champ est vide, on affiche le message d'erreur
      if (strlen($message) > strlen($msg_erreur)) {
        echo $message;
      } else {
        //Recupération des paramètres du formulaire
        $req = $linkpdo->prepare('INSERT INTO cours (CODECOURS, LIBELLECOURS, NBECTS) VALUES (:codecours, :libelle, :nbects)');

        $req->execute(array(
      		'codecours' => $_POST['codecours'],
      		'libelle' => $_POST['libelle'],
      		'nbects' => $_POST['nbects']
        ));

        if ($req) {
          echo 'Le cours a bien été ajouté !';
        } else {
          echo 'Le cours n a pas été ajouté: erreur !';
        }
      }

    }

    ?>

  </body>
</html>
