<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="stylesheet" src="/public/pages/passwordStyle.css"/>
</head>
<body>
    <h1>Inscription</h1>
    <form>
        <label for="name">Comment tu t'appeles ?</label>
        <input type="text" id="name" name="user_name"/>

        <label for="mail">Ton adresse e-mail :</label>
        <input type="email" id="mail" name="user_mail"/>

        <label for="password">Choissis un mot de passe : 
        <input type="password" placeholder="Mot de passe"/>
        <div class="password-icon">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
        </div>
        </label>

         <script src="https://unpkg.com/feather-icons"></script>
            <script>
            feather.replace();
            </script>
            <script src="/public/pages/password.js"></script>
        <button onclick type="submit">S'inscrire</button>
</form>    
</body>
</html>