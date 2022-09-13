@extends('layout')
@section ('title', 'Editar')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light rounded">
      <h3> Editar Cardápio </h3>
      <form method="POST" action="{{route('menu.update', $menu->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="d-flex flex-row gap-5">
        <div>
          <label for="inputName" class="form-label">Nome</label>
          <input name="name" type="text" id="inputName" class="form-control" value="{{$menu->name}}">
          <label for="inputDescriprion" class="form-label">Descrição</label>
          <input name="description" type="text" id="inputDescription" class="form-control" value="{{$menu->description}}">
        </div>
        <div class="d-flex flex-row gap-3">
          Ativar/Desativar:<div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
          </div>
          <label for="inputProdutoCardapio" class="form-label">Adicionar Produto:</label>
          <br>
          <select name="product" class="form-select">
            @foreach ($products as $product)
            <option value="{{$product->id}}"> {{$product->name}}</option>
            @endforeach
          </select>
          <button type="button" class="btn btn-info"><i class="bi bi-plus-circle"></i>
          </button>
        </div>
      </div>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Produto (Título)</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Disponibilidade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>.</td>
            <td>.</td>
            <td>.</td>
            <td>.</td>
            <form method="POST" action ="{{route('menu.destroy', $menu->id)}}">
              @csrf
              @method('delete')
            <td><button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button></form></td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-info">Salvar</button>
    </div>
  </div>
@endsection
