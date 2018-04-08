<h2>Facilitez vos programmes d'échanges</h2>
<p>Cette application vous permettra de faciliter vos demandes de mobilités étudiantes.</p>
<p>Vous trouverez l'ensemble des programmes d'échanges proposés par les universités adhérentes et les formations possibles.</p>
<div class="main">
	<table class="table table-striped">
		<thead>
		    <tr>
		      <th>Université</th>
		      <th>Adresse</th>
		      <th>Site internet</th>
		      <th>Contact</th>
		    </tr>
  		</thead>
		<?php
		foreach ($universites as $universite) {
			echo'<tr>
	        		<td>'.$universite['NOMU'].'</td>
	        		<td>'.$universite['ADRESSEPOSTU'].'</td>
	        		<td>'.$universite['ADRESSEWEBU'].'</td>
	        		<td>'.$universite['ADRESSEELECTU'].'</td>
	        	</tr>';
		}
		?>
	</table>
</div>