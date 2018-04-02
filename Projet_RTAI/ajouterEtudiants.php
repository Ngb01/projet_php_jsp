<?php
  include 'connexion.php'
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un étudiant</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <a href="index.php"><h1 id="titre">Gestion de la mobilité des étudiatnts</h1></a>
        <ul class="nav navbar-nav">
          <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
          <li><a href="afficherContrats.php">Contrat</a></li>
          <li><a href="afficherCours.php">Cours</a></li>
          <li><a href="#">Demande financière</a></li>
          <li><a href="#">Demande mobilité</a></li>
          <li><a href="afficherDiplomes.php">Diplome</a></li>
          <li><a href="afficherEtudiants.php">Etudiant</a></li>
          <li><a href="afficherProgrammes.php">Programme</a></li>
        </ul>
      </div>
    </nav>

    <h2 id="titre2">Ajouter un étudiant</h2>
    <form id="formulaire" class="form-horizontal" method="post" action="ajouterEtudiants.php">
      <div class="form-group">
        <label class="col-sm-3 control-label">Numéro Etudiant</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" name="numetudiant"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Nom</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nom"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Prenom</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" name="prenom"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">E-mail</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="email"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">CV</label>
        <div class="col-sm-6">
          <input type="file" name="cv"/> <br/>
        </div>
      </div>

        <br/>
        <button type="submit" class="btn btn-default" name="envoyer">Envoyer</button>
        <button type="reset" class="btn btn-default" name="vider">Vider</button>
        <br>
    </form>

    <?php
      if (isset($_POST['envoyer'])) {
        $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
	      $message = $msg_erreur;

        //verification des champs
        if (empty($_POST['numetudiant']))
          $message .= "Numéro étudiant<br/>";
        if (empty($_POST['nom']))
          $message .= "Nom<br/>";
        if (empty($_POST['prenom']))
          $message .= "Prenom<br/>";
        if (empty($_POST['email']))
            $message .= "Email<br/>";
        if (empty($_POST['cv']))
            $message .= "CV<br/>";

      //si un champ est vide, on affiche le message d'erreur
      if (strlen($message) > strlen($msg_erreur)) {
        echo $message;
      } else {
        //Recupération des paramètres du formulaire
        $req = $linkpdo->prepare('INSERT INTO etudiants (NUMETUDIANT, NOMET, PRENOMET, EMAIL, CV) VALUES (:numetudiant, :nom, :prenom, :email, :cv)');

        $req->execute(array(
      		'numetudiant' => $_POST['numetudiant'],
      		'nom' => $_POST['nom'],
      		'prenom' => $_POST['prenom'],
          'email' => $_POST['email'],
      		'cv' => $_POST['cv']
        ));

        if ($req) {
          echo 'L\'étudiant a bien été ajouté !';
        } else {
          echo 'L\'étudiant n a pas été ajouté: erreur !';
        }
      }

    }

    ?>

  </body>
</html>
