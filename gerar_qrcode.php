<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Verifique se o parâmetro 'valor' está presente na URL
if (!isset($_GET['valor'])) {
    // Se o parâmetro 'valor' não estiver presente, redirecione de volta para a página anterior
    header('Location: index.php');
    exit();
}

// Recupere o valor do boleto da URL
$valor_do_boleto = $_GET['valor'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar QR Code</title>
    <style>
        .botao {
            background-color: rgb(3, 92, 3);
            border: none;
            padding: 15px;
            width: 40%;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            position: absolute;
            right: 30%;
            top: 80%;
        }
        body {

            font-family: Arial, sans-serif;
            background-color: #000;
            text-align: center;
            padding: 20px;
            color: white;
        }
        .dark-mode  {
            background-color: #050;
            color: white;
        }
        /* Estilos para o botão de Modo Escuro */
        .dark-mode #modoEscuroBtn {
            background-color: #555;
            color: white;
        }
        #qrCodeImage {
            display: block; /* Por padrão, o elemento deve ser exibido */
            position: absolute;
            left: 38%;
        }
        #verifiedImage {
            display: none; /* Inicialmente, a imagem de verificado deve estar oculta */
            position: absolute;
            left: 38%;
        }


    </style>
</head>
<body>
    <h1>Pagamento por QR code</h1>
    <p>Valor de Pagamento: R$ <?php echo $valor_do_boleto; ?></p> <!-- Exibe o valor do boleto -->
    <br>
    <br>
    <br>
    <!-- QR Code inicialmente visível -->
    <img id="qrCodeImage" src="download.png" alt="QR Code"  width="400" height="400">

    <!-- Imagem de verificado inicialmente oculta -->
    <img id="verifiedImage" src="verificado.png" alt="Verified" width="400" height="400">

    <!-- Botão para Modo Escuro / Confirmar pagamento -->
    <br>
    <br>
    <br>
    <button class='botao' id="modoEscuroBtn">Confirmar pagamento.</button>

    <script>
        // Selecione o botão de Modo Escuro / Confirmar pagamento
        var botaoModoEscuro = document.getElementById('modoEscuroBtn');

        // Adicione um ouvinte de evento de clique ao botão
        botaoModoEscuro.addEventListener('click', function() {
            // Se o body tiver a classe "dark-mode", remova-a; caso contrário, adicione-a
            document.body.classList.toggle('dark-mode');

            // Se o corpo estiver no modo escuro, exiba a imagem de verificado e oculte o QR Code
            if (document.body.classList.contains('dark-mode')) {
                document.getElementById('qrCodeImage').style.display = 'none';
                document.getElementById('verifiedImage').style.display = 'block';
                botaoModoEscuro.classList.add('apos-clique');
                botaoModoEscuro.textContent = 'Boleto Pago';                
                // Desabilita o botão após clicar nele
                botaoModoEscuro.disabled = true;
            }
        });
    </script>
</body>
</html>
