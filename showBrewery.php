
<?php

    include_once __DIR__ . "connect_db.php";
    $sql = "SELECT * FROM breweries";
    $pdo = connectDb();
    $resultPdoStatement = $pdo->query($sql, PDO::FETCH_ASSOC);
    $breweries = $resultPdoStatement->fetchAll();

?>




<!DOCTYPE html>
<!-- 
OUVRIR le <html>, <head>, <body>, <main>
METTRE un lien pour "Ajouter un utilisateur"
CRÉER un <table> pour afficher la liste
CRÉER l’en-tête de tableau <thead> avec "Nom", "Email", "Modifier", "Supprimer"  
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <main>
        <div class="link_container">
            <!-- <a class="link" href="addUser.php">Ajouter un utilisateur</a> -->
        </div>
        <section>
            <table>
                <thead>
                    <!-- <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Modifier<img src="../images/write.png"/></th>
                        <th>Supprimer<img src="../images/remove.png"/></th>
                    </tr> -->
                </thead>
                <tbody>
                    
                    <?php
                        foreach($names as $name) { ?> 
                            <tr> 
                                <td><?=$name['name']?></td>
                                <!-- <td><?=$user['email']?></td> -->
                            </tr>
                        
                    <?php } ?>
                    
                    
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
