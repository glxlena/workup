@extends ('layout')
@section ('title', 'Gerenciar Produto')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
      <h3> Editar Produto
      </h3>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Imagem Atual</th>
            <th scope="col">Título Atual</th>
            <th scope="col">Preço Atual</th>
            <th scope="col">Descrição Atual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><img src="sucolaranja.jpg" width="204,8" height="144"></img></th>
            <td>Suco de Laranja</td>
            <td>R$ 7,00</td>
            <td>Laranja, água ou leite, açúcar.</td>
          </tr>
        </tbody>
      </table>
      <form class="row g-3">
        <div class="col-6">
          <label for="inputNome" class="form-label">Novo Título</label>
          <input type="text" class="form-control" id="inputNome" placeholder="">
          <label for="inputPreço" class="form-label">Novo Preço</label>
          <input type="text" class="form-control" id="inputPreco">
        </div>
        <div class="col-6">
          <label for="inputDescri" class="form-label">Nova Descrição</label>
          <input type="text" class="form-control" id="inputDescri" placeholder="">
          <br>
        <select class="form-select" aria-label="Default select example">
          <option selected>Selecione o Arquivo</option>
          <option value="1">Foto 1</option>
          <option value="2">Foto 2</option>
          <option value="3">Foto 3</option>
        </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-info"><a href="produtos.html">Salvar Alterações</a></button>
        </div>
        </form>
        </div>
        </div>
@endsection
