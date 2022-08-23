@extends ('layout')
@section ('title', 'Editar')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
  <div class="p-4 w-100 m-4 bg-light">
    <h2> Edição de Usuário
    </h2>
  <form method="POST" action="{{route('user.update', $user->id)}}">
    @csrf
    @method('PUT')
<div class="d-flex flex-row gap-1">
  <label for="inputUsuario" class="form-label">Nome</label>
  <input name="name" type="text" id="inputUsuario" class="form-control">
  <label for="inputtel" class="form-label">Telefone</label>
  <input name="phone" type="text" id="inputel" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputcpf" class="form-label">CPF</label>
  <input name="cpf" type="text" id="inputcpf" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputlogin" class="form-label">Email</label>
  <input name="email" type="text" id="inputlogin" class="form-control">
  <label for="exampleInputSenha" class="form-label">Senha</label>
  <input name="password" type="password" class="form-control" id="exampleInputSenha">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputType" class="form-label">Tipo de Usuário</label>
  <select name="type" id="inputType" class="form-select">
    <option selected>Escolha</option>
    <option>Gerente</option>
    <option>Funcionário</option>
  </select>
</div>
<br>
<div <div class="modal-footer">
<button type="submit" class="btn btn-warning">Alterar</button>
</div>
</div>
</div>
@endsection
