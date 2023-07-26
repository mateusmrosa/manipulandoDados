<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>

    <!-- Inclua o link para o CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Upload de Arquivo</h1>
        <form action="index.php?action=upload" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="arquivo" class="form-label">Escolha um arquivo para fazer o upload:</label>
                <input type="file" class="form-control" id="arquivo" name="arquivo">
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
            <!-- Botões de relatórios que chamam funções diferentes -->
            <button type="submit" class="btn btn-primary" formaction="index.php?action=relatorio1">Relatório 1</button>
            <button type="submit" class="btn btn-primary" formaction="index.php?action=relatorio2">Relatório 2</button>
            <button type="submit" class="btn btn-primary" formaction="index.php?action=relatorio3">Relatório 3</button>
        </form>
    </div>

    <!-- Inclua o link para o JavaScript do Bootstrap 5 (opcional, mas pode ser necessário para alguns componentes) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>