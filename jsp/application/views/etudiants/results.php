<h2>Résultat de la recherche</h2>
<div class="main">
	<table class="table table-striped">
		<thead>
		    <tr>
				<th>Numéro d'étudiant</th>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Mail</th>
		    </tr>
  		</thead>
		<?php
		foreach ($etudiants as $etudiant) {
			echo'<tr>
	        		<td>'.$etudiant['NUMETUDIANT'].'</td>
	        		<td>'.$etudiant['PRENOMET'].'</td>
	        		<td>'.$etudiant['NOMET'].'</td>
	        		<td>'.$etudiant['EMAIL'].'</td>
	        		<td><a href="updateform/'.$etudiant['NUMETUDIANT'].'">Modifier</a></td>
	        		<td><a href="delete/'.$etudiant['NUMETUDIANT'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
	<h2>Nouvelle recherche</h2>
	<div class="form-group line">
	<?php 
		echo form_open('etudiants/search');
		echo '<label for="nom">Nom de l\'étudiant : </label>';
		echo '<input class="form-control" type="text" name="nom"">';
		echo '<input class="btn btn-primary" type="submit" name="submit" value="Rechercher"> ';
		echo '</form>';
	?>
	</div>
</div>