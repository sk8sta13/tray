
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tray App">
        <meta name="author" content="Marcelo Soto Campos">

        <title>Tray App</title>

        <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        </style>

        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5">Vendedor #{{ str_pad($vendedor['id'], 3, '0', STR_PAD_LEFT) }}</h1>
                <p>
                    <a href="/vendedores/criar">Novo Vendedor</a>
                    <a href="/vendedores">Lista Vendedores</a>
                </p>

                <div class="mb-3">Nome: {{ $vendedor['nome'] }}</div>
                <div class="mb-3">Email: {{ $vendedor['email'] }}</div>

                <table id="tbl-vendas" class="table table-striped">
                    <thead><tr><th>Data</th><th>Valor</th><th>Comissão</th></tr></thead>
                    <tbody>
                        @forelse($vendedor['vendas'] as $venda)
                            <tr>
                                <td>{{ implode('/', array_reverse(explode('-', $venda['data_venda']))) }}</td>
                                <td style="text-align: right;">{{ number_format($venda['valor_venda'], 2, ',', '.') }}</td>
                                <td style="text-align: right;">{{ number_format($venda['comissao'], 2, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4">Nenhuma Venda Encontrada</td></tr>
                        @endforelse
                    </tbody>
                    <tfoot><tr><th>Data</th><th>Valor</th><th>Comissão</th></tr></tfoot>
                </table>
            </div>
        </main>
    </body>
</html>
