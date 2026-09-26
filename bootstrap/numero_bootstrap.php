<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Análise de Número (Bootstrap)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title h4 mb-3">3 - Análise de Número</h1>

                        <form method="post">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Digite um número inteiro:</label>
                                <input type="number" step="1" class="form-control" name="numero" id="numero" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Analisar</button>
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

                            echo "<div class='alert alert-info mt-4'>";
                            echo "<p class='mb-1'>Número digitado: " . $numero . "</p>";
                            echo "<p class='mb-1'>" . $paridade . "</p>";
                            echo "<p class='mb-1'>" . $sinal . "</p>";
                            echo "<p class='mb-0'>" . $multiplo . "</p>";
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
