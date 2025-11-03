@extends('layout')
@section('title', 'WorkUP - ' .$user->name)
@section('base')
<br>

<div class="container">
  @if(session('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
      <i class="bi bi-check-circle-fill fs-5"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif
  <!-- mensagem de exclusão de avaliação, com opção de desfazer e fechar -->
  @if(session('review_deleted'))
  <div id="deleteAlert" class="alert alert-danger alert-dismissible fade show d-flex align-items-center justify-content-between gap-3" role="alert">
    <div class="d-flex align-items-center gap-2">
      <i class="bi bi-x-circle-fill fs-5"></i>
      <div>{{ session('review_deleted') }}</div>
    </div>
    <form method="POST" action="{{ route('reviews.undoDelete') }}">
      @csrf
      <button type="submit" class="btn btn-danger">Desfazer</button>
    </form>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="row">
    <div class="col-md-3 border rounded p-4 bg-light d-flex flex-column align-items-center sombra">
      @if ($user->photo)
      <img src="{{ asset('storage/' . $user->photo) }}" 
        class="rounded-circle mb-3 sombra" 
        width="250" height="250" 
        alt="Foto de perfil">
      @else
        <i class="bi bi-person-circle mb-3" style="font-size: 200px;"></i>
      @endif
      <h3 class="mb-2 text-center">{{ $user->name }}</h3>
      
      <!-- avaliações -->
      <div class="mb-2">
        @php
          $ratingExact = $user->averageRating() ?? 0;
          $ratingRounded = round($ratingExact);
        @endphp
        @for ($i = 1; $i <= 5; $i++)
          @if ($i <= $ratingRounded)
            <i class="bi bi-star-fill text-warning" style="font-size: 35px"></i>
          @else
            <i class="bi bi-star text-warning" style="font-size: 35px"></i>
          @endif
        @endfor
      </div>
      <p class="text-muted mb-2">{{ number_format($ratingExact, 2) }}</p>

      <br>
      <p class="text-muted mb-1"><strong>{{ $user->email }}</strong></p>
      <p class="mb-3 text-muted text-center">{{ $user->city }} - {{ $user->state }}</p>
      <br>

      <!-- se for o perfil do usuário logado, aparece a opção de editar perfil, se não, avaliar perfil -->
      @if (auth()->id() === $user->id)
          <a href="{{ route('user.edit', $user->id) }}" class="btn indigo w-100">Editar Perfil</a>
      @else
          <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#rateUserModal">Avaliar</a>
      @endif
    </div>

    <div class="col-md-9">
      <div class="p-4 bg-light rounded sombra" style="height: 650px; overflow-y: auto;">
        @if (auth()->id() === $user->id)
          <h2 class="text-center">Minhas Avaliações</h2>
        @else
          <h2 class="text-center">Avaliações de {{ $user->name }}</h2>
        @endif
        <br>
        <div class="row mt-0">
          @forelse ($user->reviewsReceived as $review)
          <div class="col-md-6 mb-4">
          <div class="card h-100 sombra review-card {{ isset($highlightReview) && $highlightReview == $review->id ? 'highlighted' : '' }}" id="review-{{ $review->id }}">
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <div class="d-flex align-items-center">
                    @if ($review->reviewer && $review->reviewer->photo)
                      <img src="{{ asset('storage/' . $review->reviewer->photo) }}" 
                          alt="Foto de {{ $review->reviewer->name }}" 
                          class="rounded-circle me-2" 
                          style="width: 40px; height: 40px; object-fit: cover;">
                    @else
                      <i class="bi bi-person-circle fs-3 me-2"></i>
                    @endif
                    <div>
                      <h6 class="fw-bold mb-0">{{ $review->reviewer->name }}</h6>
                      <small class="text-muted">{{ $review->created_at->format('d/m/Y H:i') }}</small>
                    </div>
                  </div>
                </div>

                <!-- comentário -->
                @if ($review->comment)
                  <p class="card-text mt-2">{{ $review->comment }}</p>
                @else
                  <p class="text-muted mt-2">Sem comentário</p>
                @endif

                <!-- estrelas e botão de excluir -->
                <div class="mt-auto d-flex justify-content-between align-items-center">
                  <div>
                    @for ($i = 1; $i <= 5; $i++)
                      @if ($i <= $review->rating)
                        <i class="bi bi-star-fill" style="color: #663399;"></i>
                      @else
                        <i class="bi bi-star" style="color: #663399;"></i>
                      @endif
                    @endfor
                  </div>

                  @if (auth()->id() === $user->id)
                    <button class="btn trash" onclick="confirmDelete({{ $review->id }})">
                      <i class="bi bi-trash-fill"></i>
                    </button>
                    <form id="deleteForm-{{ $review->id }}" 
                          action="{{ route('reviews.destroy', $review->id) }}" 
                          method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @empty
              @if (auth()->id() === $user->id)
                <p class="d-flex justify-content-center text-muted"><i class="bi bi-star" style="font-size: 80px;"></i></p>
                <p class="d-flex justify-content-center text-muted">Você ainda não possui nenhuma avaliação.</p>
              @else
                <p class="d-flex justify-content-center text-muted"><i class="bi bi-star" style="font-size: 80px;"></i></p>
                <p class="d-flex justify-content-center text-muted">{{ $user->name }} ainda não possui nenhuma avaliação.</p>
              @endif
            </p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal de avaliação de usuário -->
<div class="modal fade" id="rateUserModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="rateUserForm" method="POST" action="{{ route('users.review', $user->id) }}">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Avaliar {{ $user->name }}</h4>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="ratingInput" class="form-label"><strong>Nota (0.0 a 5.0)</strong></label>
            <input type="number" step="0.1" min="0" max="5" class="form-control" id="ratingInput" name="rating" required>
          </div>
          <div class="mb-3">
            <label for="commentInput" class="form-label"><strong>Comentário (Opcional)</strong></label>
            <textarea class="form-control" id="commentInput" name="comment" maxlength="300" rows="3" placeholder="Deixe seu comentário"></textarea>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Deixar Avaliação</button>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal de confirmação de exclusão -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <p class="text-center mb-3">Tem certeza que deseja excluir esta avaliação?</p>
      <div class="d-flex justify-content-center gap-3">
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Sim, excluir</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<script>
//exclusão de avaliação
let deleteId = null;

function confirmDelete(id) {
  deleteId = id;
  const modalElement = document.getElementById('deleteConfirmModal');
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
}

document.addEventListener('DOMContentLoaded', function () {
  const confirmBtn = document.getElementById('confirmDeleteBtn');
  if (confirmBtn) {
    confirmBtn.addEventListener('click', function () {
      if (deleteId) {
        document.getElementById('deleteForm-' + deleteId).submit();
      }
    });
  }
});

//avaliação destacada
document.addEventListener('DOMContentLoaded', () => {
  const highlighted = document.querySelector('.highlighted');
  if (highlighted) {
    highlighted.scrollIntoView({ behavior: 'smooth', block: 'center' });
    highlighted.classList.add('highlight-animation');

    setTimeout(() => {
      highlighted.classList.remove('highlight-animation');
    }, 5000); // 5 segundos
  }
});
</script>


@endsection
