<?php
  include 'connexion.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Affichage des diplomes</title>

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
    
    <table>
      <tr>
        <th class="titre">Intitulé</th>
        <th class="titre">Adresse web</th>
        <th class="titre">Niveau</th>
      </tr>

      <?php
  	   $res = $linkpdo->query("SELECT * FROM diplomes");
  	    ///Affichage des entrées du résultat une à une
  	     while ($data = $res->fetch()) {
      ?>
        	<tr>
        		<th><?php echo $data[1]; ?></th>
        		<th><?php echo $data[2]; ?></th>
        		<th><?php echo $data[3]; ?></th>


        		<td><?php echo '<a href="modifierDiplomes.php?ID='.$data['CODEDIP'].'">'."Modifier".'</a>'; ?></td>
        		<td><?php echo '<a href="supprimerDiplomes.php?ID='.$data['CODEDIP'].'">'."Supprimer".'</a>'; ?></td>
        	</tr>
        <?php
        	}
          ?>
  	</table>
  </body>
</html>
