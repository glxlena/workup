@extends('layout')
@section('title', 'WorkUP - Meus Favoritos')
@section('base')
<br>
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light rounded">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <h2 class="text-center">Meus Favoritos</h2>
        <form method="GET" action="{{ route('favorites.index') }}">
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
          <div class="col-md-3 col-sm-6">
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
            <a href="{{ route('favorites.index') }}" class="btn btn-outline-secondary w-100">Desfazer</a>
          </div>
        </div>
      </div>
        </form>
        
        <br>
        
        <div class="container mt-4">
            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 sombrinha">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->description, 50, '...') }}</p>
                                <div class="mt-auto">
                                    <p class="text-muted mb-1"><strong>Categoria:</strong> {{ $post->niche ?? 'Não informado' }}</p>
                                    <p class="text-muted"><strong>{{ $post->user->name ?? 'Desconhecido' }} - {{ ucfirst($post->post_type) }}</strong></p>
                                    <p class="text-muted">{{ $post->user->city ?? 'Não informado' }} - {{ $post->user->state ?? 'Não informado' }}</p>
                                    <p class="text-muted"><small>Postado em {{ $post->created_at->format('d/m/Y H:i') }}</small></p>
                                    
                                    <a href="#"
                                        class="btn indigo mt-auto"
                                        data-bs-toggle="modal"
                                        data-bs-target="#postModal"
                                        data-id="{{ $post->id }}"
                                        data-title="{{ $post->title }}"
                                        data-description="{{ $post->description }}"
                                        data-type="{{ ucfirst($post->post_type) }}"
                                        data-niche="{{ $post->niche }}"
                                        data-city="{{ $post->user->city }}"
                                        data-state="{{ $post->user->state }}"
                                        data-user-id="{{ $post->user->id }}"
                                        data-user-name="{{ $post->user->name }}"
                                        data-profile-url="{{ route('user.show', $post->user->id) }}"
                                        data-auth-id="{{ auth()->id() }}"
                                        data-is-favorited="1"> 
                                        Ver mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="phrases">Você ainda não tem nenhum post favorito. Encontre seu primeiro serviço ou freelancer!</p>
                @endforelse
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="postModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h4 class="modal-title" id="postModalLabel"></h4>
                <button type="button" id="favoriteBtn" class="btn btn-link text-danger fs-4 p-0 m-0" style="display: none;"></button>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <h5 id="modalPostDescription"></h5>
                        <p class="text-muted"><strong>Categoria:</strong> <span id="modalPostNiche"></span></p>
                        <p class="text-muted"><strong><span id="modalPostType"></span> / <span id="modalPostCity"></span> - <span id="modalPostState"></span></strong></p>
                    </div>
                </div>
                <br>
                <p class="d-flex justify-content-center"><a href="#" id="modalUserProfile"></a></p>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="modalActionBtn" class="btn indigo"></button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endsection