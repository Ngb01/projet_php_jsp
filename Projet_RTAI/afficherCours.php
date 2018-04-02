<?php
  include 'connexion.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Affichage des cours</title>

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
    <h2 id="titre2">Affichage des cours</h2>

    <button type="button" id="ajout" class="btn btn-light" aria-label="Left Align">
      <a href="ajouterCours.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Ajouter un cours</a>
    </button>

    <table>
      <tr>
        <th class="titre">Code cours</th>
        <th class="titre">Libellé</th>
        <th class="titre">Nb ECTS</th>
      </tr>

      <?php
  	   $res = $linkpdo->query("SELECT * FROM cours");
  	   ///Affichage des entrées du résultat une à une
  	   while ($data = $res->fetch()) {
      ?>
        <tr>
        	<th><?php echo $data[0]; ?></th>
        	<th><?php echo $data[1]; ?></th>
      		<th><?php echo $data[2]; ?></th>

      		<td><?php echo '<a href="modifierCours.php?CODECOURS='.$data['CODECOURS'].'&LIBELLECOURS='.$data['LIBELLECOURS'].'&NBECTS='.$data['NBECTS'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'; ?></td>
      		<td><?php echo '<a href="supprimerCours.php?ID='.$data['CODECOURS'].'"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>'; ?></td>
      	</tr>
      <?php
        }
      ?>
  	</table>
  </body>
</html>
