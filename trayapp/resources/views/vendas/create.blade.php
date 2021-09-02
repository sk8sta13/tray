
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
                <h1 class="mt-5">Criar Nova Venda</h1>
                <p>
                    <a href="/vendedores">Listar Vendedores</a>
                    <a href="/vendedores/criar">Novo Vendedor</a>
                </p>

                @if (($errors) && (count($errors)))
                <div class="alert alert-warning" role="alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error[0] }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="post" action="/vendas/criar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="mb-3">
                        <label for="vendedor_id" class="form-label">Vendedor</label>
                        <select name="vendedor_id" class="form-control">
                            <option value="">Selecione...</option>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor['id'] }}">{{ $vendedor['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="valor_venda" class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor_venda" value="{{ old('valor_venda') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </main>
    </body>
</html>
