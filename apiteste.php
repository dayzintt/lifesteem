<?php
$api_url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false';

// Inicialize cURL
$ch = curl_init();

// Configure a URL e outras opções apropriadas
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desativa a verificação SSL, se necessário

// Executa a solicitação e armazena a resposta na variável $response
$response = curl_exec($ch);

// Captura qualquer erro que ocorreu durante a solicitação
if(curl_errno($ch)) {
    echo 'Erro cURL: ' . curl_error($ch);
} else {
    // Converte a resposta JSON em um array PHP
    $crypto_data = json_decode($response, true);
    if ($crypto_data) {
        echo "Conexão bem-sucedida.";
        // Aqui você pode processar e exibir os dados, por exemplo:
        echo "<pre>";
        print_r($crypto_data);
        echo "</pre>";
    } else {
        echo "Erro ao obter dados das criptomoedas.";
    }
}

// Fecha o recurso cURL e libera recursos do sistema
curl_close($ch);
?>
