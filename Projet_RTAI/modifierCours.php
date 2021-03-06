<?php
  include 'connexion.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modification d'un cours</title>

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

    <form id="formulaire" class="form-horizontal" method="post" action="modifierCours.php">
      <div class="form-group">
        <label class="col-sm-3 control-label">Code Cours</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="codecours" value="<?php echo $_GET['CODECOURS']; ?>"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Libellé</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="libelle" value="<?php echo $_GET['LIBELLECOURS']; ?>"/> <br/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Nombres d'ECTS</label>
        <div class="col-sm-6">
          <input type="number" class="form-control" name="nbects" value="<?php echo $_GET['NBECTS']; ?>"/> <br/>
        </div>
      </div>

        <br/>
        <button type="submit" class="btn btn-default" name="envoyer">Envoyer</button>
        <button type="reset" class="btn btn-default" name="vider">Vider</button>
        <br>
    </form>

    <?php
    if( isset( $_POST['envoyer'] ) ){
      $req = $linkpdo->prepare('UPDATE cours SET CODECOURS=:codecours, LIBELLECOURS=:libelle, NBECTS=:nbects WHERE CODECOURS='.$_GET['CODECOURS']);
    	$req->execute(array(
    		'codecours' => $_POST['codecours'],
    		'libelle' => $_POST['libelle'],
    		'nbects' => $_POST['nbects']));
    	header("Refresh: 20;index.php");
    }
    ?>
  </body>
</html>
