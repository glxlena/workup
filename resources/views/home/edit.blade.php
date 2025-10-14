@extends('layout')
@section('title', 'WorkUp - Editar Post')
@section('base')
<br>
<div class="d-flex justify-content-center align-items-start w-100">
  <div class="p-4 m-4 bg-light rounded shadow" style="max-width: 600px; width: 100%;">
    <h2 class="text-center mb-4">Editar Postagem</h2>
    <form id="editForm" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="inputTitle" class="form-label">Título</label>
        <input name="title" type="text" id="inputTitle" class="form-control" value="{{ old('title', $post->title) }}">
        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="inputDescricao" class="form-label">Descrição do serviço</label>
        <textarea name="description" id="inputDescricao" class="form-control" rows="4">{{ old('description', $post->description) }}</textarea>
        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="post_type" class="form-label">Postado por:</label>
        <select class="form-select" id="post_type" name="post_type" required>
          <option value="">Selecione a vaga:</option>
          <option value="freelancer" {{ old('post_type', $post->post_type) == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
          <option value="recrutador" {{ old('post_type', $post->post_type) == 'recrutador' ? 'selected' : '' }}>Recrutador</option>
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
            <option value="{{ $niche }}" {{ old('niche', $post->niche) == $niche ? 'selected' : '' }}>{{ $niche }}</option>
          @endforeach
        </select>
        @error('niche')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <br>
      <div class="mb-3">
        <label class="form-label">Fotos Atuais (Máx. 5):</label>
        <div id="existingImagesContainer" class="d-flex flex-wrap gap-2 mb-3">
            @foreach($post->images as $image)
                <div class="image-wrapper" id="image-{{ $image->id }}" style="position: relative; width: 100px; height: 100px;">
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Foto {{ $image->id }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                    <button type="button" 
                            class="btn-remove-image" 
                            data-image-id="{{ $image->id }}"
                            onclick="markImageForRemoval({{ $image->id }})"
                            style="position: absolute; top: -10px; right: -10px; background: rgba(255,0,0,0.8); border:none; color: white; border-radius: 50%; width: 24px; height: 24px; font-size: 1rem; cursor: pointer; line-height: 1;">×</button>
                </div>
            @endforeach
        </div>
      </div>
      
      <div id="removedImagesInputs">
      </div>

      <br>
      <div class="mb-3">
        <label for="newImagesInput" class="form-label">Adicionar Novas Fotos (opcional)</label><br>
        <label for="newImagesInput" class="btn btn-outline-secondary d-flex align-items-center" style="gap: 8px; cursor: pointer;">
          <i class="bi bi-plus-square" style="font-size: 1.5rem;"></i> Selecionar Novas Imagens
        </label>
        <input class="form-control d-none" 
              type="file" 
              id="newImagesInput" 
              name="new_images[]" 
              accept="image/*" 
              multiple 
              onchange="previewMultipleImages(event, 'newImagesPreview')">
        
        @error('new_images')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        @error('new_images.*')
            <div class="text-danger">Erro em uma das novas imagens: {{ $message }}</div>
        @enderror
      </div>

      <div id="newImagesPreview" class="d-flex flex-wrap gap-2 mb-3">
      </div>


      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('posts.userPosts') }}" class="btn btn-outline-secondary">Voltar</a>
        <button type="button" class="btn btn-success" onclick="showConfirmation()">Salvar Alterações</button>
      </div>
    </form>
  </div>
</div>
  
<!--modal de confirmação de edição-->
<div id="confirmationModal" class="modal-confirmation" style="display:none;">
  <div class="modal-content modalEdit">
    <p>Tem certeza que deseja alterar?</p>
    <div class="d-flex justify-content-center gap-3">
      <button class="btn btn-success" onclick="submitForm()">Sim</button>
      <button class="btn btn-danger" onclick="hideConfirmation()">Não</button>
    </div>
  </div>
</div>
@endsection