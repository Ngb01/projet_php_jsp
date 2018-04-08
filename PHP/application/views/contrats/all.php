<h2>Tous les contrats de l'université <?php echo $universite?></h2>
<div class="main">
	<a href="insert/">+ Insérer un nouveau contrat</a>
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th>Programme de mobilité</th>
		      <th>Durée</th>
		      <th>État</th>
		    </tr>
  		</thead>
		<?php
		foreach ($contrats as $contrat) {
			echo'<tr>
	        		<td>'.$contrat['INTITULEP'].'</td>
	        		<td>'.$contrat['DUREE'].'</td>
	        		<td>'.$contrat['ETATCONTRAT'].'</td>
	        		<td><a href="update/'.$contrat['IDCONTRAT'].'">Modifier</a></td>
	        		<td><a href="delete/'.$contrat['IDCONTRAT'].'">Supprimer</a></td>
	        	</tr>';
		}
		?>
	</table>
</div>