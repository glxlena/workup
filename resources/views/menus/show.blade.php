@extends ('layout')
@section ('title', 'Vizualizar')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light rounded">
            <h2>{{$menu->name}}</h2>
            <ul class="list-group w-100 list-group-flush">
              <li class="list-group-item"><strong>Disponibilidade: </strong>{{$menu->is_active ? 'Ativo' : 'Inativo'}}</li>
              <li class="list-group-item"><strong>Produtos:</strong></li>
            </ul>
            <br>
                <form action="{{route('menuproduct.store')}}" method="POST">
                  @csrf
                  <div>
                    <label for="selectproducts">Adicionar Produto: </label>
                    <select name="product" class="form-select" aria-label="Default s">
                      @foreach ($products as $product)
                      <option value="{{$product->id}}"> {{$product->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-warning" title="Adicionar">
                </form>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Produto</th>
                      <th scope="col">Descrição</th>
                      <th scope="col">Preço</th>
                      <th scope="col">Disponibilidade</th>
                    </tr>
                  </thead>
                <tbody>
                  @foreach($menu->products as $product)
                  <tr>
                    <td><a target="_blank" href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price_cents/100}}</td>
                    <td>{{$product->is_available ? 'Disponível' : 'Indisponível'}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <form action="{{route('menu.product.destroy', [$menu->id, $product->id])}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger" title="Remover">
                            <i class="bi bi-trash3"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
            <br>
            <div class="d-flex flex-row-reverse gap-2">
            <a href="{{route('menu.edit', $menu->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a>
            <a href="{{route('menu.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
          </div>
          </div>
        </div>
@endsection
