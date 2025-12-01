<!--Modal de nova proposta-->
<div id="modalNewProposal" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-8">
        <div class="w-full max-w-4xl rounded-3xl bg-bluett p-6 sm:p-8 shadow-2xl">

            <div>

                <div id="SendArticle" class="hidden w-full">

                    <h1 class="text-2xl sm:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt mb-8">Enviar um artigo</h1>

                    <div class="pt-4 px-3 pb-8 overflow-y-auto max-h-80 w-full">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-items-center">
                            <!--Card do anúncio-->
                            @if($meusartigos)
                            @foreach($meusartigos as $artg)
                            <!-- Verificar o estado do usuário -->
                            @if($artg->user->status !== 'inativado')
                            <div class="group my-1 flex w-full max-w-[260px] flex-col overflow-hidden rounded-xl border border-graytt-light shadow-tt bg-white transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                                <a href="/propose/sendarticle/{{$artg->id}}/{{$artigo->id}}">
                                    <div class="relative mx-3 mt-3 flex h-48 overflow-hidden rounded-xl border-2 border-black">
                                        @foreach($artg->imagens as $imagem)
                                        @if($imagem->imagem_principal)
                                        <img class="peer absolute top-0 right-0 h-full w-full object-cover" loading="lazy" src="{{ asset($imagem->endereco_imagem) }}">
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="mt-4 px-5 pb-5">
                                        <p class="truncate lg:text-left lg:mt-2 text-black">{{$artg->nome_artigo}}</p>
                                        <p class="truncate lg:text-left lg:mt-2 text-stone-400">{{$artg->categoria_artigo}}</p>
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="flex">
                            <div class="flex gap-3 justify-start w-full">
                                <div class="justify-between flex content-center w-2xs mt-8">
                                    <button type="button" class="inline-flex bg-white items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt hover:bg-graytt-light text-white text-white text-sm font-medium rounded-2xl mr-5 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300 cursor-pointer" onclick="openNewProposal()">
                                        <p class="font-medium text-sm text-black">Criar nova proposta</p>
                                    </button>
                                </div>
                            </div>

                            <div class="flex gap-3 justify-end w-full">
                                <div class="justify-between flex content-center w-2xs mt-8">
                                    <button type="button" class="cancelNewProposal inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-pinktt hover:bg-pinktt-dark text-white text-sm font-medium rounded-2xl mr-5 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300" onclick="closeNewProposal()">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>

                <div id="NewProposal" class="w-full">
                    <form action="/propose/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="text-2xl sm:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt">Criar proposta</h1>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:place-content-center">
                            <div>
                                <p class="block text-sm font-semibold leading-6 text-white mt-6">Foto do Artigo:</p>
                                <label for="img_principal">
                                    <div class="add-img-p bg-white w-full h-36 sm:h-72 sm:w-72 t-2 mr-8 rounded-xl border border-graytt-light shadow-tt flex flex-col flex-wrap justify-center items-center overflow-hidden">
                                        <img src="" class="hidden h-full object-cover">
                                        <div class="placeholder-img mt-2 mb-2 flex flex-col justify-center items-center transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-[1.05] duration-300">
                                            <img src="{{asset('image/mais.svg')}}" alt="" width="100">
                                            <p class="text-graytt text-xs text-center mt-2">Foto do artigo (Obrigatório)</p>
                                        </div>
                                    </div>
                                </label>
                                <input type="file" name="img_principal" id="img_principal" class="hidden" accept="image/*" required>
                            </div>
                            <div class="w-full">
                                <input type="hidden" name="id_artigo" value="{{ $artigo->id }}">
                                <label for="nome_art" class="block text-sm font-semibold leading-6 text-white mt-4">Nome do Artigo:</label>
                                <input type="text" name="nome_art" id="nome_art" autocomplete="organization" required class="shadow-tt block w-full rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">

                                <label for="catepropo" class="block text-sm font-semibold leading-6 text-white mt-4">Categoria:</label>
                                <div class="inset-y-0 left-0 flex items-center">
                                    <select id="catepropo" name="catepropo" required class="custom-select shadow-tt block w-52 rounded-xl border text-graytt-dark  border-graytt-light px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="" disabled selected>Selecionar</option>
                                        <option value="Brinquedo">Brinquedo</option>
                                        <option value="Mobilidade">Mobilidade</option>
                                        <option value="Móvel">Móvel</option>
                                        <option value="Roupa">Roupa</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>

                                <label for="condpropo" class="block text-sm font-semibold leading-6 text-white mt-4">Condição:</label>
                                <div class="inset-y-0 left-0 flex items-center">
                                    <select id="condpropo" name="condpropo" required class="custom-select shadow-tt block w-52 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="nenhum foi selecionado" disabled selecte>Selecionar</option>
                                        <option value="Novo">Novo</option>
                                        <option value="Seminovo">Seminovo</option>
                                        <option value="Usado">Usado</option>
                                    </select>
                                </div>

                                <label for="uso_art" class="block text-sm font-semibold leading-6 text-white mt-4">Tempo de Uso:</label>
                                <div class="flex">
                                    <input type="text" name="uso_art" id="uso_art" maxlength="3" autocomplete="organization" required class="shadow-tt block w-16 mr-3 rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                                    <select id="uso_art2" name="uso_art2" required class="custom-select shadow-tt block w-30 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="nenhum foi selecionado" disabled selected>Selecionar</option>
                                        <option value="ano(s)">ano(s)</option>
                                        <option value="mês(es)">mês(es)</option>
                                        <option value="dia(s)">dia(s)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        @if ($errors->any())
                        <div class="mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Botões de confirmação -->
                        <div class="flex">
                            @if($meusartigos->count() > 0)
                            <div class="flex gap-3 justify-start w-full">
                                <div class="justify-between flex content-center w-2xs mt-8">
                                    <button type="button" class="inline-flex bg-white items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt hover:bg-graytt-light text-white text-white text-sm font-medium rounded-2xl mr-5 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300 cursor-pointerx" onclick="openSendArticle()">
                                        <p class="font-medium text-sm text-black">Selecionar artigo existente</p>
                                    </button>
                                </div>
                            </div>
                            @endif

                            <div class="flex gap-3 justify-end w-full">
                                <div class="justify-between flex content-center w-2xs mt-8">
                                    <button type="button" class="cancelNewProposal inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-pinktt hover:bg-pinktt-dark text-white text-sm font-medium rounded-2xl mr-5 transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300" onclick="closeNewProposal()">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="mr-3 inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-greentt hover:bg-greentt-dark text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                                        Confirmar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    let paiimg = '.add-img-p';
    let img = document.querySelector(paiimg + ' img');
    let placeholder = document.querySelector(paiimg + ' .placeholder-img');
    let inputArquivo = document.querySelector("#img_principal");

    inputArquivo.onchange = function() { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

        if (inputArquivo.files.length > 0) { //Verifica se há um arquivo selecionado.
            img.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
            img.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }

    };

    let uso_art = document.querySelector('#uso_art');

    uso_art.addEventListener('keypress', function(event) {
        onlyFloat(uso_art);
    });

    function onlyFloat(element) {
        if (!event.key.match(/[\d.,]/)) {
            event.preventDefault();
        }

        if (element.value.includes('.') || element.value.includes(',')) {
            if (event.key === ',' || event.key === '.') {
                event.preventDefault();
            }
        }
    }

    function openNewProposal() {
        const sArticle = document.getElementById('SendArticle');
        const nProposal = document.getElementById('NewProposal');
        sArticle.classList.add('hidden');
        nProposal.classList.remove('hidden');
    };

    function openSendArticle() {
        const sArticle = document.getElementById('SendArticle');
        const nProposal = document.getElementById('NewProposal');
        sArticle.classList.remove('hidden');
        nProposal.classList.add('hidden');
    };
</script>