@extends("base.index", ['title' => 'Compras'])

@section("container")

    <h1>Compra</h1>

    @if(true)
        <p>Nenhuma compra cadastrada!</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Pacote 1</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compras as $compra)
        
            <tr id="com{{$compra->id}}">
                <td>{{$compra->id}}</td>
                <td>{{$compra->nome}}</td>
                <td>{{date('d/m/Y', strtotime($compra->dt_nasc))}}</td>
                <td><a class="btn btn-danger" onclick="apagar({{$compra->id}})">Remover</a></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
    @endif
    <a class="btn btn-primary" href="/compras/create">Nova compra</a>
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