<?php require_once 'Pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cálculo de Pedido</title>
</head>
<body>
<h2>Informações do Pedido</h2>
<form method="post">
    <label>Produto: <input type="text" name="produto" required></label><br><br>
    <label>Quantidade: <input type="number" name="quantidade" required></label><br><br>
    <label>Preço unitário: <input type="number" step="0.01" name="preco" required></label><br><br>
    <label>Tipo de cliente:
        <select name="tipoCliente">
            <option value="normal">Normal</option>
            <option value="premium">Premium</option>
        </select>
    </label><br><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pedido = new Pedido(
        $_POST['produto'],
        (int)$_POST['quantidade'],
        (float)$_POST['preco'],
        $_POST['tipoCliente']
    );
    echo "<h3>Resultado:</h3>";
    echo $pedido->exibirDetalhes();
}
?>
</body>
</html>
