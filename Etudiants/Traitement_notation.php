<?php
	include("connexion.php");
	if(empty($_GET['evaluation'])){
		header("location: indexEnseignant.php");
	}
	
	
	$reponse = $bdd->query('SELECT * FROM participer WHERE  ideval=(\''.$_GET['evaluation'].'\')');
	while ($donnee = $reponse->fetch()){
		//atribuer les notes au participants
		$req =('UPDATE participer SET note=(\''.$_POST[$donnee['idetu']].'\') WHERE ideval=(\''.$_GET['evaluation'].'\') AND idetu=(\''.$donnee['idetu'].'\')');
		$bdd->exec($req);
		//confirmer que l'evaluation a été noté
		$req =('UPDATE evaluation SET eval_noter=1 WHERE ideval=(\''.$_GET['evaluation'].'\')');
		$bdd->exec($req);
		}$reponse->closeCursor();
		?>
			<script>
				alert("Evaluation notée ! contacter la DAAS pour d'éventuelles modification");
			</script>
		<?php
		header("location: indexEnseignant.php");
		?>