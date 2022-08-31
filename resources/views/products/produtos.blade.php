@extends ('layout')
@section ('title', 'Produtos')
@section ('base')
<br>
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
  <div class="p-4 w-100 m-4 bg-light">
          <h2> Gerenciamento de Produtos
          </h2>
          <a href="{{route('product.create')}}"><button type="button" class="btn btn-info" data-bs-target="#novo">
            Adicionar Produto +
          </button></a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Foto</th>
              <th scope="col">Produto</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Disponibilidade</th>
              <th scope="col">Editar</th>
              <th scope="col">Ver</th>
              <th scope="col">Remover</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>.</td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>R${{($product->price_cents)/100}}</td>
              <td>{{$product->is_available ? 'Disponível' : 'Indisponível'}}</td>
              <td><a href="{{route('product.edit', $product->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a></td>
              <td><a href="{{route('product.show', $product->id)}}" type="button" class="btn btn-info"><i class="bi bi-eye"></i></td>
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
  </div>
</div>
  @endsection
