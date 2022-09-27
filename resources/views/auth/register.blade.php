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

          <h1>Cadastro de Empresas</h1>
          <form class="row g-3" action="{{route('register')}}" method="post">
            @csrf
          <div class="col-6">
            <label for="inputName" class="form-label">Nome da Empresa</label>
            <input name="company_name" type="text" class="form-control" id="inputAddress2" placeholder="">
            @error('company_name')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputTrading" class="form-label">Razão Social</label>
            <input name="trading_name" type="text" class="form-control" id="inputCity">
            @error('trading_name')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-6">
            <label for="inputCnpj" class="form-label">CNPJ</label>
            <input name="cnpj" type="text" class="form-control" id="inputAddress2" placeholder="">
            @error('cnpj')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="inputPhone" class="form-label">Telefone</label>
            <input name="company_phone" type="text" class="form-control" id="inputCity">
            @error('company_phone')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Endereço</label>
            <input name="adress" type="text" class="form-control" id="inputAddress" placeholder="">
            @error('adress')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror
          </div>
          <br>
          <h2> Cadastro de Usuário</h2>
            <div class="d-flex flex-row gap-2">
              <label for="inputUsuario" class="form-label">Nome</label>
              <input name="name" type="text" id="inputUsuario" class="form-control">
              @error('name')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
              <label for="inputtel" class="form-label">Telefone</label>
              <input name="phone" type="text" id="inputel" class="form-control">
              @error('phone')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
              <label for="inputcpf" class="form-label">CPF</label>
              <input name="cpf" type="text" id="inputcpf" class="form-control">
              @error('cpf')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
            </div>
            <br>
            <div class="d-flex flex-row gap-2">
              <label for="inputEmail" class="form-label">Email</label>
              <input name="email" type="text" id="inputEmail" class="form-control">
              @error('email')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
              <label for="exampleInputSenha" class="form-label">Senha</label>
              <input name="password" type="password" class="form-control" id="exampleInputSenha">
              @error('password')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="d-flex flex-row gap-2">
              <label for="password-confirm" class="form-label">Confirmar Senha</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
              <label for="inputType" class="form-label">Tipo de Usuário</label>
              <select name="type" id="inputType" class="form-select">
                <option value="Gerente">Gerente</option>
                <option value="Funcionário">Funcionário</option>
              </select>
            </div>
            <br>
          <div class="col-12">
            <button type="submit" class="btn btn-info">Cadastrar</a></button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
