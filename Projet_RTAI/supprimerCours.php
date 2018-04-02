<?php
  include 'connexion.php';
  $linkpdo ->exec("DELETE FROM cours WHERE CODECOURS=".$_GET['ID']."");
?>
  <html>
    <head>
      <meta charset="UTF-8">
      <title>Supprimer un cours</title>

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
        Supprimé de la base de donnée</body>
  	 </head>
  </html>
<?php
  header("Refresh: 5;index.php");
?>
