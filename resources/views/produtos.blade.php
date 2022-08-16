@extends ('layout')
@section ('title', 'Produtos')
@section ('base')
<br>
            <div class="modal fade" id="novo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Adicionar Produto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex flex-row gap-3">
                  <p><label for="inputNovo" class="form-label">Nome</label>
                    <input type="form-label" id="inputNovo" class="form-control"></p>
                    <p><label for="inputValor" class="form-label">Preço</label>
                      <input type="form-label" id="inputValor" class="form-control"></p>
                    </div>
                    <label for="inputNovo" class="form-label">Descrição</label>
                      <input type="form-label" id="inputNovo" class="form-control">
                      <br>
                        <div class="form-check form-switch">Disponibilidade
                          <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </div>
                        <br>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Selecione o Arquivo</option>
                          <option value="1">Foto 1</option>
                          <option value="2">Foto 2</option>
                          <option value="3">Foto 3</option>
                        </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning"><a href="produtos.html"> Adicionar</a></button>
                </div>
              </div>
            </div>
          </div>
        <br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light">
          <h2> Gerenciamento de Produtos
          </h2>
          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#novo">
            Adicionar Produto +
          </button>
        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Produto</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Disponibilidade</th>
              <th scope="col">Editar</th>
              <th scope="col">Remover</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><img src="frango.jpg" width="204,8" height="144"></img> </td>
              <th scope="col">Frango Frito</th>
              <td>Coxa sobrecoxa empanada e frita, acompanha molhos caseiros.</td>
              <td>R$ 15,00</td>
              <td><div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
              </div></td>
              <td><a href="produto1.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
              <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
            </tr>
              <tr>
                <td><img src="xsalada.jpg" width="204,8" height="144"></img> </td>
                <th scope="col">X-Salada</th>
                <td>Pão, maionese, presunto, queijo, hambúrguer caseiro, alface, tomate.</td>
                <td>R$ 17,00</td>
                <td><div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div></td>
                <td><a  href="produto2.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
              </tr>
              <tr>
                <td><img src="combo.jpeg" width="204,8" height="144"></img> </td>
                <th scope="col">Combo Frango</th>
                <td>Tirinhas de peito de frango, frango empanado frito, frango empanado frito picante, acompanha molhos caseiros, refrigerante 2L da preferência do cliente, onion rings e batata frita.</td>
                <td>R$ 40,00</td>
                <td><div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div></td>
                <td><a href="produto3.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
              </tr>
              <tr>
                <td><img src="sucolaranja.jpg" width="204,8" height="144"></img> </td>
                <th scope="col">Suco de Laranja</th>
                <td>Laranja, água ou leite, açúcar.</td>
                <td>R$ 7,00</td>
                <td><div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div></td>
                <td><a href="produto4.html"><button type="button" class="btn btn-info"><i class="bi bi-pencil"></i></button></a></td>
                <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
@endsection
