@extends ('layout')
@section ('title', 'Vizualizar')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light rounded">
            <h2>{{$menu->name}}</h2>
            <ul class="list-group w-100 list-group-flush">
              <li class="list-group-item"><strong>Disponibilidade: </strong>{{$menu->is_available ? 'Disponível' : 'Indisponível'}}</li>
              <li class="list-group-item"><strong>Produtos:</strong></li>
            </ul>
            <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Produto (Título)</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Preço</th>
                      <th scope="col">Disponibilidade</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach
                    <tr>
                      <td>.</td>
                      <td>.</td>
                      <td>.</td>
                      <td>.</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            <br>
            <div class="d-flex flex-row-reverse gap-2">
            <a href="{{route('menu.edit', $menu->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a>
            <a href="{{route('menu.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
          </div>
          </div>
        </div>
@endsection
