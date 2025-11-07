<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link rel="icon" href="{{ asset('images/logo_pequena.png') }}" type="image/x-icon">
  <title>WorkUP - Cadastro</title>
</head>
<body class="back">
  
  <nav class="navbar navbar-expand-lg navbar-light navbar-workup fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('login') }}">
        <img src="{{ asset('images/logoOficial.png') }}" alt="WorkUp Logo">
      </a>
      <div class="d-flex">
        <a href="{{ route('login') }}" class="btn btn-entrar me-2">Entrar</a>
        <a href="{{ route('register') }}" class="btn btn-cadastro">Cadastre-se</a>
      </div>
    </div>
  </nav>

  <section class="hero-workup" style="padding: 100px 0 60px; text-align: center;">
    <div class="container">
      <h1 style="font-size: 2.5rem;">Crie sua conta e comece agora!</h1>
      <p>Junte-se à comunidade WorkUP e conecte-se com os melhores profissionais</p>
    </div>
  </section>

  <section class="py-5">
    <div class="container d-flex justify-content-center">
      <div class="bg-white p-5 rounded sombra w-100" style="max-width: 900px;">
        <h2 class="text-center mb-4" style="color: #663399; font-weight: 700;">Cadastro</h2>
        
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="row g-3">
          @csrf

          <div class="col-md-6">
            <label for="name" class="form-label">Nome Completo</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" required>
            @error('name') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="birth_date" class="form-label">Data de Nascimento</label>
            <input name="birth_date" type="date" class="form-control" id="birth_date" value="{{ old('birth_date') }}" required>
            @error('birth_date') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="person_type" class="form-label">Tipo de Pessoa</label>
            <select name="person_type" id="person_type" class="form-select" required>
              <option value="">Selecione...</option>
              <option value="física" {{ old('person_type') == 'física' ? 'selected' : '' }}>Pessoa Física</option>
              <option value="jurídica" {{ old('person_type') == 'jurídica' ? 'selected' : '' }}>Pessoa Jurídica</option>
            </select>
            @error('person_type') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6 d-none" id="cpf_div">
            <label for="cpf" class="form-label">CPF</label>
            <input name="cpf" type="text" class="form-control" id="cpf" value="{{ old('cpf') }}" maxlength="14" placeholder="000.000.000-00">
            @error('cpf') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6 d-none" id="cnpj_div">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input name="cnpj" type="text" class="form-control" id="cnpj" value="{{ old('cnpj') }}" maxlength="18" placeholder="00.000.000/0000-00">
            @error('cnpj') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" required>
            @error('email') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="phone" class="form-label">WhatsApp</label>
            <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}" required placeholder="(99) 99999-9999">
            @error('phone') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="state" class="form-label">Estado</label>
            <select name="state" id="state" class="form-select" required>
              <option value="">Selecione o estado</option>
            </select>
            @error('state') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="city" class="form-label">Cidade</label>
            <select name="city" id="city" class="form-select" required>
              <option value="">Selecione a cidade</option>
            </select>
            @error('city') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="password" class="form-label">Senha</label>
            <input name="password" type="password" class="form-control" id="password" required>
            <small class="text-muted">
              Deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, um número e um caractere especial.
            </small>
            @error('password') <div class="text-danger small">{{ $message }}</div>@enderror
          </div>

          <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
          </div>

          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-cadastro px-5 py-2">Cadastrar</button>
          </div>

          <div class="col-12 text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none" style="color: #663399;">Já possui uma conta? Faça login</a>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer-workup">
    <div class="container">
      <p class="mb-0">&copy; 2025 WorkUP. Todos os direitos reservados.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

  <script>
    const personTypeSelect = document.getElementById('person_type');
    const cpfInput = document.getElementById('cpf');
    const cpfDiv = document.getElementById('cpf_div');
    const cnpjInput = document.getElementById('cnpj');
    const cnpjDiv = document.getElementById('cnpj_div');
    const phoneInput = document.getElementById('phone');

    VMasker(cpfInput).maskPattern('999.999.999-99');
    VMasker(cnpjInput).maskPattern('99.999.999/9999-99');

    function phoneMask() {
      const originalValue = phoneInput.value.replace(/\D/g, '');
      const masks = ['(99) 9999-99999', '(99) 99999-9999'];
      let maskToApply = '(99) 9999-99999';
      if (originalValue.length >= 11) maskToApply = masks[1];
      VMasker(phoneInput).maskPattern(maskToApply);
    }
    phoneInput.addEventListener('input', phoneMask);
    window.addEventListener('load', phoneMask);

    function toggleCpfCnpj() {
      if (personTypeSelect.value === 'física') {
        cpfDiv.classList.remove('d-none');
        cpfInput.required = true;
        cnpjDiv.classList.add('d-none');
        cnpjInput.required = false;
        cnpjInput.value = '';
      } else if (personTypeSelect.value === 'jurídica') {
        cnpjDiv.classList.remove('d-none');
        cnpjInput.required = true;
        cpfDiv.classList.add('d-none');
        cpfInput.required = false;
        cpfInput.value = '';
      } else {
        cpfDiv.classList.add('d-none');
        cnpjDiv.classList.add('d-none');
      }
    }
    personTypeSelect.addEventListener('change', toggleCpfCnpj);
    window.addEventListener('load', toggleCpfCnpj);

    // IBGE API
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
    }
    loadStates();
  </script>
</body>
</html>
