@extends ('layout')
@section ('title', 'Editar')
<div class="d-flex flex-row gap-2">
  <form method="POST" action="{{route('user.update', $user->id)}}">
    @csrf
    @method('PUT')
  <label for="inputUsuario" class="form-label">Nome</label>
  <input name="name" type="text" id="inputUsuario" class="form-control">
  <label for="inputtel" class="form-label">Telefone</label>
  <input name="phone" type="text" id="inputel" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputcpf" class="form-label">CPF</label>
  <input name="cpf" type="text" id="inputcpf" class="form-control">
  <label for="inputcep" class="form-label">CEP</label>
  <input type="text" id="inputcep" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputendereco" class="form-label">Endereço</label>
  <input type="text" id="inputendereco" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-4">
  <label for="inputcidade" class="form-label">Cidade</label>
  <input type="text" id="inputcidade" class="form-control">
  <label for="inputEstado" class="form-label">UF</label>
  <select id="inputEstado" class="form-select">
    <option selected>Escolha</option>
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
@endsection
