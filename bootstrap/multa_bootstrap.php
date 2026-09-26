<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Multa de Trânsito (Bootstrap)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title h4 mb-3">2 - Multa de Trânsito</h1>

                        <form method="post">
                            <div class="mb-3">
                                <label for="permitida" class="form-label">Velocidade permitida (km/h):</label>
                                <input type="number" step="0.01" class="form-control" name="permitida" id="permitida" required>
                            </div>
                            <div class="mb-3">
                                <label for="carro" class="form-label">Velocidade do carro (km/h):</label>
                                <input type="number" step="0.01" class="form-control" name="carro" id="carro" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </form>

                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            $permitida = (float) $_POST["permitida"];
                            $carro = (float) $_POST["carro"];

                            if ($carro <= $permitida) {
                                $multa = "Sem multa";
                                $alerta = "alert-success";
                            } else if ($carro <= $permitida * 1.20) {
                                $multa = "Multa leve";
                                $alerta = "alert-info";
                            } else if ($carro <= $permitida * 1.50) {
                                $multa = "Multa grave";
                                $alerta = "alert-warning";
                            } else {
                                $multa = "Multa gravíssima";
                                $alerta = "alert-danger";
                            }

                            // quantos por cento passou do limite
                            $excesso = 0;
                            if ($carro > $permitida && $permitida > 0) {
                                $excesso = (($carro - $permitida) / $permitida) * 100;
                            }

                            echo "<div class='alert $alerta mt-4'>";
                            echo "<p class='mb-1'>Velocidade permitida: " . $permitida . " km/h</p>";
                            echo "<p class='mb-1'>Velocidade do carro: " . $carro . " km/h</p>";
                            echo "<p class='mb-1'>Excesso: " . number_format($excesso, 2, ',', '.') . "%</p>";
                            echo "<p class='mb-0 fw-bold'>Resultado: " . $multa . "</p>";
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
