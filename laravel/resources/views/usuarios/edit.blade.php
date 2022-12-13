@extends("base.index", ['title' => 'Alterar Usuário'])

@section("container")

<h1>Alterar Usuário</h1>

@foreach($usuarios as $usuario)

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <input type="hidden" value="{{ $usuario->id }}" name="id"/>
    <div class="form-group">
        <label>Nome:</label>
        <input class="form-control" type='text' name='nome' value="{{ $usuario->nome }}" placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input class="form-control" type='email' name='email' value="{{ $usuario->email }}"/>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input class="form-control" type='password' name='senha' placeholder="Digite a senha"/>
    </div>
    <button class="btn btn-warning" type='submit'>Alterar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/figurinhas">Voltar</a>
</form>

@endforeach

<script>
    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();
      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/usuarios/update', {
        
        method: 'POST',
        body: form_data
        
      }).then((req) => {
        
        if(req.status == 200){
            alert('Formulário enviado!');
        }else{
            alert('Erro no cadastro!');
        }
        
      });
  }
</script>

@endsection