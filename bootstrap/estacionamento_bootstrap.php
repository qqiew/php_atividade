<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Estacionamento (Bootstrap)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title h4 mb-3">4 - Estacionamento</h1>

                        <form method="post">
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo de veículo:</label>
                                <select name="tipo" id="tipo" class="form-select">
                                    <option value="1">1 - Moto</option>
                                    <option value="2">2 - Carro</option>
                                    <option value="3">3 - Caminhão</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="horas" class="form-label">Quantidade de horas:</label>
                                <input type="number" step="1" min="1" class="form-control" name="horas" id="horas" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Calcular</button>
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

                            echo "<div class='alert alert-success mt-4'>";
                            echo "<p class='mb-1'>Veículo: " . $veiculo . "</p>";
                            echo "<p class='mb-1'>Preço por hora: R$ " . number_format($preco, 2, ',', '.') . "</p>";
                            echo "<p class='mb-1'>Horas estacionadas: " . $horas . "</p>";
                            echo "<p class='mb-0 fw-bold'>Total a pagar: R$ " . number_format($total, 2, ',', '.') . "</p>";
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
