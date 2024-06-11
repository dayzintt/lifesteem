<?php
require 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

include_once('configs.php');

// Verificar se o ID do boleto foi passado
if (!isset($_GET['id'])) {
    die("ID do boleto não fornecido.");
}

$boleto_id = $_GET['id'];

// Consulta para obter os dados do boleto
$sql = "SELECT * FROM boletos WHERE id = ?";
$stmt = $conex->prepare($sql);
$stmt->bind_param("i", $boleto_id);
$stmt->execute();
$result = $stmt->get_result();
$boleto = $result->fetch_assoc();

// Verificar se o boleto existe
if (!$boleto) {
    die("Boleto não encontrado.");
}

// Dados para o QR Code PIX
$pixKey = "sua_chave_pix"; // Substitua pela sua chave PIX
$description = $boleto['descricao'];
$amount = number_format($boleto['valor'], 2, '.', ''); // Formatar o valor para 2 casas decimais
$merchantName = "Seu Nome ou Empresa"; // Substitua pelo nome do comerciante

// Montar os dados do payload PIX de forma simplificada
$payload = "000201"
    . "010211"
    . "26360014br.gov.bcb.pix"
    . "0114$pixKey"
    . "52040000"
    . "5303986"
    . "5405$amount"
    . "5802BR"
    . "5901$merchantName"
    . "6008BRASILIA"
    . "6304";

// Configurar o QR Code
$options = new QROptions([
    'version'    => 7, // Aumentar a versão do QR Code para suportar mais dados
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel'   => QRCode::ECC_L, // Nível mais baixo de correção de erros para permitir mais dados
]);

// Gerar o QR Code
$qrcode = new QRCode($options);
$qrcodeImage = $qrcode->render($payload);

// Exibir o QR Code na página HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code PIX</title>
</head>
<body>
    <h1>QR Code para Pagamento</h1>
    <img src="data:image/png;base64,<?php echo base64_encode($qrcodeImage); ?>" alt="QR Code PIX">
</body>
</html>
