@extends ('layout')
@section ('title', 'Gerenciar Cardápios')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light">
          <h2> Gerenciamento de Cardápios
          </h2>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#novo">
            Novo Cardápio +
          </button>
            <div class="modal fade" id="novo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Novo Cardápio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p><label for="inputCardapio" class="form-label">Nome do Cardápio</label>
                    <input type="form-label" id="inputcardapio" class="form-control"></p>
                    <label for="inputProduto" class="form-label">Add produto</label>
                    <select id="inputProduto" class="form-select">
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
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Produto (título)</th>
                          <th scope="col">Descrição</th>
                          <th scope="col">Preço</th>
                          <th scope="col">Disponibilidade</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="col">X-Frango</th>
                          <td>Pão, maionese, presunto, queijo, alface, tomate, peito de frango grelhado</td>
                          <td>R$ 19,00</td>
                          <td><div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div></td>
                        </tr>
                          <tr>
                            <th scope="col">Suco de Morango</th>
                            <td>Morango, leite ou água, açúcar, hortelã</td>
                            <td>R$ 7,00</td>
                            <td><div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                              <label class="form-check-label" for="flexSwitchCheckDefault"></label></td> </div>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning"><a href="gerente.html"> Salvar</a></button>
                </div>
              </div>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ver/Editar</th>
                <th scope="col">Remover</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="col">Cardápio Principal</th>
                <td>27/05</td>
                <td><div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div></td>
                <td><a href="editcardapio.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
              </tr>
                <tr>
                  <th scope="col">Cardápio Dia dos Namorados</th>
                  <td>05/06</td>
                  <td><div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                  </div></td>
                  <td><a href="editcardapio2.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                  <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
@endsection
