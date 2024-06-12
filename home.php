<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Recupere o nome do usuário da sessão
$usuario_nome = $_SESSION['usuario_nome'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(95deg, rgb(76, 200, 238), rgba(255, 145, 0, 0.856));
            text-align: center;
            color: white;
            padding: 20px;
        }
        .navbar {
            display: flex;
            justify-content: center;
            background-color: rgba(5, 0, 0, 0.7);
            padding: 10px;
            border-radius: 10px;
        }
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
        }
        .content {
            margin-top: 0px;
        }
        /* Estilos para o modo escuro */
        .dark-mode body {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h1>
        <br><h2>Qual área deseja acessar?<h2>

    </div>
    <div class="navbar">
        <a href="boletos_config.php">Boletos</a>
        <a href="anuncios.php">Anúncios</a>
        <!-- Botão para Modo Escuro -->
        
    </div>

    <script>
        // Selecione o botão de Modo Escuro
        var botaoModoEscuro = document.getElementById('modoEscuro');

        // Adicione um ouvinte de evento de clique ao botão
        botaoModoEscuro.addEventListener('click', function() {
            // Se o body tiver a classe "dark-mode", remova-a; caso contrário, adicione-a
            document.body.classList.toggle('dark-mode');
        });
    </script>
</body>
</html>
