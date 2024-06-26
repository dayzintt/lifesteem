<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

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
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
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
            <td><?php echo $row['descricao']; ?></td>
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
