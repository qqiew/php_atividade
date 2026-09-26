<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estacionamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="caixa">
        <h1>4 - Estacionamento</h1>

        <form method="post">
            <label for="tipo">Tipo de veículo:</label>
            <select name="tipo" id="tipo">
                <option value="1">1 - Moto</option>
                <option value="2">2 - Carro</option>
                <option value="3">3 - Caminhão</option>
            </select>

            <label for="horas">Quantidade de horas:</label>
            <input type="number" step="1" min="1" name="horas" id="horas" required>

            <input type="submit" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tipo = (int) $_POST["tipo"];
            $horas = (int) $_POST["horas"];

            switch ($tipo) {
                case 1:
                    $veiculo = "Moto";
                    $preco = 5.00;
                    break;
                case 2:
                    $veiculo = "Carro";
                    $preco = 8.00;
                    break;
                case 3:
                    $veiculo = "Caminhão";
                    $preco = 12.00;
                    break;
                default:
                    $veiculo = "Inválido";
                    $preco = 0;
                    break;
            }

            $total = $preco * $horas;

            echo "<div class='resultado'>";
            echo "<p>Veículo: " . $veiculo . "</p>";
            echo "<p>Preço por hora: R$ " . number_format($preco, 2, ',', '.') . "</p>";
            echo "<p>Horas estacionadas: " . $horas . "</p>";
            echo "<p><b>Total a pagar: R$ " . number_format($total, 2, ',', '.') . "</b></p>";
            echo "</div>";
        }
        ?>

        <p><a href="index.php">Voltar</a></p>
    </div>
</body>
</html>
