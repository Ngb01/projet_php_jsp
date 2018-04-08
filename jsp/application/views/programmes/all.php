<h2>Tous les programmes d'échanges disponibles</h2>
<div class="main">
	<a href="programmes/insert/">+ Insérer un nouveau programme</a>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th>Programme</th>
		      <th>Description</th>
		      <th>Université réferente</th>
		    </tr>
  		</thead>
		<?php
		foreach ($programmes as $programme) {
			echo'<tr>
	        		<td>'.$programme['INTITULEP'].'</td>
	        		<td style="text-align:left;">'.$programme['EXPLICATION'].'</td>
	        		<td>'.$programme['NOMU'].'</td>
	        		<td><a href="programmes/update/'.$programme['INTITULEP'].'">Modifier</a></td>
	        		<td><a href="programmes/delete/'.$programme['INTITULEP'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
</div>