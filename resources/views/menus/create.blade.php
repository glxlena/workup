@extends ('layout')
@section ('title', 'Gerenciar Cardápios')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light">
            <h2>Novo Cardápio
            </h2>
            <form method="POST" action="{{route('menus.store')}}"  enctype="multipart/form-data">
              @csrf
          <div class="d-flex flex-row gap-1">
            <label for="inputMenu" class="form-label">Nome do Cardápio</label>
              <input name="" type="form-label" id="inputMenu" class="form-control">
              @error('.')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
            <label for="inputProduct" class="form-label">Add produto</label>
            <select id="inputProduct" class="form-select">
              <option>.</option>
              <option>.</option>
              <option>.</option>
              <option>.</option>
            </select>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Produto</th>
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
                    <td><div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div></td>
                  </tr>
                  </tbody>
              </table>
            </div>
          <div class="d-flex flex-row-reverse gap-1">
            <button type="submit" class="btn btn-warning"><a href="{{route('menus.show')}}"> Salvar</a></button>
          </div>
        </form>
        </div>
      </div>

@endsection
