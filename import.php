<?php

require_once "./config/connect_db.php";
require_once "./config/apiConnect.php";
require_once "./config/config.php";

$pdo = connectDb();

$insertReq = $pdo->prepare("
     INSERT INTO breweries (`id`, `name`, `by_type`, `city`, `website_url`, `state`, `country`)
     VALUES (:id, :name, :by_type, :city, :website_url, :state, :country)
     ON DUPLICATE KEY UPDATE
        name = VALUES(name),
        by_type = VALUES(by_type),
        city = VALUES(city),
        website_url = VALUES(website_url),
        state = VALUES(state),
        country = VALUES(country)
");

function importBreweries($pdo, $insertReq, $endpoint, $filterLabel) {

    $data = getApi($endpoint);

    if (empty($data)) {
        echo "Aucune donnée pour : $filterLabel<br>";
        return;
    }

    foreach ($data as $brewery) {
        if (!is_array($brewery) || empty($brewery['id'])) {
            continue;
        }

        $params = [
            ':id'            => $brewery['id'],
            ':name'          => $brewery['name'],
            ':by_type'       => $brewery['brewery_type'] ?? null,
            ':city'          => $brewery['city'] ?? null,
            ':website_url'   => $brewery['website_url'] ?? null,
            ':state'         => $brewery['state'] ?? null,
            ':country'       => $brewery['country'] ?? null
        ];

        $checkReq = $pdo->query("SELECT 1 FROM breweries WHERE id = " . $pdo->quote($brewery['id']) . " LIMIT 1");
        $existsId = $checkReq->fetchColumn();
        
        if (!$existsId) {
            $insertReq->execute($params);
            echo "Insertion : " . ($brewery['name'] ?? $brewery['id']) . " ($filterLabel)<br>";
        }
    }
}


$countries = ['france','south_korea','england','united_states'];
foreach ($countries as $country) {
    $endpoint = $baseEndpoint . urlencode($country);
    importBreweries($pdo, $insertReq, $endpoint, "pays=$country");
}


$types = ['micro','brewpub','large'];
foreach ($types as $type) {
    $endpoint = $endpointByType . urlencode($type);
    importBreweries($pdo, $insertReq, $endpoint, "type=$type");
}


// $insertReq = $pdo->prepare("
//     INSERT INTO breweries (`id`, `name`, `by_type`, `city`, `website_url`, `state`, `country`)
//     VALUES (:id, :name, :by_type, :city, :website_url, :state, :country)
//     ON DUPLICATE KEY UPDATE
//         name = VALUES(name),
//         by_type = VALUES(by_type),
//         city = VALUES(city),
//         website_url = VALUES(website_url),
//         state = VALUES(state),
//         country = VALUES(country)
//     ");

// // Faire une boucle foreach generale qui affiche LES PAYS et LES TYPES de brasserie... completer

// foreach ($countries as $country) {
//     $endpoint = $baseEndpoint . urlencode($country);
//     $data = getApi($endpoint); 
//     var_dump($data);
      
//     if (empty($data)) {
//         echo "Aucune donnee pour : $country\n";
//         continue; // passe au pays suivant
//     }
//         // nettoyer les donnees avant de les inserer : 
//         // $brewery est une seule brasserie en tableau associatif
//         foreach ($data as $brewery) {
//         // securite pour continuer le script et que si l'API n'envoie pas un tableau associatif ou l'id est incomplet, on continue la boucle
//             if (!is_array($brewery) || empty($brewery['id'])) {
//                 continue;
//             }

//             $params = [
//                 ':id' => $brewery['id'],
//                 ':name' => $brewery['name'] ?? null,
//                 ':by_type' => $brewery['by_type'] ?? null,
//                 ':city' => $brewery['city'] ?? null,
//                 ':website_url' => $brewery['website_url'] ?? null,
//                 ':state' => $brewery['state'] ?? null,
//                 ':country' => $brewery['country'] ?? null
//             ];
            
//             $checkReq = $pdo->query("SELECT * FROM breweries WHERE id = " . $pdo->quote($brewery['id']));
//             $existsId = $checkReq->fetchColumn();

//             if (!$existsId) {
//                 $insertReq->execute($params);
//                 echo "Insertion : " . $brewery['name'] . "<br>";
//             }
//         }

// }

