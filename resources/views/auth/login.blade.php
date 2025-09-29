<!DOCTYPE html>
<html lang="" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href="{{ asset('build/assets/app.4925d981.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/logo_pequena.png') }}" type="image/x-icon">
  <title>WorkUp - Login</title>
</head>
<body class="back vh-100 vw-100">
  <div class="h-100 w-100 position-absolute d-flex justify-content-center align-items-center">
    <div class="p-4 w-50 w-sm-100 bg-light rounded sombra">
      <div class="text-center mb-4">
        <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="img-fluid" style="max-height:7.5rem;">
        <h5 style="color: #663399;">Login</h5>
      </div>
      <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <div id="emailHelp" class="form-text">Nunca compartilhe seu e-mail com outra pessoa.</div>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3 form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
              {{ __('Lembrar de mim') }}
          </label>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn indigo">Entrar</button>
        </div>
        <br>
        <div class="d-flex justify-content-center">
          <a href="{{route('register')}}">Cadastre-se</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
