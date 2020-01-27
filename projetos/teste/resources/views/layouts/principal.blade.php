<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/principal.css')}}"> <!--asset recomendado utilizar, retorna o endereço correto do recurso-->
</head>
<body>
    <div class="row">
        <div class="col1">
            <div class="menu">
                <ul>
                    <li><a class="{{request()->routeIs('clientes.*') ? 'active' : ''}}"
                        href="{{route('clientes.index')}}">Clientes</a></li>
                    <li><a class="{{request()->routeIs('produtos') ? 'active' : ''}}"
                        href="{{route('produtos')}}">Produtos</a></li>
                        <li><a class="{{request()->routeIs('departamentos') ? 'active' : ''}}"
                            href="{{route('departamentos')}}">Departamentos</a></li>
                </ul>
            </div>
        </div>
        <div class="col2">
            @yield('conteudo')
        </div>
    </div>
</body>
</html>