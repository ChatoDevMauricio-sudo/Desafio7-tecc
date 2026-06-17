<?php require_once 'CalculadoraGeometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Calculadora Geométrica</title>
</head>
<body>
<h2>Área de Figuras Geométricas</h2>
<form method="post">
    <label>Figura:
        <select name="figura" id="figura" onchange="document.getElementById('campoAltura').style.display = this.value === 'retangulo' ? 'block' : 'none';">
            <option value="quadrado">Quadrado</option>
            <option value="retangulo">Retângulo</option>
            <option value="circulo">Círculo</option>
        </select>
    </label><br><br>
    <label id="labelMedida1">Lado / Base / Raio: <input type="number" step="0.01" name="medida1" required></label><br><br>
    <div id="campoAltura" style="display:none;">
        <label>Altura (somente para retângulo): <input type="number" step="0.01" name="medida2"></label><br><br>
    </div>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $calc = new CalculadoraGeometrica(
        $_POST['figura'],
        (float)$_POST['medida1'],
        isset($_POST['medida2']) ? (float)$_POST['medida2'] : 0
    );
    echo "<h3>Resultado:</h3>";
    echo $calc->exibirDetalhes();
}
?>
</body>
</html>
