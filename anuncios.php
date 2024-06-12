<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(95deg, rgb(76, 200, 238), rgba(255, 145, 0, 0.856));
            text-align: center;
            color: white;
            padding: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid white;
            padding: 10px;
        }
        th {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
    <title>Anúncios de Criptomoedas</title>
</head>
<body>
    <h1>Anúncios de Criptomoedas</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço Atual (USD)</th>
                <th>Variação de 24h (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $api_url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
            $api_key = 'b0f72951-f337-46fa-a166-d28d48415680'; // Substitua pela sua chave de API

            $headers = [
                'Accepts: application/json',
                'X-CMC_PRO_API_KEY: ' . $api_key
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Erro cURL: ' . curl_error($ch);
            } else {
                $crypto_data = json_decode($response, true);
                if ($crypto_data && isset($crypto_data['data'])) {
                    foreach ($crypto_data['data'] as $crypto) {
                        echo "<tr>";
                        echo "<td>{$crypto['name']}</td>";
                        echo "<td>\${$crypto['quote']['USD']['price']}</td>";
                        echo "<td>{$crypto['quote']['USD']['percent_change_24h']}%</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Erro ao obter dados das criptomoedas.</td></tr>";
                }
            }

            curl_close($ch);
            ?>
        </tbody>
    </table>
</body>
</html>
