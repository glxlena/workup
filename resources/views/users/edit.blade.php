@extends('layout')
@section('title', 'Editar ' . $user->name)
@section('base')
<br>

<div class="container">
  @if(session('photo_deleted'))
    <div id="photoDeleteAlert" class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between gap-3" role="alert">
      <div class="d-flex align-items-center gap-2">
        <i class="bi bi-x-circle-fill fs-5"></i>
        <div>{{ session('photo_deleted') }}</div>
      </div>
      <form method="POST" action="{{ route('user.undoRemovePhoto', $user->id) }}">
        @csrf
        <button type="submit" class="btn btn-danger">Desfazer</button>
      </form>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif


  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
      <div>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <!--coluna esquerda-->
      <div class="col-12 col-md-3 border rounded p-4 bg-light d-flex flex-column align-items-center sombra mb-3 mb-md-0">
        <!--foto ou icone-->
        <div class="position-relative d-inline-block">
          @if ($user->photo)
            <img id="photoPreview" src="{{ asset('storage/' . $user->photo) }}"
            alt="Foto de {{ $user->name }}"
            class="rounded-circle mb-3"
            width="250" height="250">
           @else
            <i id="defaultIcon" class="bi bi-person-circle mb-3" style="font-size: 200px;"></i>
            <img id="photoPreview" class="rounded-circle mb-3 d-none" width="250" height="250">
          @endif
          <div class="dropdown position-absolute top-0 end-0">
              <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="photoDropdown" data-bs-toggle="dropdown" aria-expanded="false"></button>
              <ul class="dropdown-menu" aria-labelledby="photoDropdown">
                <li>
                  <button type="button" class="dropdown-item" onclick="document.getElementById('photoInput').click()">
                    Alterar foto
                  </button>
                </li>
                <!-- se o usuário já tiver uma foto, aparece a opção de excluir -->
                @if ($user->photo)
                <li>
                <button type="button" class="dropdown-item text-danger" onclick="openPhotoDeleteModal()">Excluir foto</button>
                </li>
                @endif
              </ul>
          </div>
          <input type="file" name="photo" id="photoInput" class="d-none" accept="image/*">
        </div>
        <div class="d-flex align-items-center gap-2">
          <h3 class="mb-2 text-center" id="displayName">{{ $user->name }}</h3>
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleNameEdit()">
            <i class="bi bi-pencil"></i>
          </button>
        </div>
        <div id="nameEditContainer" class="w-100 d-none">
          <input type="text" name="name" class="form-control mt-2" value="{{ $user->name }}">
        </div>
        <br>
        <button type="submit" class="btn btn-success w-100">Salvar Alterações</button>
        <br>
        <button type="button" class="btn btn-danger w-100" onclick="openDeleteAccountModal()">Excluir conta</button>
        <br>
        <a href="{{ route('user.show', Auth::user()->id) }}" class="btn btn-outline-secondary w-100 mt-2">Voltar</a>
      </div>

      <!--coluna direita-->
      <div class="col-12 col-md-9 d-flex justify-content-center">
        <div class="p-4 bg-light rounded sombra" style="height: 650px; overflow-y: auto;">
          <h2 class="text-center">Editar Dados</h2>

          <div class="row mt-3 g-3">
            <div class="col-md-6">
              <label for="birth_date" class="form-label">Data de Nascimento</label>
              <input name="birth_date" type="date" class="form-control" id="birth_date" value="{{ $user->birth_date }}">
            </div>

            <div class="col-md-6">
              <label for="person_type" class="form-label">Tipo de Pessoa</label>
              <select name="person_type" id="person_type" class="form-select">
                <option value="">Selecione...</option>
                <option value="física" {{ $user->person_type == 'física' ? 'selected' : '' }}>Pessoa Física</option>
                <option value="jurídica" {{ $user->person_type == 'jurídica' ? 'selected' : '' }}>Pessoa Jurídica</option>
              </select>
            </div>

            <div class="col-md-6" id="cpf_div" style="{{ $user->person_type == 'física' ? '' : 'display:none;' }}">
              <label for="cpf" class="form-label">CPF</label>
              <input name="cpf" type="text" class="form-control" id="cpf" value="{{ $user->cpf }}">
            </div>

            <div class="col-md-6" id="cnpj_div" style="{{ $user->person_type == 'jurídica' ? '' : 'display:none;' }}">
              <label for="cnpj" class="form-label">CNPJ</label>
              <input name="cnpj" type="text" class="form-control" id="cnpj" value="{{ $user->cnpj }}">
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
            </div>

            <div class="col-md-6">
              <label for="phone" class="form-label">Telefone</label>
              <input name="phone" type="text" class="form-control" id="phone" value="{{ $user->phone }}">
            </div>

            <div class="col-md-6">
              <label for="state" class="form-label">Estado</label>
              <select name="state" id="state" class="form-select">
                <option value="{{ $user->state }}"></option>
              </select>
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">Cidade</label>
              <select name="city" id="city" class="form-select">
                <option value="{{ $user->city }}"></option>
              </select>
            </div>


            <div class="col-md-6">
              <label for="password" class="form-label">Nova Senha:</label>
              <input name="password" type="password" class="form-control" id="password">
            </div>

            <div class="col-md-6">
              <label for="password_confirmation" class="form-label">Confirmar Senha</label>
              <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- form para excuir a foto do perfil -->
  @if ($user->photo)
  <form id="removePhotoForm" action="{{ route('user.removePhoto', $user->id) }}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
  </form>
  @endif

  <!--modal de confirmação de exclusão de foto-->
  <div class="modal fade" id="photoDeleteModal" tabindex="-1" aria-labelledby="photoDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modalDelete p-3">
        <p>Tem certeza que deseja excluir a foto de perfil?</p>
        <div class="d-flex justify-content-center gap-3">
          <button type="button" id="confirmPhotoDeleteBtn" class="btn btn-danger">Sim, excluir</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal de confirmação de exclusão de conta -->
  <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modalDelete p-3">
        <h5 class="mb-3">Confirme sua senha para excluir a conta</h5>
        <form id="deleteAccountForm" action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-flex flex-column gap-3">
          @csrf
          @method('DELETE')
          <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
          </div>
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-danger">Excluir conta</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

