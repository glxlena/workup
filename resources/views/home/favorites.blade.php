@extends('layout')
@section('title', 'WorkUP - Meus Favoritos')
@section('base')
<br>
<div class="d-flex w-100 position-absolute justify-content-center align-items-start">
    <div class="p-4 w-100 m-4 bg-light rounded sombra">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if(request('unfavorited'))
            <div id="deleteAlert" class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between gap-3" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-x-circle-fill fs-5"></i>
                    <div>Favorito removido com sucesso!</div>
                </div>
                <form method="POST" action="{{ route('favorites.undo') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ request('unfavorited') }}" />
                    <button type="submit" class="btn btn-danger">Desfazer</button>
                </form>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="d-flex align-items-center">
                                        @if($post->user && $post->user->photo)
                                            <img src="{{ asset('storage/' . $post->user->photo) }}" 
                                                alt="Foto de {{ $post->user->name }}" 
                                                class="rounded-circle me-2" 
                                                style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <i class="bi bi-person-circle fs-3 me-2"></i>
                                        @endif
                                        <a href="{{ route('user.show', $post->user->id) }}" 
                                           class="fw-semibold text-decoration-none text-dark">
                                            {{ $post->user->name ?? 'Desconhecido' }}
                                        </a>
                                    </div>
                                    <small class="text-muted">
                                        {{ $post->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>

                                <h5 class="card-title fw-bold text-dark mb-2">{{ $post->title }}</h5>
                                <p class="card-text text-secondary mb-3">
                                    {!! nl2br(e(\Illuminate\Support\Str::limit($post->description, 20, '...'))) !!}
                                </p>
                                <p class="text-muted mb-3"><strong>{{ $post->niche ?? 'Não informado' }} - {{ ucfirst($post->post_type) }}</strong></p>
                               
                                <div class="mt-auto">
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
                                       data-user-photo="{{ $post->user->photo ? asset('storage/' . $post->user->photo) : '' }}"
                                       data-profile-url="{{ route('user.show', $post->user->id) }}"
                                       data-auth-id="{{ auth()->id() }}"
                                       data-is-favorited="{{ $post->is_favorited ? 1 : 0 }}"
                                       data-created-at="{{ $post->created_at }}"
                                       data-images='@json($post->images->map(fn($img) => asset("storage/" . $img->path)))'
                                       data-contact-url="{{ route('messages.contact', $post->user->id) }}">
                                        Ver mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="d-flex justify-content-center text-muted"><i class="bi bi-heartbreak" style="font-size: 80px;"></i></p>
                    <p class="d-flex justify-content-center text-muted">Você não possui nenhum post favoritado até agora.</p>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $posts->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!--modal de post favoritado -->
<div class="modal fade" id="postModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div id="modalUserPhotoContainer" class="me-2">
                        <i class="bi bi-person-circle fs-3"></i>
                    </div>
                    <div>
                        <a href="#" id="modalUserProfile" class="fw-bold text-dark text-decoration-none"></a> <small id="modalCreatedAt" class="text-muted"></small><br>
                        <p class="text-muted mb-1"><strong><span id="modalPostNiche"></span> - <span id="modalPostType"></span></strong></p>
                    </div>
                </div>
                <button type="button" id="favoriteBtn" class="btn btn-link text-danger fs-4 p-0 m-0" style="display: none;"></button>
            </div>
            <div class="modal-body">
                <h4 id="postModalLabel" class="fw-bold mb-3"></h4>
                <p id="modalPostDescription" class="text-dark" style="text-align: justify;"></p>
                <div id="modalPostImages" class="d-flex flex-wrap gap-2 mt-3 justify-content-center"></div>
                <div class="mt-3 d-flex justify-content-center">
                    <p class="text-muted mb-1"><strong><span id="modalPostNiche"></span> - <span id="modalPostType"></span></strong></p>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <p class="text-muted mb-0"><span id="modalPostCity"></span> - <span id="modalPostState"></span></p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="modalActionBtn" class="btn indigo"></button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- modal de imagem do post -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-light border-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img id="previewImage" src="" class="img-fluid rounded" style="max-height: 80vh; object-fit: contain;">
            </div>
        </div>
    </div>
</div>


<script>
    //modal de imagens
    document.addEventListener('DOMContentLoaded', function () {
    const postModal = document.getElementById('postModal');
    const modalPostImages = document.getElementById('modalPostImages');
    const imagePreviewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    const previewImage = document.getElementById('previewImage');

    postModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        if (!button) return;

        const imagesData = JSON.parse(button.getAttribute('data-images') || '[]');
        modalPostImages.innerHTML = '';

        if (imagesData.length > 0) {
            imagesData.forEach(src => {
                const img = document.createElement('img');
                img.src = src;
                img.classList.add('rounded', 'border');
                img.style.width = '150px';
                img.style.height = '150px';
                img.style.objectFit = 'cover';
                img.style.cursor = 'pointer';
                img.title = "Clique para ampliar";

                // ao clicar, abre o modal grande
                img.addEventListener('click', () => {
                    previewImage.src = src;
                    imagePreviewModal.show();
                });

                modalPostImages.appendChild(img);
            });
        }
    });
});
</script>
@endsection