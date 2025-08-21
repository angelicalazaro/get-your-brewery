<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/public/pages/passwordStyle.css"/>
</head>
<body>
    <main>
        <h1>Connexion</h1>
        <form>
            <label for="name">Quelle est ton adresse e-mail ?
                <input type="text" id="name" name="user_name"/>
            </label>
            <label for="password">Ton mot de passe :
            <div class="input-wrapper">
                <input type="password" id="password" placeholder="Mot de passe"/>
                <div class="password-icon">
                    <i data-feather="eye"></i>
                    <i data-feather="eye-off"></i>
                </div>
            </div>
            </label>
           <script src="https://unpkg.com/feather-icons"></script>
            <script>
            feather.replace();
            </script>
            <script src="/public/pages/password.js"></script>
        <button onclick type="submit">Se connecter</button>
</form>    
</body>
</html>