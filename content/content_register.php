<!DOCTYPE html>
 
<html>
 
<head>
  <title>NouveauCompte</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>

    
  <h1>Création d'un compte !</h1>
 
 
  
<form action="index.php?todo=creercompte" method="post"
      oninput="up2.setCustomValidity(up2.value != mdp.value ? 'Les mots de passe diffèrent.' : '')">
 <p>
  <label for="login">login:</label>
  <input id="login" type="text" required name="login">
 </p>
 
 <p>Nom : <input type="text" name="nom" required /></p>
 <p>Email : <input type="text" name="email" required /></p>
 <p>
  <label for="password1">Password (at least 10 caracters):</label>
  <input id="password1" type="password" required name="mdp">
 </p>
 <p>
  <label for="password2">Confirm password:</label>
  <input id="password2" type="password" name="up2">
 </p>
  <input type="submit" value="Create account">
</form>


</body>
 
</html>