<script>
  const editPersonTypeSelect = document.getElementById('person_type');
  const editCpfInput = document.getElementById('cpf');
  const editCpfDiv = document.getElementById('cpf_div');
  const editCnpjInput = document.getElementById('cnpj');
  const editCnpjDiv = document.getElementById('cnpj_div');
  const editPhoneInput = document.getElementById('phone');

  //máscaras de CPF e CNPJ
  VMasker(editCpfInput).maskPattern('999.999.999-99');
  VMasker(editCnpjInput).maskPattern('99.999.999/9999-99');

  //máscara de telefone
  function phoneMaskEdit() {
    const originalValue = editPhoneInput.value.replace(/\D/g, '');
    const masks = ['(99) 9999-99999', '(99) 99999-9999'];
    let maskToApply = '(99) 9999-99999';

    if (originalValue.length === 11) {
      maskToApply = masks[1];
    } else if (originalValue.length === 10) {
      maskToApply = masks[0];
    } else if (originalValue.length > 11) {
      maskToApply = masks[1];
    }

    VMasker(editPhoneInput).maskPattern(maskToApply);
  }

  editPhoneInput.addEventListener('input', phoneMaskEdit);
  window.addEventListener('load', phoneMaskEdit);

  //alternar exibição de CPF/CNPJ
  function toggleCpfCnpjEdit() {
    if (editPersonTypeSelect.value === 'física') {
      editCpfDiv.style.display = '';
      editCnpjDiv.style.display = 'none';
      editCnpjInput.value = '';
    } else if (editPersonTypeSelect.value === 'jurídica') {
      editCnpjDiv.style.display = '';
      editCpfDiv.style.display = 'none';
      editCpfInput.value = '';
    } else {
      editCpfDiv.style.display = 'none';
      editCnpjDiv.style.display = 'none';
      editCpfInput.value = '';
      editCnpjInput.value = '';
    }
  }

  editPersonTypeSelect.addEventListener('change', toggleCpfCnpjEdit);
  window.addEventListener('load', toggleCpfCnpjEdit);
  const editForm = document.querySelector('form');
  editForm.addEventListener('submit', () => {
    let cleanPhone = editPhoneInput.value.replace(/\D/g, ''); 
    if (!cleanPhone.startsWith('55')) {
      cleanPhone = '55' + cleanPhone;
    }
    editPhoneInput.value = cleanPhone;

    if (editCpfInput.value) {
      editCpfInput.value = editCpfInput.value.replace(/\D/g, '');
    }
    if (editCnpjInput.value) {
      editCnpjInput.value = editCnpjInput.value.replace(/\D/g, '');
    }
  });

// IBGE
async function loadStates() {
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    // valores atuais do usuário vindos do backend
    const savedState = "{{ $user->state }}";
    const savedCity = "{{ $user->city }}";

    // buscar todos os estados
    const response = await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
    const states = await response.json();

    // ordenar por nome
    states.sort((a, b) => a.nome.localeCompare(b.nome));

    // preencher o select de estados
    stateSelect.innerHTML = '<option value="">Selecione o estado</option>';
    states.forEach(state => {
        const option = document.createElement('option');
        option.value = state.sigla;
        option.textContent = state.nome;

        // marcar o estado salvo como selecionado
        if (state.sigla === savedState) {
            option.selected = true;
        }

        stateSelect.appendChild(option);
    });

    // se já existir um estado salvo, carregar as cidades dele
    if (savedState) {
        const cityResponse = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${savedState}/municipios`);
        const cities = await cityResponse.json();

        citySelect.innerHTML = '<option value="">Selecione a cidade</option>';
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city.nome;
            option.textContent = city.nome;

            // marcar a cidade salva como selecionada
            if (city.nome === savedCity) {
                option.selected = true;
            }

            citySelect.appendChild(option);
        });
    }
    stateSelect.addEventListener('change', async () => {
        citySelect.innerHTML = '<option value="">Selecione a cidade</option>';
        const selectedState = stateSelect.value;

        if (!selectedState) return;

        const cityResponse = await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${selectedState}/municipios`);
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

//preview de imagem
document.getElementById('photoInput').addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
    const preview = document.getElementById('photoPreview');
    const icon = document.getElementById('defaultIcon');
      if (icon) icon.classList.add('d-none'); 
      preview.src = e.target.result;
      preview.classList.remove('d-none'); 
      }
    reader.readAsDataURL(file);
  }
 });

 //abre o modal para excluir conta
function openDeleteAccountModal() {
  const modalEl = document.getElementById('deleteAccountModal');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}

</script>


@endsection
