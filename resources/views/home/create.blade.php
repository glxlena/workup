@extends('layout')
@section('title', 'WorkUp -Criar Post')
@section('base')
<br>
<div class="d-flex justify-content-center align-items-start w-100">
  <div class="p-4 m-4 bg-light rounded shadow" style="max-width: 600px; width: 100%;">
    <h2 class="text-center mb-4">Novo Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="createPostForm">
      @csrf
      <div class="mb-3">
        <label for="inputTitle" class="form-label">Título</label>
        <input name="title" type="text" id="inputTitle" class="form-control" placeholder="Digite o título do post" value="{{ old('title') }}">
        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="inputDescricao" class="form-label">Descrição do serviço</label>
        <textarea name="description" id="inputDescricao" class="form-control" rows="4" placeholder="Escreva a descrição aqui...">{{ old('description') }}</textarea>
        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="post_type" class="form-label">Postado por:</label>
        <select class="form-select" id="post_type" name="post_type" required>
          <option value="">Selecione uma opção</option>
          <option value="freelancer" {{ old('post_type') == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
          <option value="recrutador" {{ old('post_type') == 'recrutador' ? 'selected' : '' }}>Recrutador</option>
        </select>
        @error('post_type')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="niche" class="form-label">Categoria:</label>
        <select name="niche" id="niche" class="form-control" required>
          <option value="">Selecione uma categoria</option>
          @foreach(['Tecnologia', 'Design', 'Marketing', 'Redação', 'Negócios', 'Educação', 'Serviços Gerais'] as $niche)
            <option value="{{ $niche }}" {{ old('niche') == $niche ? 'selected' : '' }}>{{ $niche }}</option>
          @endforeach
        </select>
        @error('niche')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="imageInput" class="form-label">Fotos (opcional)</label><br>
        <label for="imageInput" class="btn btn-outline-secondary d-flex align-items-center" style="gap: 8px; cursor: pointer;">
          <i class="bi bi-plus-square" style="font-size: 1.5rem;"></i> Selecionar Imagem
        </label>
        <input class="form-control d-none" type="file" id="imageInput" name="image" accept="image/*" onchange="previewImage(event, 'imagePreview')">
        @error('image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div id="imagePreview" style="position: relative; max-width: 200px;"></div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Voltar</a>
        <button type="submit" class="btn btn-success">Postar</button>
      </div>
    </form>
  </div>
</div>
@endsection
