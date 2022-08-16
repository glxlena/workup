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
          </tr><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
          </svg>
        </thead>
        <tbody>
          <tr>
            <th><img src="combo.jpeg" width="204,8" height="144"></img></th>
            <td>Combo frango</td>
            <td>R$ 40,00</td>
            <td>Tirinhas de peito de frango, frango empanado frito, frango empanado frito picante, acompanha molhos caseiros, refrigerante 2L da preferência do cliente, onion rings e batata frita.</td>
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
