<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PortifolioSamira";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$mensagem = $_POST['mensagem'];

$stmt = $conn->prepare("INSERT INTO contato (contatoNome, contatoEmail, contatoTel, contatoMensagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $celular, $mensagem);

if ($stmt->execute()) {
    echo "<h1>Novo registro criado com sucesso</h1>";
} else {
    echo "Erro: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../paginas/contato.html">Voltar para a pagina contato</a>
</body>
</html>
