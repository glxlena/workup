@extends ('layout')
@section ('title', 'Criar')
@section ('base')
<br>
        <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
          <div class="p-4 w-100 m-4 bg-light rounded">
            <h2>Novo Cardápio
            </h2>
            <form method="POST" action="{{route('menu.store')}}"  enctype="multipart/form-data">
              @csrf
          <div class="d-flex flex-row gap-1">
            <label for="inputMenu" class="form-label">Título</label>
              <input name="name" type="form-label" id="inputMenu" class="form-control">
              @error('name')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
              <label for="inputDescricao" class="form-label">Descrição</label>
              <input name="description" type="text" id="inputDescricao" class="form-control" >
            </div>
            <br>
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
                    <td>.</td>
                  </tr>
                  </tbody>
              </table>

          <div class="d-flex flex-row-reverse gap-1">
            <button type="submit" class="btn btn-warning">Salvar</button>
            <a href="{{route('menu.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
          </div>
        </form>
        </div>
      </div>

@endsection
