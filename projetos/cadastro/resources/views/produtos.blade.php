@extends('layout.app', ["current" => "produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Produtos</h5>
        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onclick="produtoNovo()">Novo Produto</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="id_dialogProdutos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="id_formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nomeProduto" class="control-label">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="precoProduto" class="control-label">Preço</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quantidadeProduto" class="control-label">Quantidade</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="quantidadeProduto" placeholder="Quantidade do Produto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoriaProduto" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="categoriaProduto">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: 
            {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function produtoNovo()
        {   
            $('#id').val('');
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#quantidadeProduto').val('');
            $('#id_dialogProdutos').modal('show');
        }

        function carregarCategorias()
        {
            $.getJSON('/api/categorias', function(data) 
            {                
                for(i=0; i < data.length; i++)
                {
                    opcao = '<option value ="' + data[i].id + '">' + data[i].nome + '</option>';
                    $('#categoriaProduto').append(opcao);
                }
            });
        }

        function montarLinha(produto)
        {
            var linha = "<tr>" +
            "<td>" + produto.id + "</td>" +
            "<td>" + produto.nome + "</td>" +
            "<td>" + produto.estoque + "</td>" +
            "<td>" + produto.preco + "</td>" +
            "<td>" + produto.categoria_id + "</td>" +
            "<td>" + '<button class="btn btn-sm btn-primary" onclick="editar('+ produto.id +')"> Editar </button> ' +
            '<button class="btn btn-sm btn-danger" onclick="remover('+ produto.id +')"> Apagar </button> ' +
            "</td>" +
            "</tr>";

            return linha;
        }

        function remover(id)
        {
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function()
                {
                    console.log('APAGOU OK');
                    linhas = $("#tabelaProdutos>tbody>tr");
                    e = linhas.filter(function(i, elemento)
                    {
                        return elemento.cells[0].textContent == id;
                    });

                    if(e)
                    {
                        e.remove();
                    }
                },
                error: function(error)
                {
                    console.log(error);
                }
            });
        }

        function carregarProdutos()
        {
            $.getJSON('/api/produtos', function(produtos) {
                for (i = 0; i < produtos.length; i++) 
                {
                    linha = montarLinha(produtos[i]);
                    $('#tabelaProdutos>tbody').append(linha);    
                }
            });
        }

        function criarProduto()
        {
            novoProduto = {
                nome: $("#nomeProduto").val(),
                preco: $("#precoProduto").val(),
                estoque: $("#quantidadeProduto").val(),
                categoria_id: $("#categoriaProduto").val()
            };

            $.post("/api/produtos", novoProduto, function(data) 
            {
                produto = JSON.parse(data);
                linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);
            });
        }

        $("#id_formProduto").submit(function(event){
            event.preventDefault();
            criarProduto();
            $("#id_dialogProdutos").modal('hide');
        });

        $(function(){
            carregarCategorias();
            carregarProdutos();
        });

    </script>
@endsection