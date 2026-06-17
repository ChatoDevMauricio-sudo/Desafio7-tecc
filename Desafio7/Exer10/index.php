<?php require_once 'ReservaHotel.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Reserva de Hotel</title>
</head>
<body>
<h2>Simulação de Diária</h2>
<form method="post">
    <label>Nome do hóspede: <input type="text" name="nome" required></label><br><br>
    <label>Número de noites: <input type="number" name="noites" required></label><br><br>
    <label>Tipo de quarto:
        <select name="tipoQuarto">
            <option value="simples">Simples (R$ 120)</option>
            <option value="luxo">Luxo (R$ 200)</option>
            <option value="suite">Suíte (R$ 350)</option>
        </select>
    </label><br><br>
    <button type="submit">Reservar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reserva = new ReservaHotel(
        $_POST['nome'],
        (int)$_POST['noites'],
        $_POST['tipoQuarto']
    );
    echo "<h3>Resultado:</h3>";
    echo $reserva->exibirDetalhes();
}
?>
</body>
</html>
