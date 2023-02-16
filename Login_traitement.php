<?php
session_start();

try {

	if (empty($_POST['username']) and empty($_POST['password'])) {
		header("location: index.html");
	}

	include 'connexion.php';
	$_SESSION['pseudo'] = NULL;

	if (!empty($_POST['username']) and !empty($_POST['password'])) {
		$_POST['username'] = (string)$_POST['username'];
		$_POST['password'] = (string)$_POST['password'];
		$confp = 0;

		$reponse = $bdd->query('SELECT idetu AS identifiant, mailetu AS mail, pwdetu AS password, nometu AS nom, prenometu AS prenom FROM etudiant');
		while ($donnee = $reponse->fetch()) {
			if ($donnee['mail'] == $_POST['username']) {
				if (password_verify($_POST['password'], $donnee['password'])) {
					$_SESSION['pseudo'] = $donnee['identifiant'];
					$_SESSION['nom'] = $donnee['nom'];
					$_SESSION['prenom'] = $donnee['prenom'];
					$confp = 1;
					break;
				}
			}
		}
		$reponse->closeCursor();

		$reponse = $bdd->query('SELECT idens AS identifiant, mailens AS mail, pwdens AS password FROM enseignant');
		while ($donnee = $reponse->fetch()) {
			if (($donnee['mail'] == $_POST['username'])) {
				if (password_verify($_POST['password'], $donnee['password'])) {
					$_SESSION['pseudo'] = $donnee['identifiant'];
					$confp = 2;
					break;
				}
			}
		}
		$reponse->closeCursor();

		$reponse = $bdd->query('SELECT idres AS identifiant, mailres AS mail, pwdres AS password FROM responsable');
		while ($donnee = $reponse->fetch()) {
			if (($donnee['mail'] == $_POST['username'])) {
				if (password_verify($_POST['password'], $donnee['password'])) {
					$_SESSION['pseudo'] = $donnee['identifiant'];
					$confp = 3;
					break;
				}
			}
		}
		$reponse->closeCursor();

		if ($confp == 1) {
			header("location: Etudiants/indexEtudiant.php");
		} else if ($confp == 2) {
			header("location: Enseignants/indexEnseignant.php");
		} else if ($confp == 3) {
			header("location: Responsable/matiere.php");
		} else {
?>
			<script>
				alert("login ou mot de passe incorrecte");
			</script>
<?php
			require_once("index.html");
		}
	}
} catch (PDOException $error) {
	$message = $error->getMessage();
}

?>