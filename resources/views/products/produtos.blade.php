@extends ('layout')
@section ('title', 'Produtos')
@section ('base')
<br>
            <div class="modal fade" id="novo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Adicionar Produto</h5>
                  <form method="POST" action="{{route('product.store')}}">
                    @csrf
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex flex-row gap-3">
                  <p><label for="inputNome" class="form-label">Nome</label>
                    <input type="form-label" name= "name" id="inputNome" class="form-control"></p>
                    <p><label for="inputValor" class="form-label">Preço</label>
                      <input type="form-label" name="price_cents" id="inputValor" class="form-control"></p>
                    </div>
                    <label for="inputDescricao" class="form-label">Descrição</label>
                      <input type="form-label" name="description" id="inputDescricao" class="form-control">
                      <br>
                        <div class="form-check form-switch">Disponibilidade
                          <input class="form-check-input" name="is_available" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-warning">Adicionar</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        <br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light">
          <h2> Gerenciamento de Produtos
          </h2>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#novo">
            Adicionar Produto +
          </button>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Produto</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Disponibilidade</th>
              <th scope="col">Editar</th>
              <th scope="col">Remover</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price_cents}}</td>
              <td>{{$product->is_available}}</td>
              <td><a href="{{route('product.edit', $product->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil" data-bs-toggle="modal"></i></a></td>
              <form method="POST" action ="{{route('product.destroy', $product->id)}}">
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
