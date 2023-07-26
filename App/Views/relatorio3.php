<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Relatório</h1>
        <a href="http://localhost/manipulandoDados" class="btn btn-primary">Voltar</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Industria</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Qtde Organizações</th>
                    <th scope="col">Número de funcionários</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $row['industry'] ?></td>
                        <td><?= $row['country'] ?></td>
                        <td><?= $row['quantidade_organizacoes'] ?></td>
                        <td><?= $row['quantidade_funcionarios'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>