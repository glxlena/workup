@extends ('layout')
@section ('title', 'Editar')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
  <div class="p-4 w-100 m-4 bg-light">
    <h2> Edição de Produto
    </h2>
  <form method="POST" action="{{route('product.update', $product->id)}}">
    @csrf
    @method('PUT')
<div class="d-flex flex-row gap-1">
  <label for="inputNome" class="form-label">Nome</label>
  <input name="name" type="text" id="inputNome" class="form-control">
  <label for="inputDescricao" class="form-label">Descrição</label>
  <input name="description" type="text" id="inputDescricao" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputpreco" class="form-label">Preço</label>
  <input name="price_cents" type="text" id="inputpreco" class="form-control">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Disponibilidade</label>
</div>
<br>
<div <div class="modal-footer">
<button type="submit" class="btn btn-warning">Alterar</button>
</div>
</div>
</div>
@endsection
