@extends ('layout')
@section ('title', 'Cardápio Virtual')
@section ('base')
<br>
<div class="d-flex w-100 position-absolute align-items-start">
  <div class="p-4 w-100 d-flex justify-content-center m-4 bg-light rounded">
    <div class="w3-card-4">
      <header class="w3-container w3-info text-center">
        <h1>Cardápio Virtual</h1>
      </header>
      <div class="row gap-2">
      @foreach ($menu->products as $product)
        <div class="card" style="width: 18rem;">
          <img src="{{asset('/storage/' . $product->image_path)}}" width="240" height="160" class="card-img-top">
          <div class="card-body">
            <p class="card-text">
              <ul class="list-group w-100">
                <li class="list-group-item"><strong>Nome: </strong>{{$product->name}}</li>
                <li class="list-group-item"><strong>Preço: </strong>R${{($product->price_cents)/100}}</li>
                <li class="list-group-item"><strong>Descrição: </strong>{{$product->description}}</li>
                <li class="list-group-item"><strong>Disponibilidade: </strong>{{$product->is_available ? 'Disponível' : 'Indisponível'}}</li>
              </ul>
            </p>
          </div>
        </div>
        <br>
        @endforeach
      </div>
      </div>
    </div>
  </div>
@endsection
