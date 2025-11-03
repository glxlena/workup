<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="{{ asset('build/assets/scriptsWorkUP.js') }}"></script>
    <link href="{{ asset('build/assets/app.4925d981.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo_pequena.png') }}" type="image/x-icon">
    <title>@yield ('title')</title>
  </head>
  <body class="back vw-100 vh-100">
  <nav class="navbar navbar-expand-lg bg-light sombra">
    <div class="container-fluid position-relative">
      <a class="navbar-brand" href="{{route('home')}}"> 
        <img src="{{ asset('images/logoOficial.png') }}" alt="workup" class="img-fluid" style="height: 1.8em;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <div class="nav-item dropdown">
            <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell fs-4" style="color: #663399;"></i>
              @if(isset($unreadCount) && $unreadCount > 0)
                <span id="notif-dot" class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
              @endif
            </a>

            <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="notificationDropdown" style="width: 350px;">
              <!-- abas -->
              <ul class="nav nav-tabs" id="notifTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="true" style="color: #663399;">
                    Avaliações
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="favorites-tab" data-bs-toggle="tab" data-bs-target="#favorites" type="button" role="tab" aria-controls="favorites" aria-selected="false" style="color: #663399;">
                    Favoritos
                  </button>
                </li>
              </ul>

              <div class="tab-content mt-2">
              <!-- avaliações -->
              <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                @if(isset($reviewNotifications) && count($reviewNotifications) > 0)
                  <div class="notif-scroll" style="max-height: 360px; overflow-y: auto;">
                  @foreach($reviewNotifications as $review)
                    @php
                      $data = $review->data;
                    @endphp
                    <div class="alert alert-light border d-flex align-items-center justify-content-between gap-2 mb-2">
                      <a href="{{ route('notifications.read', $review->id) }}" class="text-decoration-none text-dark flex-grow-1 d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <div class="d-flex flex-column">
                          <div>
                            <strong>{{ $data['reviewer_name'] ?? 'Usuário' }}</strong> avaliou você com {{ $data['rating'] ?? '0' }} estrelas.
                          </div>
                          <small class="text-muted">
                            {{ diffForHumansPt($review->created_at) }}
                          </small>
                        </div>
                      </a>
                      <form method="POST" action="{{ route('notifications.destroy', $review->id) }}" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0" title="Excluir notificação">
                          <i class="bi bi-trash" style="color: red;"></i>
                        </button>
                      </form>
                    </div>
                  @endforeach
                  </div>
                @else
                  <div class="text-center text-muted">
                    <i class="bi bi-bell-slash fs-1"></i>
                    <p>Você não possui nenhuma notificação.</p>
                  </div>
                @endif
              </div>

              <!-- favoritos -->
              <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                @if(isset($favoriteNotifications) && count($favoriteNotifications) > 0)
                  <div class="notif-scroll" style="max-height: 360px; overflow-y: auto;">
                  @foreach($favoriteNotifications as $fav)
                    @php
                      $data = $fav->data;
                    @endphp
                    <div class="alert alert-light border d-flex align-items-center justify-content-between gap-2 mb-2">
                      <a href="{{ route('notifications.read', $fav->id) }}" class="text-decoration-none text-dark flex-grow-1 d-flex align-items-center gap-2">
                        <i class="bi bi-heart-fill text-danger"></i>
                        <div class="d-flex flex-column">
                          <div>
                            <strong>{{ $data['user_name'] ?? 'Usuário' }}</strong> favoritou seu post:
                            <em>{{ $data['post_title'] ?? 'Post' }}</em>
                          </div>
                          <small class="text-muted">
                            {{ diffForHumansPt($fav->created_at) }}
                          </small>
                        </div>
                      </a>
                      <form method="POST" action="{{ route('notifications.destroy', $fav->id) }}" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0" title="Excluir notificação">
                          <i class="bi bi-trash" style="color: red;"></i>
                        </button>
                      </form>
                    </div>
                  @endforeach
                  </div>
                @else
                  <div class="text-center text-muted">
                    <i class="bi bi-bell-slash fs-1"></i>
                    <p>Você não possui nenhuma notificação.</p>
                  </div>
                @endif
              </div>
              </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="d-flex flex-row-reverse navibar-nav">
        <div>
          @guest
            @if (Route::has('login'))
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
            @endif
          @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="bi bi-person-lines-fill" style="font-size: 30px; color: #663399;"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
              <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}"><i class="bi bi-person-gear" style="color: #663399;"></i> Meu Perfil</a>
              <a class="dropdown-item" href="{{ route('posts.userPosts') }}"><i class="bi bi-list-stars" style="color: #663399;"></i> Meus Posts</a>
              <a class="dropdown-item" href="{{ route('favorites.index') }}"><i class="bi bi-heart" style="color: #663399;"></i> Meus Favoritos</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); openLogoutModal();"> <i class="bi bi-box-arrow-right" style="color:red;"></i>
                {{ __(' Sair') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          @endguest
        </div>
      </div>
    </div>
  </nav>
    @yield ('base')
    
    <!-- modal de confirmação de saída -->
    <div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-labelledby="logoutConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modalDelete p-4 text-center">
        <p class="mb-4 fs-5">Tem certeza que deseja sair?</p>
        <div class="d-flex justify-content-center gap-3">
          <button type="button" class="btn btn-danger" id="confirmLogoutBtn">Sim, quero sair</button>
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Não, quero ficar</button>
        </div>
      </div>
    </div>
  </div>

  <!--script para sair ao clicar em sim-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
  <script>
    function openLogoutModal() {
      const modal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'));
      modal.show();
    }
    document.getElementById('confirmLogoutBtn').addEventListener('click', function () {
      document.getElementById('logout-form').submit();
    });
    
    // Impede o dropdown de fechar ao trocar de aba
    document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
      dropdown.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
    
    // Remove a bolinha vermelha ao abrir o dropdown e marca todas como lidas
    const notifDropdown = document.getElementById('notificationDropdown');
    notifDropdown.addEventListener('show.bs.dropdown', async function () {
      const dot = document.getElementById('notif-dot');
      if (dot) {
        dot.remove();
      }
      try {
        await fetch("{{ route('notifications.readAll') }}", {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          }
        });
      } catch (e) {
        // silenciosamente ignora erro de rede
      }
    });
  </script>

  </body>
</html>
