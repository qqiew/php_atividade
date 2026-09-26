<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tarifas de Energia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>1 - Tarifas de Energia</h1>

        <form method="post">
            <label for="consumo">Consumo em kWh:</label>
            <input type="number" step="0.01" name="consumo" id="consumo" required>
            <input type="submit" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $consumo = (float) $_POST["consumo"];

            // define o preco do kWh de acordo com a faixa
            if ($consumo <= 100) {
                $preco = 0.50;
            } else if ($consumo <= 300) {
                $preco = 0.75;
            } else {
                $preco = 1.00;
            }

            $valor = $consumo * $preco;
            $texto = "Sem taxa extra e sem desconto.";

            if ($consumo > 500) {
                $valor = $valor + 50;
                $texto = "Taxa extra de R$ 50,00 aplicada.";
            } else if ($consumo < 50) {
                $valor = $valor - 10;
                $texto = "Desconto de R$ 10,00 aplicado.";
            }

            echo "<div class='resultado'>";
            echo "<p>Consumo: " . number_format($consumo, 2, ',', '.') . " kWh</p>";
            echo "<p>Preço por kWh: R$ " . number_format($preco, 2, ',', '.') . "</p>";
            echo "<p>" . $texto . "</p>";
            echo "<p><b>Valor final: R$ " . number_format($valor, 2, ',', '.') . "</b></p>";
            echo "</div>";
        }
        ?>

        <p><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
