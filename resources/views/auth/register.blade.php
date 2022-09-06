<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Tela de Cadastro</title>
  </head>
  <body class="bg-warning">
    <div class="d-flex h-100 m-4 position-absolute justify-content-center align-items-center">
      <div class="p-4 w-75 bg-light rounded">

        <form class="row g-3">
          <h1>Cadastro de Empresas </h1>
          <div class="col-6">
            <label for="inputCnpj" class="form-label">CNPJ</label>
            <input name="cnpj" type="text" class="form-control" id="inputAddress2" placeholder="">
          </div>
          <div class="col-md-6">
            <label for="inputTrading" class="form-label">Razão Social</label>
            <input name="trading_name" type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-6">
            <label for="inputName" class="form-label">Nome da Empresa</label>
            <input name="company_name" type="text" class="form-control" id="inputAddress2" placeholder="">
          </div>
          <div class="col-md-6">
            <label for="inputPhone" class="form-label">Telefone</label>
            <input name="phone" type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input name="adress" type="text" class="form-control" id="inputAddress" placeholder="">
          </div>
          <br>
          <h2> Cadastro de Usuário</h2>
          <form class="" action="{{route('user.store')}}" method="post">
            @csrf
            <div class="d-flex flex-row gap-2">
              <label for="inputUsuario" class="form-label">Nome</label>
              <input name="name" type="text" id="inputUsuario" class="form-control">
              <label for="inputtel" class="form-label">Telefone</label>
              <input name="phone" type="text" id="inputel" class="form-control">
              <label for="inputcpf" class="form-label">CPF</label>
              <input name="cpf" type="text" id="inputcpf" class="form-control">
            </div>
            <br>
            <div class="d-flex flex-row gap-2">
              <label for="inputEmail" class="form-label">Email</label>
              <input name="email" type="text" id="inputEmail" class="form-control">
              <label for="exampleInputSenha" class="form-label">Senha</label>
              <input name="password" type="password" class="form-control" id="exampleInputSenha">
            </div>
            <br>
            <div class="d-flex flex-row gap-2">
              <label for="inputType" class="form-label">Tipo de Usuário</label>
              <select name="type" id="inputType" class="form-select">
                <option value="Gerente">Gerente</option>
                <option value="Funcionário">Funcionário</option>
              </select>
            </div>
            <br>
          </form>
          <br>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
            <br>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-info"><a href="{{route('product.index')}}">Cadastrar</a></button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
