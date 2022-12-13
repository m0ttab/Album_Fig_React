@extends("base.index", ['title' => 'Pacotes'])

@section("container")

    <h1>Pacotes</h1>

    @if(true)
        <p>Nenhuma pacote cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Figurinha 1</th>
                <th>Figurinha 2</th>
                <th>Figurinha 3</th>
                <th>Figurinha 4</th>
                <th>Figurinha 5</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pacotes as $pacote)

            <tr id="pac{{$pacote->id}}">
                <td>{{$pacote->id}}</td>
                <td>{{$pacote->nome}}</td>
                <td>{{date('d/m/Y', strtotime($pacote->dt_nasc))}}</td>
                <td>{{$pacote->naturalidade}}</td>
                <td><a class="btn btn-warning" href="/pacotes/{{$pacote->id}}/edit">Editar</a></td>
                <td><a class="btn btn-danger" onclick="apagar({{$pacote->id}})">Remover</a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endif
    <script>
        function apagar(id){
            fetch('/pacotes/'+ id +'/destroy').then((req) => {

                if(req.status == 200){
                    alert('Excluído com sucesso!');
                    document.getElementById('pac'+id).remove();
                }else{
                    alert('Erro ao excluir!');
                }

            });
        }
    </script>

@endsection
