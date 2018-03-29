<!DOCTYPE html>
<html>
	<head>
		<title>Connexion à l'administration du site de Jean Forteroche</title>
		<meta charset="utf-8" />
		<link href="public/css/styleBackend.css" rel="stylesheet" /> 
	</head>
	<body id="connectionPage">
		<h1>Jean Forteroche</h1>
		<h2>Billet simple pour l'Alaska</h2>
		
		<form action="?action=adminAccess" method="post">
			<fieldset id="connectionFields">
            <legend>Accéder à l'espace d'administration :</legend>
				<label>Pseudo</label>
				<input type="text" name="login" id="inputLogin" /><br />
				<label>Mot de passe</label>
				<input type="password" name="password"/>
			</fieldset>
			<input type="submit" value="Se connecter" class="buttonAdmin" />
		</form>
	</body>
</html>