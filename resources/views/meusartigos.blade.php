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
    <div class="h-full min-h-screen relative">
        @include('navbar')
        <div class="z-10">
            <div class="space-y-8 overflow-hidden sm:px-6 lg:px-8 bg-backgtt w-full">
                <div class="max-w-screen-xl px-4 mx-auto">
                    <div class="lg:flex lg:justify-between lg:items-center flex flex-col-reverse lg:flex-row">
                        <div class="mb-3 flex flex-col justify-center items-center lg:items-start space-y-4 max-w-3xl lg:mt-0 lg:order-1">
                            <h2 class="mt-10 text-3xl text-center lg:text-left text-black sm:text-4xl" style="font-family: 'Fredoka';">
                                Meus Artigos
                            </h2>

                        </div>
                    </div>
                    <hr class="h-px bg-black border-2 border-black">

                    <!--Card do anúncio sem preço sugerido-->

                    @if(count($artigo) > 0)
                        @foreach($artigo as $artg)
                        <div class="grid grid-cols-1 gap-4 justify-items-center">
                            <div class="w-full max-w-48 mt-6 mb-9 sm:max-w-none">
                                <a href="/editannounce/{{ $artg->id }}">
                                    <div class="flex flex-col sm:flex-row gap-3 bg-white rounded-3xl overflow-hidden items-center justify-start border-2 border-graytt-light shadow-tt transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">

                                        <!-- Imagem e informações básicas -->
                                        <div class="flex justify-center w-full sm:w-auto">
                                            <div class="ml-3 mt-3 mb-3 overflow-hidden relative w-20 h-20 flex-shrink-0 border-2 border-graytt-light rounded-xl">
                                                @foreach($artg->imagens as $imagem)
                                                    @if($imagem->imagem_principal)
                                                        <img class="rounded-xl w-full h-full object-cover object-center transition duration-50" loading="lazy" src="{{ asset($imagem->endereco_imagem) }}">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @if($artg->status_artigo == 0)
                                            <div class="flex flex-col gap-2 py-2 w-full text-center sm:text-left">
                                                <p class="truncate text-black text-xs sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">{{ $artg->nome_artigo }}</p>
                                                <p class="truncate text-stone-400 text-xs sm:text-sm md:text-base lg:text-base xl:text-lg">{{ $artg->categoria_artigo }}</p>
                                            </div>

                                            <!-- Exibição do valor sugerido se existir -->
                                            @if($artg->valor_sugerido_artigo)
                                            <div class="sm:pl-6 flex sm:h-20 sm:basis-2/5 sm:border-l border-black items-end sm:mb-0 mb-3">
                                                <p class="text-black text-xs sm:text-sm md:text-base lg:text-base xl:text-lg">Valor sugerido:
                                                <h1 class="font-bold text-pinktt ml-2 text-xs sm:text-sm md:text-base lg:text-base xl:text-lg">R${{ $artg->valor_sugerido_artigo }}</h1>
                                                </p>
                                            </div>
                                            @endif
                                        @else
                                            <div class="flex flex-col gap-2 py-2 w-full text-center sm:text-left">
                                                <p class="truncate text-stone-400 text-xs sm:text-sm md:text-base lg:text-base xl:text-lg">Seu artigo foi denunciado</p>
                                            </div>
                                        @endif

                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif

                    @if(count($artigo_sucedido) > 0)
                        @foreach($artigo_sucedido as $artg)
                        <div class="grid grid-cols-1 gap-4 justify-items-center">
                            <div class="w-full max-w-48 mt-6 mb-9 sm:max-w-none">
                                    <div class="flex flex-col sm:flex-row gap-3 bg-white rounded-3xl overflow-hidden items-center justify-start border-2 border-graytt-light shadow-tt">

                                        <!-- Imagem e informações básicas -->
                                        <div class="flex justify-center w-full sm:w-auto">
                                            <div class="ml-3 mt-3 mb-3 overflow-hidden relative w-20 h-20 flex-shrink-0 border-2 border-graytt-light rounded-xl">
                                                @foreach($artg->imagens as $imagem)
                                                    @if($imagem->imagem_principal)
                                                        <img class="rounded-xl w-full h-full object-cover object-center transition duration-50" loading="lazy" src="{{ asset($imagem->endereco_imagem) }}">
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 py-2 w-full text-center sm:text-left">
                                            <p class="truncate text-black text-xs sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">{{ $artg->nome_artigo }}</p>
                                            <p class="truncate text-stone-400 text-xs sm:text-sm md:text-base lg:text-base xl:text-lg">Troca realizada</p>
                                        </div>

                                    </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                    <div class="grid grid-cols-1 gap-4 justify-items-center">
                            <div class="w-full max-w-48 mt-6 mb-9 sm:max-w-none">
                                <a href="/announce">
                                    <div class="flex flex-col sm:flex-row gap-3 bg-white rounded-3xl overflow-hidden items-center justify-start border-2 border-graytt-light shadow-tt transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">

                                        <!-- Imagem e informações básicas -->
                                        <div class="flex justify-center w-full sm:w-auto">
                                            <div class="ml-3 mt-3 mb-3 overflow-hidden relative w-20 h-20 flex justify-center items-center">

                                                <img class="rounded-xl w-5/6 h-5/6 object-cover object-center transition duration-50" loading="lazy" src="{{ asset('image/mais.svg') }}">

                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 py-2 w-full text-center sm:text-left">
                                            <p class="truncate text-black text-xs sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">Crie um novo anúncio</p>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        @include('footer')
    </div>
</body>

</html>