<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Ajouter un étudiant</h2>
	<div class="form-group">
		<?php 
			echo form_open('etudiants/insert/');
			echo '<label for="numero">Numéro étudiant</label>';
			echo '<input class="form-control" type="text" name="numero"><br>';
			echo '<label for="nom">Nom</label>';
			echo '<input class="form-control" type="text" name="nom"><br>';
			echo '<label for="prenom">Prenom</label>';
			echo '<input class="form-control" type="text" name="prenom"><br>';
			echo '<label for="mail">Mail</label>';
			echo '<input class="form-control" type="text" name="mail"><br>';
			echo '<label for="cv">Lien vers un CV</label>';
			echo '<input class="form-control" type="text" name="cv"><br>';
			echo '<label>Diplome préparé</label>';
			echo '<select class="form-control" name="diplome">';
			$premier = true;
			foreach ($diplomes as $diplome) {
				if($premier === true){	
					echo '<option value="'.$diplome['CODEDIP'].'" selected="selected">'.$diplome['INTITULEDIP'].'</option>';
					$premier = false;
				}else{
					echo '<option value="'.$diplome['CODEDIP'].'">'.$diplome['INTITULEDIP'].'</option>';
				}
			}
			echo '</select>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Ajouter l\'étudiant"> ';
			echo '</form>';
		?>
	</div>
</div>