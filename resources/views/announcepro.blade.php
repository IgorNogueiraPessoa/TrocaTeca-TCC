<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrocaTeca</title>
    <link rel="shortcut icon" href="{{ asset('image/t.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body class="bg-backgtt">
    <div id="notloading" class="h-full min-h-screen relative">
        @include('navbar')
        <div class="flex flex-col h-full items-center">
            <h1 class=" text-3xl lg:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt mt-6">Anuncie um Novo Artigo</h1> <!--Título-->
            <!--input de imagem-->
            <form method="POST" action="{{ route('artigo.add') }}" enctype="multipart/form-data" onsubmit="startLoading()">
            @csrf
                <div class="flex flex-col lg:flex-row lg:items-center lg:place-content-center mb-5">
                    <div class="lg:mr-8">
                        <div class="mt-5 lg:mt-0">
                            <label for="img_principal" class="flex flex-col items-center">
                                <div class="add-img-p bg-white w-64 h-32 lg:h-80 lg:w-80 rounded-xl border border-graytt-light shadow-tt flex flex-col flex-wrap justify-center items-center overflow-hidden">
                                    <img src="" class="hidden h-full object-cover">
                                    <div class="placeholder-img mt-2 mb-2 flex flex-col justify-center items-center transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-[1.05] duration-300">
                                        <img src="{{asset('image/mais.svg')}}" alt="" width="100">
                                        <p class="text-graytt text-xs text-center mt-2">Foto principal do artigo (Obrigatório)</p>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="img_principal" id="img_principal" class="hidden border border-graytt-light" required accept="image/*">
                        <!--input das imagem pequenas-->        

                            <div class="flex lg:flex-row justify-between">

                                @for ($i = 0; $i < 4; $i++)

                                    <div>
                                        <input type="file" name="img[{{$i}}]" id="imagem{{$i+1}}" class="hidden" accept="image/*">
                                        <label for="imagem{{$i+1}}">
                                        <div class="add-img{{ $i+1 }} mt-3 bg-white w-14 h-14 last:mr-0 sm:mr-3 rounded-xl border border-graytt-light shadow-tt flex flex-col justify-center items-center overflow-hidden">
                                            <img src="" class="hidden object-cover h-full">
                                            <div class="placeholder-img flex flex-col justify-center items-center transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-[1.05] duration-300 m-3">
                                                <img src="{{asset('image/mais.svg')}}" alt="" width="30">
                                            </div>
                                        </div>
                                        </label>
                                    </div>

                                @endfor
                                
                            </div>
                        </div>
                    </div>

                    <!--input de texto-->
                    <div class="max-w-xl">
                        <!--Nome do artigo-->
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <label for="nome_art" class="block text-lg lg:text-xl font-semibold lg:font-normal leading-6 text-black lg:mt-2 lg:mr-3 lg:text-nowrap">Nome do artigo*:</label>
                            <input type="text" name="nome_art" id="nome_art" required autocomplete="organization" class="border border-graytt-light w-full shadow-tt block placeholder:text-graytt rounded-xl border border-graytt-light px-3.5 py-2 shadow-lg ring-1 ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset lg:text-lg lg:leading-6">
                        </div>
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <!--valor sugerido-->
                            <label for="val" class="block text-lg lg:text-xl font-semibold lg:font-normal leading-6 text-black lg:mt-2 lg:mr-3 lg:text-nowrap">Valor sugerido: R$</label>
                            <input type="text" name="val" id="val" autocomplete="organization" class="border border-graytt-light shadow-tt block placeholder:text-graytt rounded-xl border border-graytt-light px-3.5 py-2 shadow-lg ring-1 ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset lg:text-lg lg:leading-6">
                        </div>
                        <!--Item de Preferência-->
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <label for="pref" class="block text-lg lg:text-xl font-semibold lg:font-normal leading-6 text-black lg:mt-2 lg:mr-3 lg:text-nowrap">Preferência de troca:</label>
                            <input type="text" name="pref" id="pref" autocomplete="organization" class=" w-full shadow-tt block rounded-xl border border-graytt-light px-3.5 py-2 shadow-lg ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset lg:text-lg lg:leading-6">
                        </div>
                        <!--Categoria-->
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <label for="catepropo" class="block text-lg lg:text-xl font-semibold lg:font-normal leading-6 text-black lg:mt-2 lg:mr-3">Categoria*:</label>
                            <div class="inset-y-0 left-0 flex items-center">
                                <select id="catepropo" name="catepropo" required class="custom-select shadow-tt block w-52 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 lg:text-lg lg:leading-6">
                                    <option value="" disabled selected>Selecionar</option>
                                    <option value="Brinquedo">Brinquedo</option>
                                    <option value="Mobilidade">Mobilidade</option>
                                    <option value="Móvel">Móvel</option>
                                    <option value="Roupa">Roupa</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                        </div>
                        <!--Condição-->
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <label for="condpropo" class="block text-lg lg:text-xl lg:font-normal font-semibold leading-6 text-black lg:mt-2 lg:mr-3">Condição*:</label>
                            <div class="inset-y-0 left-0 flex items-center">
                                <select id="condpropo" name="condpropo" required class="custom-select shadow-tt block w-52 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 lg:text-lg lg:leading-6">
                                    <option value="" disabled selected>Selecionar</option>
                                    <option value="Novo">Novo</option>
                                    <option value="Seminovo">Seminovo</option>
                                    <option value="Usado">Usado</option>
                                </select>
                            </div>
                        </div>

                        <!--Tempo de uso-->
                        <div class="flex flex-col lg:flex-row mt-4 lg:mt-8">
                            <label for="uso_art" class="block text-lg lg:text-xl lg:font-normal font-semibold leading-6 text-black lg:mt-2 lg:mr-3">Tempo de uso*:</label>
                            <div class="flex">
                                <input type="text" name="uso_art" id="uso_art" maxlength="3" required class="shadow-tt block w-16 rounded-xl mr-3 border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                                <select id="uso_art2" name="uso_art2" required class="custom-select shadow-tt block w-30 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Selecionar</option>
                                    <option value="ano(s)">ano(s)</option>
                                    <option value="mês(es)">mês(es)</option>
                                    <option value="dia(s)">dia(s)</option>
                                </select>
                            </div>
                        </div>
                        <!--botões de confirmação-->
                        <div class="flex flex-col lg:flex-row mt-4 sm:mr-0 mr-10 w-full justify-end">
                            <button class="mr-3 inline-flex items-center p-2 justify-center w-26 lg:w-auto shadow-tt bg-pinktt hover:bg-pinktt-dark text-white text-lg font-medium rounded-2xl transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-110 duration-300">
                                Criar anúncio do artigo
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($errors->any())
            <div class="mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <script>
            let paiimg = '.add-img-p';
            let img = document.querySelector(paiimg+' img');
            let placeholder = document.querySelector(paiimg+' .placeholder-img');
            let inputArquivo = document.querySelector("#img_principal");

            inputArquivo.onchange = function () { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

            if (inputArquivo.files.length > 0) {  //Verifica se há um arquivo selecionado.
                img.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
                img.classList.remove('hidden');

                placeholder.classList.add('hidden');
            }

            };

            for (let i = 1; i < 5; i++) {
                let paiimg = '.add-img' + i;
                let img = document.querySelector(paiimg+' img');
                let placeholder = document.querySelector(paiimg+' .placeholder-img');
                let inputArquivo = document.querySelector("#imagem" + i);

                // Verifica se o elemento foi encontrado antes de adicionar o evento
                if (img && inputArquivo) {
                    inputArquivo.onchange = function() {
                        if (inputArquivo.files.length > 0) {
                            img.src = URL.createObjectURL(inputArquivo.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
                            img.classList.remove('hidden');

                            placeholder.classList.add('hidden');
                        }
                    };
                }
            }

            let uso_art = document.querySelector('#uso_art');
            let value = document.querySelector('#val');

            uso_art.addEventListener('keypress', function(event) {
                onlyFloat(uso_art);
            });

            value.addEventListener('keypress', function(event) {
                onlyFloat(value);
            });

            function onlyFloat(element){
                if (!event.key.match(/[\d.,]/)) {
                    event.preventDefault();
                }

                if (element.value.includes('.') || element.value.includes(',')) {
                    if (event.key === ',' || event.key === '.') {
                        event.preventDefault();
                    }
                }
            }

        </script>
        @include('footer')
        @include('loading')
    </div>
</body>

</html>