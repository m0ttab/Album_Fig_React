@extends("base.index", ['title' => 'Compras'])

@section("container")

    <h1>Compra</h1>

    @if(!isset($compras))
        <p>Nenhuma compra cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Figurinha ID</th>
                <th>Data e Hora</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compras as $compra)

            <tr id="com{{$compra->id}}">
                <td>{{$compra->id_pacote}}</td>
                <td>{{$compra->data_hora}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    @endif
    <script>
        function apagar(id){
            fetch('/compras/'+ id +'/destroy').then((req) => {

                if(req.status == 200){
                    alert('Excluído com sucesso!');
                    document.getElementById('com'+id).remove();
                }else{
                    alert('Erro ao excluir!');
                }

            });
        }
    </script>

@endsection
