@extends ('layout')
@section ('title', 'Gerenciar Cardápios')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light">
          <h2> Gerenciamento de Cardápios
          </h2>
          <a href="{{route('menus.create')}}"><button type="button" class="btn btn-info" data-bs-target="#novo">
            Novo Cardápio +
          </button></a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Ativo</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
                <th scope="col">Remover</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                <td>{{$menu->.}}</td>
                <td>{{$menu->.}}/td>
                <td>{{$menu->is_available ? 'Disponível' : 'Indisponível'}}</td>
                <td><a href="{{route('menus.edit', $menu->id)}}"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                <td><a href="{{route('menus.show', $menu->id)}}"><button type="button" class="btn btn-info"><i class="bi bi-eye"></i></button></a></td>
                <form method="POST" action ="{{route('menus.destroy', $menu->id)}}">
                  @csrf
                  @method('delete')
                <td><button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></form></td>
              </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
@endsection
