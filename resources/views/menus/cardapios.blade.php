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
                <th scope="col">Link</th>
                <th scope="col">Status</th>
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
                <td><button type="button" data-bs-toggle="modal" data-bs-target="#linkModal" class="btn btn-info"><i class="bi bi-link"></i></button></td>
                <td>{{$menu->is_active ? 'Ativo' : 'Inativo'}}</td>
                <td><a href="menu/{{$menu->id}}/edit" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a></td>
                <td><a href="{{route('menu.show', $menu->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                <form method="POST" action ="{{route('menu.destroy', $menu->id)}}">
                  @csrf
                  @method('delete')
                <td><button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button></form></td>
              </tr>
              <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Link Compartilhável</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row gap-2">
                      <img src="https://chart.googleapis.com/chart?cht=qr&chs=400x400&chl={{urlencode(route('menu.public.show', $menu->id))}}" >
                    </div>
                    <a href="{{route('menu.public.show', $menu->id)}}">Acesse Aqui</a>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fechar</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
@endsection
