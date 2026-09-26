<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Multa de Trânsito</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>2 - Multa de Trânsito</h1>

        <form method="post">
            <label for="permitida">Velocidade permitida (km/h):</label>
            <input type="number" step="0.01" name="permitida" id="permitida" required>

            <label for="carro">Velocidade do carro (km/h):</label>
            <input type="number" step="0.01" name="carro" id="carro" required>

            <input type="submit" value="Verificar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $permitida = (float) $_POST["permitida"];
            $carro = (float) $_POST["carro"];

            if ($carro <= $permitida) {
                $multa = "Sem multa";
            } else if ($carro <= $permitida * 1.20) {
                $multa = "Multa leve";
            } else if ($carro <= $permitida * 1.50) {
                $multa = "Multa grave";
            } else {
                $multa = "Multa gravíssima";
            }

            // quantos por cento passou do limite
            $excesso = 0;
            if ($carro > $permitida && $permitida > 0) {
                $excesso = (($carro - $permitida) / $permitida) * 100;
            }

            echo "<div class='resultado'>";
            echo "<p>Velocidade permitida: " . $permitida . " km/h</p>";
            echo "<p>Velocidade do carro: " . $carro . " km/h</p>";
            echo "<p>Excesso: " . number_format($excesso, 2, ',', '.') . "%</p>";
            echo "<p><b>Resultado: " . $multa . "</b></p>";
            echo "</div>";
        }
        ?>

        <p><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
