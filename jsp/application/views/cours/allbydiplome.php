<?php echo '<h2>Tous les cours du diplome '.$nomD['INTITULEDIP'].'</h2>'; ?>
<div class="main">
	<?php echo '<a class="action" href="insert/'.$diplome.'">+ Insérer un nouveau cours</a>';?>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th>Code</th>
		      <th>Cours</th>
		      <th>Crédits ECTS</th>
		    </tr>
  		</thead>
		<?php
		foreach ($cours as $c) {
			echo'<tr>
	        		<td>'.$c['CODECOURS'].'</td>
	        		<td>'.$c['LIBELLECOURS'].'</td>
	        		<td>'.$c['NBECTS'].'</td>
	        		<td><a href="updateform/'.$c['CODECOURS'].'">Modifier</a></td>
	        		<td><a href="delete/'.$c['CODECOURS'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
</div>