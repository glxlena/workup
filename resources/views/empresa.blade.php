@extends ('layout')
@section ('title', 'Dados da Empresa')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
    <form class="row g-3">
      <h3>Dados da Empresas </h3>
      <div class="col-6">
        <label for="inputAddress2" class="form-label">CNPJ</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="15.654.574/0001-06" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Razão Social</label>
        <input type="text" class="form-control" id="inputCity" placeholder="Senac Lanches Ltda" disabled>
      </div>
      <div class="col-6">
        <label for="inputAddress2" class="form-label">Nome da Empresa</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Senac Lanches" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="inputCity" placeholder="42 988295091" disabled>
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Gerente responsável</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Helena de Oliveira" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" placeholder="helena.3940@aluno.pr.senac.br" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Senha</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="**********" disabled>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua Capitão Rocha, 121 - Trianon" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputCity" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="inputCity" placeholder="Guarapuava" disabled>
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">UF</label>
        <input type="text" class="form-control" id="inputState" placeholder="PR" disabled>
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">CEP</label>
        <input type="text" class="form-control disabled" id="inputZip" placeholder="85012-255" disabled>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-info"><a href="editempresa.html">Alterar Dados</a></button>
      </div>
    </form>
    </div>
  </div>
@endsection
