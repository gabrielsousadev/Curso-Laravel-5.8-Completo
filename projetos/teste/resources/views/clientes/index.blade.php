<h3>CLIENTES</h3>
<a href="{{route('clientes.create')}}">NOVO CLIENTE</a>        
<ol>
    @foreach ($clientes as $c)
        <li>{{$c['nome']}} ***
            <a href="{{route('clientes.edit', $c['id'])}}">Editar</a>        
        </li>
    @endforeach
</ol>