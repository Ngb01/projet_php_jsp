<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/jsp/style.css">
  </head>
  <body>
  	<?php
  		$base = 'http://localhost/jsp/index.php';
	    echo '<header>
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div id="titre">
							<a href="'.$base.'"><h1>Gestion de la mobilité des étudiants</h1></a>
						</div>
						<div class="container">
							<div class="collapse navbar-collapse navbar-ex1-collapse">
								<ul class="nav navbar-nav">
									<li><a href="'.$base.'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
									<li><a href="'.$base.'/diplomes/search">Diplomes</a></li>
									<li><a href="'.$base.'/cours">Cours</a></li>
									<li><a href="'.$base.'/etudiants">Etudiants</a></li>
									<li><a href="'.$base.'/programmes">Programmes</a></li>
									<li><a href="'.$base.'/contrats">Contrats</a></li>
									<li><a href="'.$base.'">Demande financière</a></li>
									<li><a href="'.$base.'">Demande mobilité</a></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</header>
			<div class="container">';