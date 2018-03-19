<?php
  include 'connexion.php';
  $linkpdo ->exec("DELETE FROM cours WHERE CODECOURS=".$_GET['ID']."");
?>
  <html>
    <head><meta charset="UTF-8"></head>
      <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="index.php">Gestion de la mobilité des étudiatnts</a>
            </div>
            <ul class="nav navbar-nav">
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
        Supprimé de la base de donnée</body>
  	 </head>
  </html>
<?php
  header("Refresh: 5;index.php");
?>
