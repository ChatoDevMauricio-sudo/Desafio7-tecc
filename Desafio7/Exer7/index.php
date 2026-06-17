<?php require_once 'Viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Planejamento de Viagem</title>
</head>
<body>
<h2>Planejamento e Custos da Viagem</h2>
<form method="post">
    <label>Origem: <input type="text" name="origem" required></label><br><br>
    <label>Destino: <input type="text" name="destino" required></label><br><br>
    <label>Distância (km): <input type="number" step="0.1" name="distancia" required></label><br><br>
    <label>Tempo estimado (horas): <input type="number" step="0.1" name="tempo" required></label><br><br>
    <label>Tipo de veículo: <input type="text" name="tipoVeiculo" required></label><br><br>
    <label>Consumo do veículo (km/l): <input type="number" step="0.1" name="consumo" required></label><br><br>
    <label>Preço do combustível (R$/litro): <input type="number" step="0.01" name="preco" required></label><br><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $viagem = new Viagem(
        $_POST['origem'],
        $_POST['destino'],
        (float)$_POST['distancia'],
        (float)$_POST['tempo'],
        $_POST['tipoVeiculo'],
        (float)$_POST['consumo'],
        (float)$_POST['preco']
    );
    echo "<h3>Resultado:</h3>";
    echo $viagem->exibirDetalhes();
}
?>
</body>
</html>
