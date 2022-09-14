@extends ('layout')
@section ('title', 'Vizualizar Produto')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
<div class="p-4 w-100 m-4 bg-light rounded">
  <h2> Vizualização de Produto</h2>
  <ul class="list-group w-100">
    <li class="list-group-item"><strong>Nome: </strong>{{$product->name}}</li>
    <li class="list-group-item"><strong>Preço: </strong>R${{($product->price_cents)/100}}</li>
    <li class="list-group-item"><strong>Descrição: </strong>{{$product->description}}</li>
    <li class="list-group-item"><strong>Disponibilidade: </strong>{{$product->is_available ? 'Disponível' : 'Indisponível'}}</li>
  </ul>
  <br>
  <div class="d-flex flex-row-reverse gap-2">
  <a href="{{route('product.edit', $product->id)}}" type="button" class="btn btn-info"><i class="bi bi-pencil"></i></a>
  <a href="{{route('product.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
</div>
</div>
</div>
@endsection
