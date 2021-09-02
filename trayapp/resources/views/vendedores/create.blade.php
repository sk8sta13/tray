
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
                <h1 class="mt-5">Criar Novo Vendedor</h1>
                <p>
                    <a href="/vendedores">Listar Vendedores</a>
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

                <form method="post" action="/vendedores/criar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </main>
    </body>
</html>
