<?php echo validation_errors(); ?>

<div class="form-group">
	<div class="main">
		<?php echo '<h2>'.$nomD['INTITULEDIP'].'</h2>'; ?>
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
	        	</tr>';
		}
		?>
		</table>
		<h2>Ajouter un cours</h2>
		<div class="form-group">
		<?php 
			echo form_open('cours/insert/'.$codeD.'');
			echo '<label for="code">Code du cours</label>';
			echo '<input class="form-control" type="text" name="code"><br>';
			echo '<label for="nom">Nom du cours</label>';
			echo '<input class="form-control" type="text" name="nom"><br>';
			echo '<label for="credits">Crédits ECTS</label>';
			echo '<input class="form-control" type="text" name="credits"><br>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Ajouter le cours"> ';
			echo '</form>';
		?>
		</div>
	</div>
</div>