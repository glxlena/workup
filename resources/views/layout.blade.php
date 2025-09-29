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
          <a class="nav-link" aria-current="page" href=""><i class="bi bi-bell fs-4" style="color: #663399;"></i></a>
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
              <a class="dropdown-item" href="{{ route('user.show', Auth::user()->id) }}"><i class="bi bi-person-gear" style="color: #663399;"></i> Perfil</a>
              <a class="dropdown-item" href="{{ route('posts.userPosts') }}"><i class="bi bi-list-stars" style="color: #663399;"></i> Posts</a>
              <a class="dropdown-item" href="{{ route('favorites.index') }}"><i class="bi bi-heart" style="color: #663399;"></i> Favoritos</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); openLogoutModal();"> <i class="bi bi-box-arrow-right" style="color:red;"></i>
                {{ __('Sair') }}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    
  <!-- modal de confirmação de saida -->
  <div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-labelledby="logoutConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modalDelete p-4 text-center">
        <p class="mb-4 fs-5">Tem certeza que deseja sair?</p>
        <div class="d-flex justify-content-center gap-3">
          <button type="button" class="btn btn-danger" id="confirmLogoutBtn">Sim, quero sair</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não, quero ficar</button>
        </div>
      </div>
    </div>
  </div>

  <!--script para sair ao clicar em sim-->
  <script>
    function openLogoutModal() {
      const modal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'));
      modal.show();
    }
    document.getElementById('confirmLogoutBtn').addEventListener('click', function () {
      document.getElementById('logout-form').submit();
    });
  </script>

  </body>
</html>
