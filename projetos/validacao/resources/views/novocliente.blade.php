<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="crsf-token" content="{{csrf_token()}}">
    <style>
        body 
        {
            padding: 20px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliente
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente</label>
                            <input type="text" id="id_nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" name="nome" placeholder="Nome do cliente">
                                @if ($errors->has('nome'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nome')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nome">Idade do Cliente</label>
                                <input type="number" id="id_idade" class="form-control {{$errors->has('idade') ? 'is-invalid' : ''}}" name="idade" placeholder="Idade do cliente">
                                @if ($errors->has('idade'))
                                <div class="invalid-feedback">
                                    {{$errors->first('idade')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nome">Endereço do Cliente</label>
                                <input type="text" id="id_idade" class="form-control {{$errors->has('endereco') ? 'is-invalid' : ''}}" name="endereco" placeholder="Endereço do cliente">
                                @if ($errors->has('endereco'))
                                <div class="invalid-feedback">
                                    {{$errors->first('endereco')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nome">Email do Cliente</label>
                                <input type="text" id="id_email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" placeholder="E-mail do cliente">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="{{asset('js/app.js')}}" type="textt/javascript"></script>
</body>
</html>