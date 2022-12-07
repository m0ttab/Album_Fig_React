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

    <button class="btn btn-warning" type='submit'>Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/figurinhas">Voltar</a>
</form>

@endsection
