<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('configs.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conex->query($sql);

    if (mysqli_num_rows($result) < 1) {
        echo "Credenciais de login incorretas. Tente novamente.";
        header('location:login.php');
    } else {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome']; // Supondo que a coluna do nome do usuário seja 'nome'
        header('Location: home.php');
        exit();
    }
}
?>
