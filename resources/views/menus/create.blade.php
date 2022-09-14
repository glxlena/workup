@extends ('layout')
@section ('title', 'Criar Cardápio')
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
              @error('description')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
            </div>
            <br>
            <div class="d-flex flex-row gap-2">
            Status
              <select class="form-select" name="is_active" aria-label="Default select example">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
              </select>
              @error('is_active')
              <div class="text-danger">
                {{$message}}
              </div>
              @enderror
          </div>
              <br>
          <div class="d-flex flex-row-reverse gap-1">
            <button type="submit" class="btn btn-warning">Salvar</button>
            <a href="{{route('menu.index')}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
          </div>
        </form>
        </div>
      </div>

@endsection
