<?php require_once 'CalculadoraFinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Calculadora Financeira</title>
</head>
<body>
<h2>Parcelamento e Juros</h2>
<form method="post">
    <label>Valor da compra: <input type="number" step="0.01" name="valor" required></label><br><br>
    <label>Número de parcelas: <input type="number" name="parcelas" required></label><br><br>
    <label>Taxa de juros mensal (%): <input type="number" step="0.01" name="taxa" required></label><br><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $calc = new CalculadoraFinanceira(
        (float)$_POST['valor'],
        (int)$_POST['parcelas'],
        (float)$_POST['taxa'] / 100
    );
    echo "<h3>Resultado:</h3>";
    echo $calc->exibirDetalhes();
}
?>
</body>
</html>
