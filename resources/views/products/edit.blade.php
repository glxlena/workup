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
  <input name="name" type="text" id="inputNome" class="form-control" value="{{old('name', $product->name)}}">
  <label for="inputDescricao" class="form-label">Descrição</label>
  <input name="description" type="text" id="inputDescricao" class="form-control" value="{{old('description', $product->description)}}">
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputpreco" class="form-label">Preço</label>
  <input name="price" type="number" id="inputpreco" class="form-control" value="{{($product->price_cents)/100}}">
</div>
<br>
<div class="d-flex flex-row gap-3">Disponibilidade
  <select class="form-select" name="is_available" aria-label="Default select example">
    <option value="1" @if($product->is_available) selected @endif>Disponível</option>
    <option value="0" @if (!$product->is_available) selected @endif>Indisponível</option>
  </select>
</div>
<br>
<div class="input-group mb-3">
  <label class="form-label" for="picture">Imagem </label>
  <input type="file" name="picture" class="form-control" accept="image/jpeg/jpg">
  @error ('picture')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
</div>
<br>
<div class="d-flex flex-row-reverse gap-2">
<button type="submit" class="btn btn-warning">Alterar</button>
<a href="{{route('product.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
</div>
</div>
</div>
@endsection
