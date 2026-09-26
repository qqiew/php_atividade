<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tarifas de Energia (Bootstrap)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title h4 mb-3">1 - Tarifas de Energia</h1>

                        <form method="post">
                            <div class="mb-3">
                                <label for="consumo" class="form-label">Consumo em kWh:</label>
                                <input type="number" step="0.01" class="form-control" name="consumo" id="consumo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Calcular</button>
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
                            $alerta = "alert-success";

                            if ($consumo > 500) {
                                $valor = $valor + 50;
                                $texto = "Taxa extra de R$ 50,00 aplicada.";
                                $alerta = "alert-warning";
                            } else if ($consumo < 50) {
                                $valor = $valor - 10;
                                $texto = "Desconto de R$ 10,00 aplicado.";
                                $alerta = "alert-info";
                            }

                            echo "<div class='alert $alerta mt-4'>";
                            echo "<p class='mb-1'>Consumo: " . number_format($consumo, 2, ',', '.') . " kWh</p>";
                            echo "<p class='mb-1'>Preço por kWh: R$ " . number_format($preco, 2, ',', '.') . "</p>";
                            echo "<p class='mb-1'>" . $texto . "</p>";
                            echo "<p class='mb-0 fw-bold'>Valor final: R$ " . number_format($valor, 2, ',', '.') . "</p>";
                            echo "</div>";
                        }
                        ?>

                        <p class="mt-3"><a href="index.php" class="btn btn-sm btn-outline-secondary">Voltar</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
