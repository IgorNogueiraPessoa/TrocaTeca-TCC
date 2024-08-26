
<div id="modalValid" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
  <form action="validarTroca/{{ $arc->id }}" method="GET">
    @csrf
    <div class="fixed z-50 inset-0 flex items-center justify-center p-2 sm:p-4 md:p-6 lg:p-8">
      <div class="relative w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-3xl bg-bluett p-4 sm:p-6 md:p-8 shadow-2xl">

        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-left text-white font-fredokatt drop-shadow-tt mb-1">Validar Troca</h1>
        <hr class="h-px bg-black border-2 border-black">
        <!-- confira os dados -->
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          Confira os dados para gerar o comprovante:
        </p>
        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-xl font-bold text-left text-black font-fredokatt mb-1">Nome dos envolvidos</h1>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->proposta->artigo->user->name }} {{ $arc->proposta->artigo->user->sobrenome }}
        </p>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->proposta->user->name }} {{ $arc->proposta->user->sobrenome }}
        </p>
        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-xl font-bold text-left text-black font-fredokatt mb-1">Artigos a serem trocados</h1>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->proposta->artigo->nome_artigo }}
        </p>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->anuncio }}
        </p>
        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-xl font-bold text-left text-black font-fredokatt mb-1">Local e data de encontro</h1>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->local_encontro }}
        </p>
        <p class="mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black text-left">
          {{ $arc->data_encontro }}
        </p>
        <hr class="h-px bg-black border-2 border-black">
        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-xl font-bold text-left text-redtt font-fredokatt mb-1">Atenção: Valide a troca somente mediante ao encontro e recebimento do artigo.</h1>
        <!-- Checkbox de confirmação de consentimento -->
        <div class="mt-4 flex items-center gap-2">
          <input type="checkbox" id="confirm" name="confirm" class="mr-2 peer" required>
          <label for="confirm" class="text-xs sm:text-sm md:text-base lg:text-lg text-black">Encontro ocorreu conforme combinado</label>
        </div>
        <!-- Botões de confirmação -->
        <div class="mt-4 flex flex-row gap-4 justify-left space-x-4">
          <button type="button" id="cancelInative" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-pinktt hover:bg-pinktt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
            Cancelar
          </button>
          <button type="submit" id="inativarButton" disabled class="opacity-50 cursor-not-allowed inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-greentt shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 duration-300">
            Validar e gerar comprovante
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  //Modal de validação de troca
  document.addEventListener('DOMContentLoaded', function() {
    const abrirValidar = document.getElementById('abrirValidar');
    const modalValid = document.getElementById('modalValid');
  
    abrirValidar.addEventListener('click', function(e) {
      e.preventDefault();
      modalValid.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    });

    document.getElementById('cancelInative').addEventListener('click', function() {
      modalValid.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    });
  });

  //checar se a checkbox está precionada ou não (mmodal de validar)
  const checkbox = document.getElementById('confirm');
  const inativarButton = document.getElementById('inativarButton');

  checkbox.addEventListener('change', function() {
    if (checkbox.checked) {
      inativarButton.disabled = false;
      inativarButton.classList.remove('opacity-50', 'cursor-not-allowed');
      inativarButton.classList.add('hover:bg-greentt-dark', 'transition', 'ease-in-out', 'delay-100', 'hover:-translate-y-1', 'hover:scale-110', 'duration-300');
    } else {
      inativarButton.disabled = true;
      inativarButton.classList.remove('hover:bg-greentt-dark', 'transition', 'ease-in-out', 'delay-100', 'hover:-translate-y-1', 'hover:scale-110', 'duration-300');
      inativarButton.classList.add('opacity-50', 'cursor-not-allowed');
    }
  });
</script>
