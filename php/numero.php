<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Análise de Número</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>3 - Análise de Número</h1>

        <form method="post">
            <label for="numero">Digite um número inteiro:</label>
            <input type="number" step="1" name="numero" id="numero" required>
            <input type="submit" value="Analisar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $numero = (int) $_POST["numero"];

            // par ou impar
            if ($numero % 2 == 0) {
                $paridade = "Par";
            } else {
                $paridade = "Ímpar";
            }

            // positivo, negativo ou zero
            if ($numero > 0) {
                $sinal = "Positivo";
            } else if ($numero < 0) {
                $sinal = "Negativo";
            } else {
                $sinal = "Zero";
            }

            // multiplo de 3
            if ($numero % 3 == 0) {
                $multiplo = "É múltiplo de 3";
            } else {
                $multiplo = "Não é múltiplo de 3";
            }

            echo "<div class='resultado'>";
            echo "<p>Número digitado: " . $numero . "</p>";
            echo "<p>" . $paridade . "</p>";
            echo "<p>" . $sinal . "</p>";
            echo "<p>" . $multiplo . "</p>";
            echo "</div>";
        }
        ?>

        <p><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
