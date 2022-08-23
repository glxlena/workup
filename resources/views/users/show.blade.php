@extends ('layout')
@section ('title', 'Editar')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
<div class="p-4 w-100 m-4 bg-light">
  <h2> Vizualização de Usuário</h2>
  <ul class="list-group w-100">
    <li class="list-group-item"><strong>Nome: </strong>{{$user->name}}</li>
    <li class="list-group-item"><strong>Email: </strong>{{$user->email}}</li>
    <li class="list-group-item"><strong>Tipo: </strong>{{$user->type() ? 'Gerente' : 'Funcionário'}}</li>
    <li class="list-group-item"><strong>CPF: </strong>{{$user->cpf}}</li>
    <li class="list-group-item"><strong>Telefone: </strong>{{$user->phone}}</li>
</div>
</div>
@endsection
