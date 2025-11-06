
<div id="modalValid{{ $arc->id }}" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
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
          {{ \Carbon\Carbon::parse($arc->data_encontro)->format('d/m/Y') }}
        </p>
        <hr class="h-px bg-black border-2 border-black">
        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-xl font-bold text-left text-redtt font-fredokatt mb-1">Atenção: Valide a troca somente mediante ao encontro e recebimento do artigo.</h1>
        <!-- Botões de confirmação -->
        <div class="mt-4 flex flex-row gap-4 justify-around space-x-4">
          <button type="button" id="cancelInative{{ $arc->id }}" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-pinktt hover:bg-pinktt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
            Cancelar
          </button>
          <button type="button" id="openQrcodeButton" class="cursor-pointer inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-greentt shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 duration-300 hover:bg-greentt-dark hover:-translate-y-1 hover:scale-110  onclick="startloading()">
            Visualizar QrCode
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

@include('qrcode')

<script>
  //inclusão do modal de validar
  document.addEventListener('DOMContentLoaded', function() {
            const abrirValidar{{ $arc->id }} = document.getElementById('abrirValidar{{ $arc->id }}');
            const modalValid{{ $arc->id }} = document.getElementById('modalValid{{ $arc->id }}');

            abrirValidar{{ $arc->id }}.addEventListener('click', function(e) {
                e.preventDefault();
                modalValid{{ $arc->id }}.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });

            document.getElementById('cancelInative{{ $arc->id }}').addEventListener('click', function() {
                modalValid{{ $arc->id }}.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        });

  //função de loading ao clicar em visualizar qrcode

  const open = document.getElementById('openQrcodeButton');

  if (open) {
    open.addEventListener('click', function(e) {
      e.preventDefault();
      modal.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    });
  }

</script>
