<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palabras</title>
    <!-- Enlace al archivo de estilos de Bootstrap 5 (opcional, puedes omitirlo si no lo deseas) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Contador de Palabras</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="inputTexto" class="form-label">Ingrese el texto:</label>
                <textarea class="form-control" name="texto" id="inputTexto" rows="5" placeholder="Escribe aquí el texto..."><?php echo isset($_POST['texto']) ? $_POST['texto'] : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Contar Palabras</button>
        </form>

        <?php
        // Función para contar las repeticiones de palabras
        function contarRepeticiones($texto) {
            $texto = strtolower($texto);
            $texto = preg_replace('/[.,]/', '', $texto);
            $palabras = str_word_count($texto, 1);
            $repeticiones = array_count_values($palabras);
            return $repeticiones;
        }

        // Comprobar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["texto"])) {
            $inputTexto = $_POST["texto"];
            $resultado = contarRepeticiones($inputTexto);
            ?>

            <div class="mt-4">
                <h4>Resultado:</h4>
                <textarea class="form-control" rows="5" readonly><?php echo json_encode($resultado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE); ?></textarea>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
