@extends ('layout')
@section ('title', 'Usuários')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
      <h2> Usuários
      </h2>
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#novo">
        Criar Novo+
      </button>
      <div class="modal fade" id="novo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastro de Usuários</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex flex-row gap-2">
                <form class="" action="{{route('user.store')}}" method="post">
                  @csrf
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
                <label for="inputEmail" class="form-label">Email</label>
                <input name="email" type="text" id="inputEmail" class="form-control">
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
              <button type="submit" class="btn btn-warning"> Salvar</button>
            </div>
                </form>
            </div>
          </div>
        </div>
      </div>
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
        <div class="modal fade" id="editfun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edição de Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
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
                    <option value='manager'>Gerente</option>
                    <option value='employee'>Funcionário</option>
                  </select>
                </div>
                <br>
              <div <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Alterar</button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
