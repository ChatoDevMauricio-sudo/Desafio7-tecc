<?php require_once 'Pessoa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cálculo de IMC</title>
</head>
<body>
<h2>IMC e Classificação</h2>
<form method="post">
    <label>Nome: <input type="text" name="nome" required></label><br><br>
    <label>Peso (kg): <input type="number" step="0.1" name="peso" required></label><br><br>
    <label>Altura (m): <input type="number" step="0.01" name="altura" required></label><br><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pessoa = new Pessoa(
        $_POST['nome'],
        (float)$_POST['peso'],
        (float)$_POST['altura']
    );
    echo "<h3>Resultado:</h3>";
    echo $pessoa->exibirDetalhes();
}
?>
</body>
</html>
