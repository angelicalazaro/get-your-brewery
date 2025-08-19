<?php

require_once "config.php";

function getApi($baseEndpoint) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => 0
    ));
    $response = curl_exec($curl);

    if ($response === false) {
        echo "Erreur cURL : " . curl_error($curl);
        curl_close($curl);
        return [];
    }

    curl_close($curl);
    // $data => recupere le json decode
    $data = json_decode($response, true);
    if (!is_array($data)) {
        echo "Erreur JSON : " . json_last_error_msg();
        return [];
    }
    return $data;
}

?>