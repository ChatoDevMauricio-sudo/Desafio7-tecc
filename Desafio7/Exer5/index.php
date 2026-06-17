<?php require_once 'Produto.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Controle de Estoque</title>
</head>
<body>
<h2>Movimentação de Estoque</h2>
<form method="post">
    <label>Nome do produto: <input type="text" name="nome" required></label><br><br>
    <label>Quantidade atual em estoque: <input type="number" name="quantidadeEstoque" required></label><br><br>
    <label>Valor unitário: <input type="number" step="0.01" name="valorUnitario" required></label><br><br>
    <label>Operação:
        <select name="operacao">
            <option value="entrada">Entrada</option>
            <option value="saida">Saída</option>
            <option value="consulta">Apenas consultar</option>
        </select>
    </label><br><br>
    <label>Quantidade movimentada: <input type="number" name="quantidadeMovimentada" value="0" required></label><br><br>
    <button type="submit">Processar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto = new Produto(
        $_POST['nome'],
        (int)$_POST['quantidadeEstoque'],
        (float)$_POST['valorUnitario']
    );
    echo "<h3>Resultado:</h3>";
    echo $produto->exibirDetalhes($_POST['operacao'], (int)$_POST['quantidadeMovimentada']);
}
?>
</body>
</html>
