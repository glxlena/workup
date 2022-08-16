@extends ('layout')
@section ('title', 'Pedidos')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
      <h2> Pedidos
      </h2>
      <div class="d-flex flex-row gap-2">
        <h5>
          <p> 23/06/22
        </h5><i class="bi bi-calendar3"></i></p>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nº</th>
            <th scope="col">Mesa</th>
            <th scope="col">Status</th>
            <th scope="col">Itens</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="col">1</th>
            <td>003</td>
            <td>Aberto</td>
            <td>Suco de Morango, Combo Frango</td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pedido1"><i class="bi bi-info-circle"></i></button></td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#status1"><i class="bi bi-pencil"></i></button></td>
          </tr>
          <tr>
            <th scope="col">2</th>
            <td>010</td>
            <td>Finalizado</td>
            <td>X-Salada, Frango Frito, Suco de Laranja, Suco de Morango</td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pedido2"><i class="bi bi-info-circle"></i></button></td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#status2"><i class="bi bi-pencil"></i></button></td>
          </tr>
          <tr>
            <th scope="col">3</th>
            <td>007</td>
            <td>Em Andamento</td>
            <td>Combo Frango, Suco de Morango, X-Salada</td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#pedido3"><i class="bi bi-info-circle"></i></button></td>
            <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#status3"><i class="bi bi-pencil"></i></button></td>
          </tr>
        </tbody>
      </table>
      <div class="modal fade" id="pedido1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pedido 1</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Itens</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Obs</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Suco de Morango</th>
                    <td>2</td>
                    <td>R$ 16,00</td>
                    <td>Sem Hortelã</td>
                  </tr>
                  <tr>
                    <th>Combo Frango</th>
                    <td>1</td>
                    <td>R$ 40,00</td>
                    <td>Coca-Cola</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <p><b> Total:</b> R$58,00</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="status1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="inputState" class="form-label">Definir Status</label>
              <select id="inputState" class="form-select">
                <option selected>Escolha...</option>
                <option>Aberto</option>
                <option>Em Andamento</option>
                <option>Finalizado</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-warning"><a href="pedidos.html">Salvar</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="pedido2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pedido 2</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Itens</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Obs</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>X-Salada</th>
                    <td>3</td>
                    <td>R$ 51,00</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>Frango Frito</th>
                    <td>1</td>
                    <td>R$ 15,00</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>Suco de Laranja</th>
                    <td>2</td>
                    <td>R$ 14,00</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>Suco de Morango</th>
                    <td>1</td>
                    <td>R$ 8,00</td>
                    <td> </td>
                  </tr>
                </tbody>
              </table>
              <br>
              <p><b> Total:</b> R$ 88,00
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="status2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="inputState" class="form-label">Definir Status</label>
              <select id="inputState" class="form-select">
                <option selected>Escolha...</option>
                <option>Aberto</option>
                <option>Em Andamento</option>
                <option>Finalizado</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-warning"><a href="pedidos.html">Salvar</a></button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="pedido3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pedido 3</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Itens</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Obs</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Combo Frango</th>
                    <td>1</td>
                    <td>R$ 40,00</td>
                    <td>Sem Onio Rings, sem regrigerante</td>
                  </tr>
                  <tr>
                    <th>Suco de Laranja</th>
                    <td>3</td>
                    <td>R$ 21,00</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <th>X-Salada</th>
                    <td>1</td><!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <title>Pedidos</title>
</head>

<body class="bg-warning vw-100 vh-100">
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="gerente.html">Cardápio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="produtos.html">Produtos</a>
          <a class="nav-link" href="pedidos.html">Ver Pedidos</a>
          <a class="nav-link" href="funcionarios.html">Funcionários</a>
          <a class="nav-link" href="empresa.html">Dados da Empresa</a>
        </div>
      </div>
    </div>
  </nav>
                    <td>R$ 17,00</td>
                    <td>Sem alface</td>
                  </tr>
                </tbody>
              </table>
              <br>
              <p><b> Total:</b> R$ 78,00
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="status3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="inputState" class="form-label">Definir Status</label>
              <select id="inputState" class="form-select">
                <option selected>Escolha...</option>
                <option>Aberto</option>
                <option>Em Andamento</option>
                <option>Finalizado</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-warning"><a href="pedidos.html">Salvar</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
