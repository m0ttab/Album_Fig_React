@extends("base.index", ['title' => 'Figurinhas'])

@section("container")

    <h1>Figurinhas</h1>

    @if(!isset($figurinhas))
        <p>Nenhuma figurinha cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de nascimento</th>
                <th>Naturalidade</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($figurinhas as $figurinha)
        
            <tr id="fig{{$figurinha->id}}">
                <td>{{$figurinha->nome}}</td>
                <td>{{date('d/m/Y', strtotime($figurinha->dt_nascimento))}}</td>
                <td>{{$figurinha->naturalidade}}</td>
                <td><a class="btn btn-warning" href="/figurinhas/edit/{{$figurinha->id}}">Editar</a></td>
                <td><a class="btn btn-danger" onclick="apagar({{$figurinha->id}})">Remover</a></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/figurinhas/create">Nova Figurinha</a>
    <script>
        function apagar(id){
            if(confirm('Tem certeza?')){
                fetch('/figurinhas/delete/'+ id).then((req) => {
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