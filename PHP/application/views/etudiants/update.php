<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Modifier l'étudiant</h2>
	<div class="form-group">
		<?php 
			echo form_open('etudiants/update/'.$etudiant['NUMETUDIANT']);
			echo '<label for="numero">Numéro étudiant</label>';
			echo '<input class="form-control" type="text" name="numero" readonly value="'.$etudiant['NUMETUDIANT'].'"><br>';
			echo '<label for="nom">Nom</label>';
			echo '<input class="form-control" type="text" name="nom" value="'.$etudiant['NOMET'].'"><br>';
			echo '<label for="prenom">Prenom</label>';
			echo '<input class="form-control" type="text" name="prenom" value="'.$etudiant['PRENOMET'].'"><br>';
			echo '<label for="mail">Mail</label>';
			echo '<input class="form-control" type="text" name="mail" value="'.$etudiant['EMAIL'].'"><br>';
			echo '<label for="cv">Lien vers un CV</label>';
			echo '<input class="form-control" type="text" name="cv" value="'.$etudiant['CV'].'"><br>';
			echo '<label>Diplome préparé</label>';
			echo '<select class="form-control" name="diplome">';
			foreach ($diplomes as $diplome) {
				if($diplome['CODEDIP'] == $diplome_prepare['CODEDIP']){	
					echo '<option value="'.$diplome['CODEDIP'].'" selected="selected">'.$diplome['INTITULEDIP'].'</option>';
				}else{
					echo '<option value="'.$diplome['CODEDIP'].'">'.$diplome['INTITULEDIP'].'</option>';
				}
			}
			echo '</select>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Modifier l\'étudiant"> ';
			echo '</form>';
		?>
	</div>
</div>