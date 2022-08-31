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
  <input name="name" type="text" id="inputUsuario" class="form-control" value="{{$user->name}}">
  <label for="inputtel" class="form-label">Telefone</label>
  <input name="phone" type="text" id="inputel" class="form-control" value="{{$user->phone}}">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputcpf" class="form-label">CPF</label>
  <input name="cpf" type="text" id="inputcpf" class="form-control" value="{{$user->cpf}}">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputlogin" class="form-label">Email</label>
  <input name="email" type="text" id="inputlogin" class="form-control" value="{{$user->email}}">
  <label for="exampleInputSenha" class="form-label">Senha</label>
  <input name="password" type="password" class="form-control" id="exampleInputSenha" value="$user->password">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputType" class="form-label">Tipo de Usuário</label>
  <select name="type" id="inputType" class="form-select">
    <option value="Gerente" @if($user->type) selected @endif>Gerente</option>
    <option value="Funcionário" @if(!$user->type) selected @endif>Funcionário</option>
  </select>
</div>
<br>
<div <div class="d-flex flex-row-reverse gap-2">
<button type="submit" class="btn btn-warning">Alterar</button>
<a href="{{route('user.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
</div>
</div>
</div>
@endsection
