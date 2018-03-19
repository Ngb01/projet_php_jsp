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

    <form method="post" action="modifierCours.php">
        Code Cours: <input type="text" name="codecours" value="<?php echo $data[0]; ?>"/> <br/>
        Libellé : <input type="text" name="libelle" value="<?php echo $data[1]; ?>"/><br/>
        Nombres d'ECTS : <input type="number" name="nbects" value="<?php echo $data[2]; ?>"/><br/>

        <br/><input type="submit" name="envoyer" value="Envoyer"/>
        <input type="reset" name="vider" value="Vider"/>
        <br>
    </form>

    <?php
    if( isset( $_POST['envoyer'] ) ){
      $req = $linkpdo->prepare('UPDATE cours SET CODECOURS=:codecours, LIBELLECOURS=:libelle, NBECTS=:nbects WHERE CODECOURS='.$_GET['ID']);
    	$req->execute(array(
    		'codecours' => $_POST['codecours'],
    		'libelle' => $_POST['libelle'],
    		'nbects' => $_POST['nbects']));
    	header("Refresh: 20;index.php");
    }
    ?>
  </body>
</html>
