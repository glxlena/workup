@extends('layout')
@section('title', 'WorkUP - Entrar em Contato')
@section('base')
<br>
<div class="d-flex justify-content-center align-items-start w-100">
  <div class="p-4 m-4 bg-light rounded sombra" style="max-width: 600px; width: 100%;">
    <h2 class="text-center mb-4">Entrar em Contato</h2>

    <!-mensagem de sucesso-->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <!--mensagem de erro-->
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <p class="text-center text-muted mb-4">
      Envie um e-mail personalizado para <strong>{{ $user->name }}</strong> ou entre em contato diretamente pelo WhatsApp.
    </p>

    <!--formulário de envio direto-->
    <form action="{{  route('messages.send', $user->id) }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="message" class="form-label">Mensagem personalizada</label>
        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Escreva aqui sua mensagem..."></textarea>
      </div>
      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Voltar</a>

        <div class="d-flex gap-2">
          {{-- Botão de envio direto --}}
          <button type="submit" class="btn indigo">
            <i class="bi bi-envelope-fill me-1"></i> Enviar E-mail
          </button>
          @php
            $cleanPhone = preg_replace('/\D/', '', $user->phone ?? '');
          @endphp
          <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="btn btn-success">
            <i class="bi bi-whatsapp me-1"></i> WhatsApp
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
