<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    include_once('configs.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    $result = $conex->query($sql);

    if(mysqli_num_rows($result) < 1) 
    {
        // Se as credenciais estiverem incorretas, exibe uma mensagem de erro
        echo "Credenciais de login incorretas. Tente novamente.";
    }
    else{
        // Se as credenciais estiverem corretas, define a variável de sessão e redireciona para a página de boletos
        $usuario = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $usuario['id'];
        header('location: boletos_config.php');
        exit(); // Termina o script para evitar execução adicional indesejada
    }
}

// Se o formulário não foi enviado corretamente, não faz nada aqui, permitindo que o HTML seja exibido normalmente
?>
