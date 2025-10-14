<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="{{ asset('build/assets/app.4925d981.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="icon" href="{{ asset('images/logo_pequena.png') }}" type="image/x-icon">
  <title>WorkUp - Cadastro</title>
</head>
<body class="back min-vh-100">
  <div class="d-flex h-100 m-4 position-absolute justify-content-center align-items-center">
    <div class="p-4 w-75 bg-light rounded sombra">
    <br>
      <h1 style="color: #663399" class="d-flex justify-content-center">Faça o seu Cadastro!</h1>
      <br>
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-md-6">
          <label for="name" class="form-label">Nome Completo</label>
          <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" required>
          @error('name') <div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6">
          <label for="birth_date" class="form-label">Data de Nascimento</label>
          <input name="birth_date" type="date" class="form-control" id="birth_date" value="{{ old('birth_date') }}" required>
          @error('birth_date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
          <label for="person_type" class="form-label">Tipo de Pessoa</label>
          <select name="person_type" id="person_type" class="form-select" required>
            <option value="">Selecione...</option>
            <option value="física" {{ old('person_type') == 'física' ? 'selected' : '' }}>Pessoa Física</option>
            <option value="jurídica" {{ old('person_type') == 'jurídica' ? 'selected' : '' }}>Pessoa Jurídica</option>
          </select>
          @error('person_type') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 d-none" id="cpf_div">
          <label for="cpf" class="form-label">CPF</label>
          <input name="cpf" type="text" class="form-control" id="cpf" value="{{ old('cpf') }}" maxlength="14" placeholder="000.000.000-00">
          @error('cpf') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 d-none" id="cnpj_div">
          <label for="cnpj" class="form-label">CNPJ</label>
          <input name="cnpj" type="text" class="form-control" id="cnpj" value="{{ old('cnpj') }}" maxlength="18" placeholder="00.000.000/0000-00">
          @error('cnpj') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" required>
          @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
          <label for="phone" class="form-label">WhatsApp</label>
          <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}" required placeholder="(99) 99999-9999">
          @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
          <label for="state" class="form-label">Estado</label>
          <select name="state" id="state" class="form-select" required>
            <option value="">Selecione o estado</option>
          </select>
          @error('state') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6">
          <label for="city" class="form-label">Cidade</label>
          <select name="city" id="city" class="form-select" required>
            <option value="">Selecione a cidade</option>
          </select>
          @error('city') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        
        <div class="col-md-6">
          <label for="password" class="form-label">Senha</label>
          <input name="password" type="password" class="form-control" id="password" required>
          
          <small class="form-text text-muted">
              A senha precisa ter:
              <ul>
                  <li>No mínimo 8 caracteres</li>
                  <li>Uma letra maiúscula</li>
                  <li>Um número</li>
                  <li>Um caractere especial</li>
              </ul>
          </small>

          @error('password') 
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
        </div>
        <div class="col-12 d-flex justify-content-center mt-3">
          <button type="submit" class="btn indigo">Enviar</button>
        </div>
        <div class="col-12 d-flex justify-content-center mt-2">
          <a href="{{ route('login') }}">Voltar</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

<!--scripts cpf/cnpj e API do IBGE para estados e cidades-->
<!--scripts para formatação de telefone, cpf e cnpj-->
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

      if (originalValue.length === 11) {
        maskToApply = masks[1];
      } 
      else if (originalValue.length === 10) {
        maskToApply = masks[0];
      } 
      else if (originalValue.length > 11) {
         maskToApply = masks[1];
      }

      VMasker(phoneInput).maskPattern(maskToApply);
      }

    phoneInput.addEventListener('input', phoneMask);
    window.addEventListener('load', phoneMask);

    function toggleCpfCnpj() {
      if (personTypeSelect.value === 'física') {
        cpfDiv.classList.remove('d-none');
        cpfInput.setAttribute('required', 'required');
        cnpjDiv.classList.add('d-none');
        cnpjInput.removeAttribute('required');
        cnpjInput.value = '';
      } else if (personTypeSelect.value === 'jurídica') {
        cnpjDiv.classList.remove('d-none');
        cnpjInput.setAttribute('required', 'required');
        cpfDiv.classList.add('d-none');
        cpfInput.removeAttribute('required');
        cpfInput.value = '';
      } else {
        cpfDiv.classList.add('d-none');
        cpfInput.removeAttribute('required');
        cpfInput.value = '';
        cnpjDiv.classList.add('d-none');
        cnpjInput.removeAttribute('required');
        cnpjInput.value = '';
      }
    }

    personTypeSelect.addEventListener('change', toggleCpfCnpj);
    window.addEventListener('load', toggleCpfCnpj);

    const form = document.querySelector('form');
    form.addEventListener('submit', () => {
      let cleanPhone = phoneInput.value.replace(/\D/g, ''); 
      if (!cleanPhone.startsWith('55')) {
          cleanPhone = '55' + cleanPhone;
      }
      phoneInput.value = cleanPhone;
      if (cpfInput.value) {
        cpfInput.value = cpfInput.value.replace(/\D/g, '');
      }
      if (cnpjInput.value) {
        cnpjInput.value = cnpjInput.value.replace(/\D/g, '');
      }
    });

    //código da API do IBGE
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
        })
      });

      const oldState = "{{ old('state') }}";
      const oldCity = "{{ old('city') }}";
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
</body>
</html>
