@extends('layout')
@section ('title', 'Editar Cardápio')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light rounded">
      <h3> Editar Cardápio </h3>
      <form method="POST" action="{{route('menu.update', $menu->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="d-flex flex-row gap-5">
          <label for="inputName" class="form-label">Nome</label>
          <input name="name" type="text" id="inputName" class="form-control" value="{{$menu->name}}">
          <label for="inputDescriprion" class="form-label">Descrição</label>
          <input name="description" type="text" id="inputDescription" class="form-control" value="{{$menu->description}}">
        </div>
        <br>
        <div class="d-flex flex-row gap-2">
        Status
          <select class="form-select" name="is_active" aria-label="Default select example">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
          </select>
          @error('is_active')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror
        </div>
      <br>
      <div class="d-flex flex-row-reverse gap-2">
      <button type="submit" class="btn btn-warning">Alterar</button>
      <a href="{{route('menu.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
</form>
    </div>
    </div>
  </div>
@endsection
