@extends("base.index", ['title' => 'Cadastrar Usuários'])

@section("container")

<h1>Cadastrar Usuário</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <div class="form-group">
        <label>Nome:</label>
        <input class="form-control" type='text' name='nome' placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input class="form-control" type='email' name='email' placeholder="Digite o email"/>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input class="form-control" type='password' name='senha' placeholder="Digite a senha"/>
    </div>
    <button class="btn btn-warning" type='submit'>Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/usuarios">Voltar</a>
</form>
<script>

    document.getElementById('form').onsubmit = (e) => {

      e.preventDefault();
      var form_data = new FormData(document.getElementById('form'));

      fetch('/usuarios/add', {

        method: 'POST',
        body: form_data

      }).then((req) => {

        if(req.status == 200){
            alert('Formulário enviado!');
            document.getElementById('form').reset();
        }else{
            alert('Erro no cadastro!');
        }

      });
    }

</script>

@endsection
