@extends ('layout')
@section ('title', 'Editar Dados')
@section ('base')
<br>
    <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
      <div class="p-4 w-100 m-4 bg-light">
      <form class="row g-3">
        <h3>Alterar Dados da Empresas </h3>
        <div class="col-6">
          <label for="inputAddress2" class="form-label">CNPJ</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Razão Social</label>
          <input type="text" class="form-control" id="inputCity" placeholder="">
        </div>
        <div class="col-6">
          <label for="inputAddress2" class="form-label">Nome da Empresa</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="inputCity" placeholder="">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Gerente responsável</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="">
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Senha</label>
          <input type="password" class="form-control" id="inputPassword4" placeholder="">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="">
        </div>

        <div class="col-md-6">
          <label for="inputCity" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="inputCity" placeholder="">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">UF</label>
          <select id="inputState" class="form-select">
            <option selected>Escolha...</option>
            <option>AC</option>
            <option>AL</option>
            <option>AM</option>
            <option>AP</option>
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MG</option>
            <option>MS</option>
            <option>MT</option>
            <option>PA</option>
            <option>PB</option>
            <option>PE</option>
            <option>PR</option>
            <option>PI</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RO</option>
            <option>RR</option>
            <option>RS</option>
            <option>SC</option>
            <option>SE</option>
            <option>SP</option>
            <option>TO</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">CEP</label>
          <input type="text" class="form-control disabled" id="inputZip" placeholder="">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-info"><a href="gerente.html">Salvar Alterações</a></button>
        </div>
      </form>
      </div>
    </div>
@endsection
