<?php echo '<h2>Tous les diplomes de l\'Université '.$nom['NOMU'].'</h2>'; ?>
<div class="main">
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
	        		<td><a href="updateform/'.$diplome['CODEDIP'].'">Modifier</a></td>
	        		<td><a href="delete/'.$diplome['CODEDIP'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
</div>