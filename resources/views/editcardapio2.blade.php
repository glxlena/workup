@extends('layout')
@section ('title', 'Ver Cardápio')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
      <h3> Vizualizar Cardápio </h3>
      <div class="d-flex flex-row gap-5">
        <div>
          <b>Nome do Cardápio:</b> Cardápio Dia dos Namorados
          <br>
          <b> Criado em:</b> 05/06/22 20:15
        </div>
        <div class="d-flex flex-row gap-3">
          Ativar/Desativar:<div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
          </div>
          <label for="inputProdutoCardapio" class="form-label">Adicionar Produto:</label>
          <br>
          <select id="inputProdutoCardapio" class="form-select">
            <option selected>Escolha...</option>
            <option>Frango Frito</option>
            <option>Batata Frita</option>
            <option>X-Salada</option>
            <option>X-Burguer</option>
            <option>X-Frango</option>
            <option>Combo de Frango</option>
            <option>Suco de Laranja</option>
            <option>Suco de Morango</option>
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
            <th scope="col">X-Salada</th>
            <td>Pão, maionese, presunto, queijo, hambúrguer caseiro, alface, tomate.</td>
            <td>R$17,00</td>
            <td>Disponível</td>
          </tr>
          <tr>
            <th scope="col">Suco de Laranja</th>
            <td>Laranja, água ou leite, açúcar.</td>
            <td>R$7,00</td>
            <td>Disponível</td>
          </tr>
          <tr>
            <th scope="col">Combo Frango</th>
            <td>Tirinhas de peito de frango, frango empanado frito, frango empanado frito picante, acompanha molhos caseiros, refrigerante da preferência do cliente, onion rings e batata frita.</td>
            <td>R$40,00</td>
            <td>Indisponível</td>
          </tr>
          <tr>
            <th scope="col">Suco de Morango</th>
            <td>Morango, água ou leite, açúcar.</td>
            <td>R$8,00</td>
            <td>Disponível</td>
          </tr>
        </tbody>
      </table>
      <button type="button" class="btn btn-info"><a href="gerente.html">Salvar</a></button>
    </div>
  </div>
@endsection
