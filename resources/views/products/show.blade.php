@extends ('layout')
@section ('title', 'Vizualizar')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
<div class="p-4 w-100 m-4 bg-light">
  <h2> Vizualização de Produto</h2>
  <ul class="list-group w-100">
    <li class="list-group-item"><strong>Nome: </strong>{{$product->name}}</li>
    <li class="list-group-item"><strong>Preço: </strong>{{$product->price_cents}}</li>
    <li class="list-group-item"><strong>Descrição: </strong>{{$product->description}}</li>
    <li class="list-group-item"><strong>Disponibilidade: </strong>{{$product->is_available}}</li>
</div>
</div>
@endsection
