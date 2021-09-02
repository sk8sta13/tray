
<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tray App">
        <meta name="author" content="Marcelo Soto Campos">

        <title>Tray App</title>

        <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" rel="stylesheet">

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
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tbl-vendedores').DataTable();
            });
        </script>
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5">Lista de Vendedores</h1>
                <p>
                    <a href="/vendedores/criar">Novo Vendedor</a>
                    <a href="/vendas/criar">Nova Venda</a>
                </p>

                <table id="tbl-vendedores">
                    <thead><tr><th>#</th><th>Nome</th><th>Email</th><th>&nbsp;</th></tr></thead>
                    <tbody>
                        @forelse($vendedores as $vendedor)
                            <tr>
                                <td>{{ str_pad($vendedor['id'], 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $vendedor['nome'] }}</td>
                                <td>{{ $vendedor['email'] }}</td>
                                <td><a href="/vendedores/{{ $vendedor['id'] }}">Vendas</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="4">Nenhum Vendedor Encontrado</td></tr>
                        @endforelse
                    </tbody>
                    <tfoot><tr><th>#</th><th>Nome</th><th>Email</th><th>&nbsp;</th></tr></tfoot>
                </table>
            </div>
        </main>
    </body>
</html>
