<!DOCTYPE html>
<html>
	<head>
		<title>Connexion à l'administration du site de Jean Forteroche</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Connexion</h1>
		<form action="?action=adminAccess" method="post">
			<label>Pseudo</label>
			<input type="text" name="login" /><br />

			<label>Mot de passe</label>
			<input type="password" name="password" /><br /><br />

			<input type="submit" value="Connexion" />
		</form>
	</body>
</html>