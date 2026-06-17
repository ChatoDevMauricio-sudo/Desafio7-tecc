<?php require_once 'Carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Autonomia e Revisão do Carro</title>
</head>
<body>
<h2>Informações do Carro</h2>
<form method="post">
    <label>Modelo: <input type="text" name="modelo" required></label><br><br>
    <label>Combustível:
        <select name="combustivel">
            <option value="gasolina">Gasolina</option>
            <option value="etanol">Etanol</option>
        </select>
    </label><br><br>
    <label>Tanque cheio (litros): <input type="number" step="0.1" name="tanque" required></label><br><br>
    <label>Consumo (km/l): <input type="number" step="0.1" name="consumo" required></label><br><br>
    <label>Preço do combustível (R$/litro): <input type="number" step="0.01" name="preco" required></label><br><br>
    <label>Km já rodados: <input type="number" step="0.1" name="kmRodados" value="0" required></label><br><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carro = new Carro(
        $_POST['modelo'],
        $_POST['combustivel'],
        (float)$_POST['tanque'],
        (float)$_POST['consumo'],
        (float)$_POST['kmRodados']
    );
    echo "<h3>Resultado:</h3>";
    echo $carro->exibirDetalhes((float)$_POST['preco']);
}
?>
</body>
</html>
