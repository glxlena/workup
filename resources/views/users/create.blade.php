@extends ('layout')
@section ('title', 'Editar')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
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
      <div class="d-flex flex-row-reverse gap-2">
        <button type="submit" class="btn btn-warning"> Salvar</button>
        <a href="{{route('user.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
      </form>
      </div>
    </div>
  </div>
@endsection
