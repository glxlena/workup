@extends ('layout')
@section ('title', 'Criar Produto')
@section ('base')
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
  <div class="p-4 w-100 m-4 bg-light rounded">
    <h2> Novo Produto
    </h2>
  <form method="POST" action="{{route('product.store')}}"  enctype="multipart/form-data">
    @csrf
<div class="d-flex flex-row gap-1">
  <label for="inputNome" class="form-label">Nome</label>
  <input name="name" type="text" id="inputNome" class="form-control">
  @error('name')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
  <label for="inputDescricao" class="form-label">Descrição</label>
  <input name="description" type="text" id="inputDescricao" class="form-control" >
  @error('description')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
</div>
<br>
<div class="d-flex flex-row gap-2">
  <label for="inputpreco" class="form-label">Preço</label>
  <input name="price" type="number" id="inputpreco" class="form-control">
  @error('price_cents')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
Disponibilidade
  <select class="form-select" name="is_available" aria-label="Default select example">
    <option value="1">Disponível</option>
    <option value="0">Indisponível</option>
  </select>
  @error('is_available')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
</div>
<br>
<div class="input-group mb-3">
  <label class="form-label" for="picture">Imagem </label>
  <input type="file" name="image" class="form-control" accept="image/jpeg/jpg">
  @error ('image')
  <div class="text-danger">
    {{$message}}
  </div>
  @enderror
</div>
<div class="d-flex flex-row-reverse gap-1">
  <button type="submit" class="btn btn-warning">Salvar</button>
<a href="{{route('product.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
</form>
</div>
</div>
</div>
@endsection
