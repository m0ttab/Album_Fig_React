@extends("base.index", ['title' => 'Alterar Figurinha'])

@section("container")

<h1>Alterar Figurinha</h1>

@foreach($figurinhas as $figurinha)

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <input type="hidden" value="{{ $figurinha->id }}" name="id"/>
    <div class="form-group">
        <label>Nome:</label>
        <input class="form-control" type='text' name='nome' value="{{ $figurinha->nome }}" placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
        <label>Data de Nascimento:</label>
        <input class="form-control" type='date' name='dt_nascimento' value="{{ $figurinha->dt_nascimento }}"/>
    </div>

    <div class="form-group">
        <label>Naturalidade:</label>
        <input class="form-control" type='text' name='naturalidade' value="{{ $figurinha->naturalidade }}" placeholder="Digite a naturalidade"/>
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
      
      fetch('/figurinhas/update', {
        
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