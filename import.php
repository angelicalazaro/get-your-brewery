<?php

require_once "connect_db.php";
require_once "apiConnect.php";

$countries = [
    'france',
    'south_korea',
    'england',
    'united_states'
];

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

// Faire une boucle foreach generale qui affiche ... completer

foreach ($countries as $country) {
    $endpoint = $baseEndpoint . urlencode($country);
    $data = getApi($endpoint); 
    var_dump($data);
      
    if (empty($data)) {
        echo "Aucune donnee pour : $country\n";
        continue; // passe au pays suivant
    }

        foreach ($data as $brewery) {
            if (!is_array($brewery) || empty($brewery['id'])) {
                continue;
            }

            $params = [
                ':id' => $brewery['id'],
                ':name' => $brewery['name'] ?? null,
                ':by_type' => $brewery['by_type'] ?? null,
                ':city' => $brewery['city'] ?? null,
                ':website_url' => $brewery['website_url'] ?? null,
                ':state' => $brewery['state'] ?? null,
                ':country' => $brewery['country'] ?? null
            ];

            $checkReq = $pdo->query("SELECT * FROM breweries WHERE id = " . $pdo->quote($brewery['id']));
            $existsId = $checkReq->fetchColumn();
            // var_dump($existsId);

            if (!$existsId) {
                $insertReq->execute($params);
                echo "Insertion : " . $brewery['name'] . "<br>";
            }
        }

}

