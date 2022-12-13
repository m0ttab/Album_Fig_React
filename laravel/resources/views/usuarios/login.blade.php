@extends("base.index", ['title' => 'Login'])

@section("container")

<h1>Login</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <div class="form-group">
        <label>Email:</label>
        <input class="form-control" type='email' name='email' placeholder="Digite seu email"/>
    </div>
    <div class="form-group">
        <label>Senha:</label>
        <input class="form-control" type='password' name='senha' placeholder="Digite sua senha"/>
    </div>

    <button class="btn btn-warning" type='submit'>Entrar</button>
</form>
<script>
    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();
      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/login', {
        
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
