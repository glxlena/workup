@extends ('layout')
@section ('title', 'Cardápios')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light rounded">
          <h2> Gerenciamento de Cardápios
          </h2>
          <a href="{{route('menu.create')}}"><button type="button" class="btn btn-info" data-bs-target="#novo">
            Novo Cardápio +
          </button></a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Disponibilidade</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
                <th scope="col">Remover</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td>.</td>
                <td><a href="{{route('menu.edit', $menu->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a></td>
                <td><a href="{{route('menu.show', $menu->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                <form method="POST" action ="{{route('menu.destroy', $menu->id)}}">
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
