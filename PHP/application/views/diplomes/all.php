<h2>Tous les diplomes</h2>
<div class="main">
	<a href="diplomes/insert/">+ Insérer un nouveau diplome</a>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th>Diplôme</th>
		      <th>Site Internet</th>
		      <th>Niveau d'étude</th>
		    </tr>
  		</thead>
		<?php
		foreach ($diplomes as $diplome) {
			echo'<tr>
	        		<td>'.$diplome['INTITULEDIP'].'</td>
	        		<td>'.$diplome['ADRESSEWEBD'].'</td>
	        		<td>'.$diplome['NIVEAU'].'</td>
	        		<td><a href="cours/'.$diplome['CODEDIP'].'">Afficher les cours</a></td>
	        		<td><a href="diplomes/updateform/'.$diplome['CODEDIP'].'">Modifier</a></td>
	        		<td><a href="diplomes/delete/'.$diplome['CODEDIP'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
</div>