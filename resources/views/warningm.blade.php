<!-- Modal de inativação de conta -->
<div id="modalWarning" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
  <div class="fixed z-50 inset-0 flex items-center justify-center p-4 sm:p-8 ">
    <div class="w-full max-w-2xl rounded-3xl bg-bluett p-6 sm:p-8 shadow-2xl">
      <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-center text-white font-fredokatt drop-shadow-tt">AVISO!</h1> <!-- Título de aviso -->
      <!-- Informação de consentimento -->
      <p class="mt-2 text-sm sm:text-base text-black text-center">
        Ao confirmar a inativação da conta você perderá todo o seu acesso a ela.
        Todas as propostas realizadas, artigos publicados e outros registros estarão
        indisponíveis para visualização por qualquer outra pessoa.
      </p>
      <!-- Checkbox de confirmação de consentimento -->
      <form action="{{ route('profile.inativate') }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mt-4 flex items-center gap-2">
          <input type="checkbox" id="confirm" name="confirm" class="mr-2 peer">
          <label for="confirm" class="text-sm sm:text-base text-black">Estou ciente disso</label>
        </div>
        <!-- Botões de confirmação -->
        <div class="mt-4 flex flex-col sm:flex-row gap-4 sm:gap-8 justify-center">
          <button id="cancelInative" type="button" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-white shadow-tt hover:bg-graytt-dark text-black text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
            Cancelar
          </button>
          <button id="inativarButton" type="submit" disabled class="opacity-50 cursor-not-allowed inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-redtt shadow-tt text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100 duration-300">
            Inativar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>