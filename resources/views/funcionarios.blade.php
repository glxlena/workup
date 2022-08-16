@extends ('layout')
@section ('title', 'Funcionários')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light">
      <h2> Funcionários
      </h2>
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#novo">
        Criar Novo+
      </button>
      <div class="modal fade" id="novo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastro de Funcionário</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex flex-row gap-2">
                <label for="inputFuncionario" class="form-label">Nome</label>
                <input type="form-label" id="inputFuncionario" class="form-control">
                <label for="inputtel" class="form-label">Telefone</label>
                <input type="form-label" id="inputel" class="form-control">
              </div>
              <br>
              <div class="d-flex flex-row gap-2">
                <label for="inputcpf" class="form-label">CPF</label>
                <input type="form-label" id="inputcpf" class="form-control">
                <label for="inputcep" class="form-label">CEP</label>
                <input type="form-label" id="inputcep" class="form-control">
              </div>
              <br>
              <div class="d-flex flex-row gap-2">
                <label for="inputendereco" class="form-label">Endereço</label>
                <input type="form-label" id="inputendereco" class="form-control">
              </div>
              <br>
              <div class="d-flex flex-row gap-4">
                <label for="inputcidade" class="form-label">Cidade</label>
                <input type="form-label" id="inputcidade" class="form-control">
                <label for="inputEstado" class="form-label">UF</label>
                <select id="inputEstado" class="form-select">
                  <option selected>Escolha</option>
                  <option>AC</option>
                  <option>AL</option>
                  <option>AM</option>
                  <option>AP</option>
                  <option>BA</option>
                  <option>CE</option>
                  <option>DF</option>
                  <option>ES</option>
                  <option>GO</option>
                  <option>MA</option>
                  <option>MG</option>
                  <option>MS</option>
                  <option>MT</option>
                  <option>PA</option>
                  <option>PB</option>
                  <option>PE</option>
                  <option>PR</option>
                  <option>PI</option>
                  <option>RJ</option>
                  <option>RN</option>
                  <option>RO</option>
                  <option>RR</option>
                  <option>RS</option>
                  <option>SC</option>
                  <option>SE</option>
                  <option>SP</option>
                  <option>TO</option>
                </select>
              </div>
              <br>
              <div class="d-flex flex-row gap-2">
                <label for="inputlogin" class="form-label">Login</label>
                <input type="form-label" id="inputlogin" class="form-control">
                <label for="exampleInputSenha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="exampleInputSenha">
              </div>
              <br>
            <div <div class="modal-footer">
              <button type="button" class="btn btn-warning"><a href="funcionarios.html"> Salvar</a></button>
            </div>
            </div>
          </div>
        </div>
      </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">Endereço</th>
              <th scope="col">Telefone</th>
              <th scope="col">Login</th>
              <th scope="col">Editar</th>
              <th scope="col">Remover</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">Maria Eduarda</th>
              <td>736.927.574-02</td>
              <td>Rua Flor, 132</td>
              <td>(42)988436237</td>
              <td>maria_eduarda02@login</td>
              <td><button type="button" class="btn btn-info"><i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editfun"></i></button></button></td>
              <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
            </tr>
            <tr>
              <th scope="col">Luís</th>
              <td>084.263.846-17</td>
              <td>Rua Trajano, 42</td>
              <td>(42)998153627</td>
              <td>luis17@login</td>
              <td><button type="button" class="btn btn-info"><i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editfun2"></i></button></button></td>
              <td><button type="button" class="btn btn-info"><i class="bi bi-trash3"></i></button></td>
            </tr>
          </tbody>
        </table>
        <div class="modal fade" id="editfun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edição de Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex flex-row gap-2">
                  <label for="inputFuncionario" class="form-label">Nome</label>
                  <input type="form-label" id="inputFuncionario" class="form-control">
                  <label for="inputtel" class="form-label">Telefone</label>
                  <input type="form-label" id="inputel" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputcpf" class="form-label">CPF</label>
                  <input type="form-label" id="inputcpf" class="form-control">
                  <label for="inputcep" class="form-label">CEP</label>
                  <input type="form-label" id="inputcep" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputendereco" class="form-label">Endereço</label>
                  <input type="form-label" id="inputendereco" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-4">
                  <label for="inputcidade" class="form-label">Cidade</label>
                  <input type="form-label" id="inputcidade" class="form-control">
                  <label for="inputEstado" class="form-label">UF</label>
                  <select id="inputEstado" class="form-select">
                    <option selected>Escolha</option>
                    <option>AC</option>
                    <option>AL</option>
                    <option>AM</option>
                    <option>AP</option>
                    <option>BA</option>
                    <option>CE</option>
                    <option>DF</option>
                    <option>ES</option>
                    <option>GO</option>
                    <option>MA</option>
                    <option>MG</option>
                    <option>MS</option>
                    <option>MT</option>
                    <option>PA</option>
                    <option>PB</option>
                    <option>PE</option>
                    <option>PR</option>
                    <option>PI</option>
                    <option>RJ</option>
                    <option>RN</option>
                    <option>RO</option>
                    <option>RR</option>
                    <option>RS</option>
                    <option>SC</option>
                    <option>SE</option>
                    <option>SP</option>
                    <option>TO</option>
                  </select>
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputlogin" class="form-label">Login</label>
                  <input type="form-label" id="inputlogin" class="form-control">
                  <label for="exampleInputSenha" class="form-label">Senha</label>
                  <input type="password" class="form-control" id="exampleInputSenha">
                </div>
                <br>
              <div <div class="modal-footer">
                <button type="button" class="btn btn-warning"><a href="funcionarios.html">Alterar</a></button>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="editfun2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edição de Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex flex-row gap-2">
                  <label for="inputFuncionario" class="form-label">Nome</label>
                  <input type="form-label" id="inputFuncionario" class="form-control">
                  <label for="inputtel" class="form-label">Telefone</label>
                  <input type="form-label" id="inputel" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputcpf" class="form-label">CPF</label>
                  <input type="form-label" id="inputcpf" class="form-control">
                  <label for="inputcep" class="form-label">CEP</label>
                  <input type="form-label" id="inputcep" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputendereco" class="form-label">Endereço</label>
                  <input type="form-label" id="inputendereco" class="form-control">
                </div>
                <br>
                <div class="d-flex flex-row gap-4">
                  <label for="inputcidade" class="form-label">Cidade</label>
                  <input type="form-label" id="inputcidade" class="form-control">
                  <label for="inputEstado" class="form-label">UF</label>
                  <select id="inputEstado" class="form-select">
                    <option selected>Escolha</option>
                    <option>AC</option>
                    <option>AL</option>
                    <option>AM</option>
                    <option>AP</option>
                    <option>BA</option>
                    <option>CE</option>
                    <option>DF</option>
                    <option>ES</option>
                    <option>GO</option>
                    <option>MA</option>
                    <option>MG</option>
                    <option>MS</option>
                    <option>MT</option>
                    <option>PA</option>
                    <option>PB</option>
                    <option>PE</option>
                    <option>PR</option>
                    <option>PI</option>
                    <option>RJ</option>
                    <option>RN</option>
                    <option>RO</option>
                    <option>RR</option>
                    <option>RS</option>
                    <option>SC</option>
                    <option>SE</option>
                    <option>SP</option>
                    <option>TO</option>
                  </select>
                </div>
                <br>
                <div class="d-flex flex-row gap-2">
                  <label for="inputlogin" class="form-label">Login</label>
                  <input type="form-label" id="inputlogin" class="form-control">
                  <label for="exampleInputSenha" class="form-label">Senha</label>
                  <input type="password" class="form-control" id="exampleInputSenha">
                </div>
                <br>
              <div <div class="modal-footer">
                <button type="button" class="btn btn-warning"><a href="funcionarios.html">Alterar</a></button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
