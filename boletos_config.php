<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Recupere o nome do usuário da sessão
$usuario_nome = $_SESSION['usuario_nome'];

// Inclua a configuração do banco de dados
include_once('configs.php');

// Capture o ID do usuário logado
$usuario_id = $_SESSION['usuario_id'];

// Prepare a consulta SQL para obter os boletos do usuário
$sql = "SELECT * FROM boletos WHERE usuario_id = ?";
$stmt = $conex->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Boletos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            color: 000;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(95deg, rgb(76, 200, 238), rgba(255, 145, 0, 0.856));
            text-align: center;
            color: 000;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h1>Boletos</h1>
    

    <table>
        <tr>
            <th>ID</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Descrição</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td><?php echo $row['vencimento']; ?></td>
            <td><a href="gerar_qrcode.php?id=<?php echo $row['id']; ?>&valor=<?php echo $row['valor']; ?>"><?php echo $row['descricao']; ?></a></td>

        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Feche a declaração e a conexão com o banco de dados
$stmt->close();
$conex->close();
?>
