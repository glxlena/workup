@extends ('layout')
@section ('title', 'Dados da Empresa')
@section ('base')
<br>
  <div class="d-flex w-100 position-absolute justify-content-center align-items-start bg">
    <div class="p-4 w-100 m-4 bg-light rounded">
    <form class="row g-3">
      <h3>Dados da Empresas </h3>
      <div class="col-6">
        <label for="inputAddress2" class="form-label">Nome da Empresa</label>
        <input type="text" class="form-control" id="inputAddress2" value="{{$establishment->company_name}}" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Razão Social</label>
        <input type="text" class="form-control" id="inputCity" value="{{$establishment->trading_name}}" disabled>
      </div>
      <div class="col-6">
        <label for="inputAddress2" class="form-label">CNPJ</label>
        <input type="text" class="form-control" id="inputAddress2" value="{{$establishment->cnpj}}" disabled>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="inputCity" value="{{$establishment->phone}}" disabled>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="inputAddress" value="{{$establishment->adress}}" disabled>
      </div>
      <div class="d-flex flex-row-reverse">
        <button type="button" class="btn btn-info"><a href="{{route('establishment.edit', $establishment->id)}}">Alterar Dados</a></button>
      </div>
    </form>
    </div>
  </div>
@endsection
