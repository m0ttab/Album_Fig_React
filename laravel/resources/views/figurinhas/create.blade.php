@extends("base.index", ['title' => 'Cadastrar figurinhas'])

@section("container")

<h1>Cadastrar Figurinha</h1>

<form id="form">
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <div class="form-group">
        <label>Nome:</label>
        <input class="form-control" type='text' name='nome' placeholder="Digite o nome"/>
    </div>
    <div class="form-group">
        <label>Data de Nascimento:</label>
        <input class="form-control" type='date' name='dt_nascimento'/>
    </div>
    <div class="form-group">
        <label>Naturalidade:</label>
        <input class="form-control" type='text' name='naturalidade' placeholder="Digite a naturalidade"/>
    </div>
    <div class="form-group">
        <label>Número:</label>
        <input class="form-control" type='number' name='numero' placeholder="Digite o número"/>
    </div>
    <div class="form-group">
        <label>Foto:</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Escolha o Arquivo</label>
            </div>
        </div>
    </div>
    <button class="btn btn-warning" type='submit'>Enviar</button>
    <button class="btn btn-danger" type='reset'>Cancelar</button>
    <a class="btn btn-primary" href="/figurinhas">Voltar</a>
</form>
<script>
    
    document.getElementById('form').onsubmit = (e) => {
      
      e.preventDefault();
      var form_data = new FormData(document.getElementById('form'));
      
      fetch('/figurinhas/add', {
        
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