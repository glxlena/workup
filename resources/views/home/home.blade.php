@extends('layout')
@section('title', 'WorkUP - Feed')
@section('base')
<br>
<div class="home-container">
    <div class="home-content-box sombra">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif
        <div id="marketingCarousel" class="carousel slide mb-4 rounded overflow-hidden" data-bs-ride="carousel">
            <section class="carousel-section">
                <div class="container">
                <div id="phrasesCarousel" class="carousel slide carousel-workup" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#phrasesCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#phrasesCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#phrasesCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#phrasesCarousel" data-bs-slide-to="3"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000" style="background-color: #663399;">
                        <div class="d-flex align-items-center h-100 p-4">
                        <h3 class="text-white col-9 m-0">Encontre o freelancer certo para o seu projeto em poucos cliques!</h3>
                        <div class="col-3 text-end">
                            <img src="{{ asset('images/logo_branca_pequena.png') }}" alt="Logo" style="height: 60px;">
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000" style="background-color: white;">
                        <div class="d-flex align-items-center h-100 p-4">
                        <h3 class="col-9 m-0" style="color: #663399;">Divulgue serviços e conquiste novos clientes sem complicação!</h3>
                        <div class="col-3 text-end">
                            <img src="{{ asset('images/logo_pequena.png') }}" alt="Logo" style="height: 70px;">
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000" style="background-color: #663399;">
                        <div class="d-flex align-items-center h-100 p-4">
                        <h3 class="text-white col-9 m-0">Serviços organizados, contratos simples e agilidade na contratação!</h3>
                        <div class="col-3 text-end">
                            <img src="{{ asset('images/logo_branca_pequena.png') }}" alt="Logo" style="height: 60px;">
                        </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000" style="background-color: white;">
                        <div class="d-flex align-items-center h-100 p-4">
                        <h3 class="col-9 m-0" style="color: #663399;">Sua rede de freelancers começa aqui!</h3>
                        <div class="col-3 text-end">
                            <img src="{{ asset('images/logo_pequena.png') }}" alt="Logo" style="height: 70px;">
                        </div>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#phrasesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#phrasesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
                </div>
            </section>

            <button class="carousel-control-prev" type="button" data-bs-target="#marketingCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#marketingCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- filtros -->
        <form method="GET" action="{{ route('home') }}">
            <div class="row g-3 mb-4 justify-content-center align-items-center">
                <div class="col-md-3 col-sm-6">
                    <label for="state" class="form-label">Busque por Estado e Cidade</label>
                    <select name="state" id="state" class="form-select">
                        <option value="">Selecione o estado</option>
                    </select>
                    @error('state') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="city" class="form-label"></label>
                    <select name="city" id="city" class="form-select">
                        <option value="">Selecione a cidade</option>
                    </select>
                    @error('city') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-3 col-sm-6">
                    <label for="user_type" class="form-label">Postado por:</label>
                    <select name="user_type" id="user_type" class="form-select">
                        <option value="">Todos</option>
                        <option value="freelancer" {{ request('user_type') == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                        <option value="recrutador" {{ request('user_type') == 'recrutador' ? 'selected' : '' }}>Recrutador</option>
                    </select>
                </div>
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
                <div class="col-md-2 col-sm-6 d-flex gap-2">
                    <button type="submit" class="btn indigo w-100">Filtrar</button>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100">Desfazer</a>
                </div>
            </div>
        </form>
        <br>

        <!-- posts -->
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
                <p class="d-flex justify-content-center text-muted"><i class="bi bi-view-list" style="font-size: 80px;"></i></p>
                <p class="phrases text-center">Não há nenhuma postagem até agora.</p>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $posts->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- novo post -->
<a href="{{ route('posts.create') }}" 
   class="btn indigo btn-lg rounded position-fixed sombra2"
   style="bottom: 30px; right: 30px; z-index: 999;">
   Novo Post
</a>

<!-- modal de post -->
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
    async function loadStates() {
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');
        const response = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        const states = await response.json();
        states.sort((a, b) => a.nome.localeCompare(b.nome));
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state.sigla;
            option.textContent = state.nome;
            stateSelect.appendChild(option);
        });

        stateSelect.addEventListener('change', async () => {
            citySelect.innerHTML = '<option value="">Selecione a cidade</option>';
            if (!stateSelect.value) return;

            const cityResponse = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateSelect.value}/municipios`);
            const cities = await cityResponse.json();

            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.nome;
                option.textContent = city.nome;
                citySelect.appendChild(option);
            });
        });

        const oldState = "{{ old('state') ?? request('state') }}";
        const oldCity = "{{ old('city') ?? request('city') }}";
        if (oldState) {
            stateSelect.value = oldState;
            const cityResponse = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${oldState}/municipios`);
            const cities = await cityResponse.json();
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.nome;
                option.textContent = city.nome;
                citySelect.appendChild(option);
            });
            if (oldCity) citySelect.value = oldCity;
        }
    }

    loadStates();

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
