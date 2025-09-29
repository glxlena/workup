@extends('layout')
@section('title', 'WorkUP - Feed')
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
                                        data-is-favorited="{{ $post->is_favorited ? 1 : 0 }}">
                                        Ver mais
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="phrases">Não há nenhuma postagem até agora :(</p>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<a href="{{ route('posts.create') }}" 
    class="btn indigo btn-lg rounded position-fixed sombra2"
    style="bottom: 30px; right: 30px; z-index: 999;">
    Novo Post
</a>

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


<script>
    async function loadStates() {
        // ... (Seu código do IBGE) ...
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

        const oldState = "{{ old('state') ?? request('state') }}"; // MANTIDO PARA RE-SELEÇÃO DE FILTROS
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
</script>
@endsection