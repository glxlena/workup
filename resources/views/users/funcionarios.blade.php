@extends ('layout')
@section ('title', 'Usuários')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light rounded">
      <h2> Usuários
      </h2>
      <a href="{{route('user.create')}}"><button type="button" class="btn btn-info" data-bs-target="#novo">
        Criar Novo +
      </button></a>
      <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Tipo</th>
              <th scope="col">CPF</th>
              <th scope="col">Telefone</th>
              <th scope="col">Editar</th>
              <th scope="col">Ver</th>
              <th scope="col">Remover</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->type}}</td>
              <td>{{$user->cpf}}</td>
              <td>{{$user->phone}}</td>
              <td><a href="{{route('user.edit', $user->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil" data-bs-toggle="modal"></i></a></td>
              <td><a href="{{route('user.show', $user->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></td>
              <form method="POST" action ="{{route('user.destroy', $user->id)}}">
                @csrf
                @method('delete')
                <td><button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button></form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
