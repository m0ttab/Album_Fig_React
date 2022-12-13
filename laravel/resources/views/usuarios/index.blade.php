@extends("base.index", ['title' => 'Usuários'])

@section("container")

    <h1>Usuários</h1>

    @if(!isset($usuarios))
        <p>Nenhum usuário cadastrado!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)

            <tr id="fig{{$usuario->id}}">
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td><a class="btn btn-warning" href="/usuarios/edit/{{$usuario->id}}">Editar</a></td>
                <td><a class="btn btn-danger" onclick="apagar({{$usuario->id}})">Remover</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/usuarios/create">Novo Usuário</a>
    <script>
        function apagar(id){
            if(confirm('Tem certeza?')){
                fetch('/usuarios/delete/'+ id).then((req) => {
                    if(req.status == 200){
                        alert('Excluído com sucesso!');
                        document.getElementById('fig'+id).remove();
                    }else{
                        alert('Erro ao excluir!');
                    }

                });
            }
        }
    </script>

@endsection
