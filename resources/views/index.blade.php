<!DOCTYPE html>
<html lang="" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>
<body class="bg-warning vh-100 vw-100">
  <div class="h-100 w-100 position-absolute d-flex justify-content-center align-items-center">
    <div class="p-4 w-50 w-sm-100 bg-light">
      <div>
        <h1>Login</h1>
      </div>
      <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Nunca compartilhe seu e-mail com outra pessoa.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Manter login</label>
        </div>
        <div class="d-flex text-dark">
          <button type="submit" class="btn btn-info">Entrar</button>
        </div>
        <br>
        <div class="d-flex ">
          <a href="cadastro.html">Cadastre-se</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
