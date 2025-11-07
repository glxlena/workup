<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/logo_pequena.png') }}" type="image/x-icon">
  <title>WorkUP - Sua rede de freelancers começa aqui!</title>
</head>

<body class="back">
  <nav class="navbar navbar-expand-lg navbar-light navbar-workup fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logoOficial.png') }}" alt="WorkUp Logo">
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <form method="POST" action="{{route('login')}}" class="login-form-inline mt-3 mt-lg-0">
          @csrf
          <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}" autocomplete="email">
          <input type="password" name="password" placeholder="Senha" required autocomplete="current-password">
          <button type="submit" class="btn btn-entrar">Entrar</button>
          <a href="{{route('register')}}" class="btn btn-cadastro">Cadastre-se</a>
        </form>
      </div>
    </div>
  </nav>

  <section class="hero-workup">
    <div class="container text-center">
      <h1>Sua rede de freelancers começa aqui!</h1>
      <p>Conecte-se com os melhores profissionais ou divulgue seus serviços</p>
      <a href="{{route('register')}}" class="btn btn-cta-large">Comece Agora Gratuitamente</a>
    </div>
  </section>

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

  <section class="features-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 style="color: #663399; font-weight: 700; font-size: 2.3rem;">Como funciona?</h2>
        <p class="text-muted">Simples, rápido e eficiente</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="feature-card text-center">
            <div class="feature-icon"><i class="bi bi-search"></i></div>
            <h5>Busque Talentos</h5>
            <p>Encontre freelancers qualificados nas categorias que você precisa</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card text-center">
            <div class="feature-icon"><i class="bi bi-megaphone"></i></div>
            <h5>Divulgue Serviços</h5>
            <p>Publique seus serviços e seja encontrado por clientes</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card text-center">
            <div class="feature-icon"><i class="bi bi-chat-dots"></i></div>
            <h5>Entre em Contato</h5>
            <p>Conecte-se direto via email ou WhatsApp</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card text-center">
            <div class="feature-icon"><i class="bi bi-star"></i></div>
            <h5>Avalie Perfis</h5>
            <p>Sistema de avaliações para garantir qualidade</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="categories-section">
    <div class="container">
      <div class="text-center mb-4">
        <h3 style="color: #663399; font-weight: 700;">Categorias Disponíveis</h3>
      </div>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <span class="category-badge"><i class="bi bi-laptop"></i> Tecnologia</span>
        <span class="category-badge"><i class="bi bi-palette"></i> Design</span>
        <span class="category-badge"><i class="bi bi-megaphone"></i> Marketing</span>
        <span class="category-badge"><i class="bi bi-pencil"></i> Redação</span>
        <span class="category-badge"><i class="bi bi-briefcase"></i> Negócios</span>
        <span class="category-badge"><i class="bi bi-book"></i> Educação</span>
        <span class="category-badge"><i class="bi bi-tools"></i> Serviços Gerais</span>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="container">
      <h2>Pronto para começar?</h2>
      <a href="{{route('register')}}" class="btn-cta-large">Criar Conta Gratuita</a>
    </div>
  </section>

  <footer class="footer-workup">
    <div class="container">
      <p class="mb-0">&copy; 2025 WorkUP. Todos os direitos reservados.</p>
    </div>
  </footer>

  @if($errors->any())
  <div class="error-toast">
    <div class="toast show" role="alert">
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto"><i class="bi bi-exclamation-triangle-fill"></i> Erro no Login</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">
        @foreach($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    </div>
  </div>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>