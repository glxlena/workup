@extends ('layout')
@section ('title', 'Editar Dados')
@section ('base')
<br>
    <div class="d-flex w-100 position-absolute justify-content-center align-items-start">
      <div class="p-4 w-100 m-4 bg-light">
        <form method="POST" action="{{route('establishment.update', $establishment->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <h3>Alterar Dados da Empresas </h3>
        <div class="d-flex flex-row gap-1">
          <label for="inputAddress2" class="form-label">Nome da Empresa</label>
          <input type="text" name="company_name" class="form-control" id="inputAddress2" value="{{$establishment->company_name}}">
          <label for="inputCity" class="form-label">Razão Social</label>
          <input type="text" name="trading_name" class="form-control" id="inputCity" value="{{$establishment->trading_name}}">
        </div>
        <br>
        <div class="d-flex flex-row gap-1">
          <label for="inputAddress2" class="form-label">CNPJ</label>
          <input type="text" name="cnpj" class="form-control" id="inputAddress2" value="{{$establishment->cnpj}}">
          <label for="inputCity" class="form-label">Telefone</label>
          <input type="text" name="phone" class="form-control" id="inputCity" value="{{$establishment->phone}}">
        </div>
        <br>
        <div class="d-flex flex-row gap-1">
          <label for="inputAddress" class="form-label">Endereço</label>
          <input type="text" name="adress" class="form-control" id="inputAddress" value="{{$establishment->adress}}">
        </div>
        <br>
        <div class="d-flex flex-row-reverse gap-2">
          <button type="submit" class="btn btn-warning">Salvar Alterações</button>
          <a href="{{route('establishment.show', $establishment->id)}}" type="button" class="btn btn-info"><i class="bi bi-skip-backward-circle"></i></a>
        </div>
      </form>
      </div>
    </div>
@endsection
