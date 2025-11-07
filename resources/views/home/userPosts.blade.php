@extends('layout')
@section('title', 'WorkUP - Meus Posts')
@section('base')
<br>
<div class="home-container">
    <div class="home-content-box sombra">
    <!--mensagem de sucesso na edição de post-->
    @if(session('success'))
      <div id="successAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>{{ session('success') }}</div>
      </div>
    @endif

   <!--mensagem de sucesso na exclusão de post, com opção de desfazer-->
    @if(session('post_deleted'))
      <div id="deleteAlert" class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between gap-3" role="alert">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-x-circle-fill fs-5"></i>
          <div>{{ session('post_deleted') }}</div>
        </div>
        <form method="POST" action="{{ route('posts.undoDelete') }}">
          @csrf
          <button type="submit" class="btn btn-danger">Desfazer</button>
        </form>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


    <h2 class="text-center">Meus Posts</h2>
    <form method="GET" action="{{ route('posts.userPosts') }}">
      <div class="d-flex justify-content-center">
        <div class="row g-3 mb-4 align-items-end justify-content-center w-100" style="max-width: 900px;">
          <!--filtro por tipo de usuário-->
          <div class="col-md-3 col-sm-6">
              <label for="user_type" class="form-label">Postado por:</label>
              <select name="user_type" id="user_type" class="form-select">
                <option value="">Todos</option>
                <option value="freelancer" {{ request('user_type') == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                <option value="recrutador" {{ request('user_type') == 'recrutador' ? 'selected' : '' }}>Recrutador</option>
              </select>
          </div>
          <!--filtro por categoria-->
          <div class="col-12 col-sm-6 col-md-3">
            <label for="niche" class="form-label">Categoria</label>
            <select name="niche" id="niche" class="form-select">
              <option value="">Todos</option>
              <option value="Tecnologia" {{ request('niche') == 'Tecnologia' ? 'selected' : '' }}>Tecnologia</option>
              <option value="Design" {{ request('niche') == 'Design' ? 'selected' : '' }}>Design</option>
              <option value="Marketing" {{ request('niche') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
              <option value="Redação" {{ request('niche') == 'Redação' ? 'selected' : '' }}>Redação</option>
              <option value="Negócios" {{ request('niche') == 'Negócios' ? 'selected' : '' }}>Negócios</option>
              <option value="Educação" {{ request('niche') == 'Educação' ? 'selected' : '' }}>Educação</option>
              <option value="Serviços Gerais" {{ request('niche') == 'Serviços Gerais' ? 'selected' : '' }}>Serviços Gerais</option>
            </select>
          </div>
          <!--filtrar e desfazer-->
          <div class="col-md-2 col-sm-6 d-flex gap-2">
            <button type="submit" class="btn indigo w-100">Filtrar</button>
            <a href="{{ route('posts.userPosts') }}" class="btn btn-outline-secondary w-100">Desfazer</a>
          </div>
        </div>
      </div>
    </form>

    <!--abas para posts disponíveis e indisponíveis-->
    <ul class="nav nav-tabs" id="postTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="available-tab" data-bs-toggle="tab" data-bs-target="#available" type="button" role="tab" aria-controls="available" aria-selected="true" style="color: #663399;">
          Disponíveis
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="unavailable-tab" data-bs-toggle="tab" data-bs-target="#unavailable" type="button" role="tab" aria-controls="unavailable" aria-selected="false" style="color: #663399;">
          Indisponíveis
        </button>
      </li>
    </ul>

    <div class="tab-content mt-3" id="postTabsContent">
      <!--disponíveis-->
      <div class="tab-pane fade show active" id="available" role="tabpanel" aria-labelledby="available-tab">
        @if($availablePosts->isEmpty())
          <p class="d-flex justify-content-center text-muted"><i class="bi bi-view-list" style="font-size: 80px;"></i></p>
          <p class="d-flex justify-content-center text-muted">Nenhum post como disponível.</p>
        @else
        @foreach($availablePosts as $post)
          @php
              $highlight = request('highlight_post') == $post->id;
          @endphp
          <div class="card mb-3 sombrinha {{ $highlight ? 'highlighted' : '' }}">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }} - <small class="text-muted">{{ $post->created_at->format('d/m/Y H:i') }}</small></h5>
                <p class="card-text text-secondary mb-3">
                  {{ $post->description }}
                </p>
                <p class="text-muted mb-1"><strong>{{ $post->niche ?? 'Não informado' }} - {{ ucfirst($post->post_type) }}</strong></p>

                <!--prévia das imagens-->
                @if ($post->images && $post->images->count() > 0)
                  <div class="d-flex flex-wrap gap-2 mb-3">
                    @foreach ($post->images as $image)
                      <img 
                        src="{{ asset('storage/' . $image->path) }}" 
                        alt="Imagem do post {{ $post->title }}"
                        class="rounded border"
                        style="width: 100px; height: 100px; object-fit: cover;"
                      >
                    @endforeach
                  </div>
                @endif

                <div class="d-flex justify-content-end gap-2">
                <form action="{{ route('posts.toggleStatus', $post->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('PATCH')
                  <div class="form-check form-switch">
                    <input 
                      class="form-check-input" 
                      type="checkbox" 
                      id="switch-{{ $post->id }}" 
                      onchange="this.form.submit()" 
                      {{ $post->status ? 'checked' : '' }}>
                    <label class="form-check-label" for="switch-{{ $post->id }}">
                      {{ $post->status ? 'Disponível' : 'Indisponível' }}
                    </label>
                  </div>
                </form>

                  <a href="{{ route('posts.edit', $post->id) }}" class="edit">Editar</a>
                  <form id="deleteForm-{{ $post->id }}" 
                      action="{{ route('posts.destroy', $post->id) }}" 
                      method="POST" 
                      style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>

                  <button type="button" class="btn trash" onclick="confirmDelete({{ $post->id }})">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>

      <!--indisponíveis-->
      <div class="tab-pane fade" id="unavailable" role="tabpanel" aria-labelledby="unavailable-tab">
        @if($unavailablePosts->isEmpty())
          <p class="d-flex justify-content-center text-muted"><i class="bi bi-view-list" style="font-size: 80px;"></i></p>
          <p class="d-flex justify-content-center text-muted">Nenhum post como indisponível.</p>
        @else
          @foreach($unavailablePosts as $post)
            <div class="card mb-3 sombrinha">
              <div class="card-body">
                <h5 class="card-title">{{ $post->title }} - <small class="text-muted">{{ $post->created_at->format('d/m/Y H:i') }}</small></h5>
                <p class="card-text text-secondary mb-3">
                    {{ $post->description }}
                </p>
                <p class="text-muted mb-1"><strong>{{ $post->niche ?? 'Não informado' }} - {{ ucfirst($post->post_type) }}</strong></p>

                <!--prévia das imagens-->
                @if ($post->images && $post->images->count() > 0)
                  <div class="d-flex flex-wrap gap-2 mb-3">
                    @foreach ($post->images as $image)
                      <img 
                        src="{{ asset('storage/' . $image->path) }}" 
                        alt="Imagem do post {{ $post->title }}"
                        class="rounded border"
                        style="width: 100px; height: 100px; object-fit: cover;"
                      >
                    @endforeach
                  </div>
                @endif

                <div class="d-flex justify-content-end gap-2">
                <form action="{{ route('posts.toggleStatus', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <div class="form-check form-switch">
                      <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="switch-{{ $post->id }}" 
                        onchange="this.form.submit()" 
                        {{ $post->status ? 'checked' : '' }}>
                      <label class="form-check-label" for="switch-{{ $post->id }}">
                        {{ $post->status ? 'Disponível' : 'Indisponível' }}
                      </label>
                    </div>
                  </form>

                  <a href="{{ route('posts.edit', $post->id) }}" class="edit">Editar</a>
                  <form id="deleteForm-{{ $post->id }}" 
                      action="{{ route('posts.destroy', $post->id) }}" 
                      method="POST" 
                      style="display: none;">
                    @csrf
                    @method('DELETE')
                  </form>

                  <button type="button" class="btn trash" onclick="confirmDelete({{ $post->id }})">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
      {{ $posts->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
    </div>


    <!-- modal de confirmação de exclusão -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modalDelete">
          <p> Tem certeza que deseja excluir o post?</p>
          <div class="d-flex justify-content-center gap-3">
            <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Sim, excluir</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- botão para criação de post -->
<a href="{{ route('posts.create') }}" 
   class="btn indigo btn-lg rounded position-fixed sombra2"
   style="bottom: 30px; right: 30px; z-index: 999;">
   Novo Post
</a>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const highlighted = document.querySelector('#available .highlighted');
  if (highlighted) {
    highlighted.scrollIntoView({ behavior: 'smooth', block: 'center' });
    highlighted.classList.add('highlight-animation');
    setTimeout(() => {
      highlighted.classList.remove('highlight-animation');
    }, 5000);
  }
});
</script>
@endsection
