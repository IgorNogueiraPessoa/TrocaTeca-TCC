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
                                Meus acordos
                            </h2>

                        </div>
                    </div>
                    <hr class="h-px bg-black border-2 border-black">

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-1 gap-4 justify-items-center">

                        <!-- Card do acordo finalizado -->
                        @if(count($acordos) > 0)
                        @foreach($acordos as $arc)
                        <div class="grid grid-cols-1 gap-4 justify-items-center w-full">

                            @php
                            if(($arc->status_acordo) == 4 || ($arc->proposta->id_usuario_int == Auth()->user()->id && $arc->status_acordo == 3) ||
                             ($arc->proposta->artigo->id_usuario_ofertante == Auth()->user()->id && $arc->status_acordo == 2))
                                $enabled = false;
                            else
                                $enabled = true;
                            @endphp
                            
                            <div class="w-full max-w-48 mt-6 mb-9 lg:max-w-none cursor-pointer" 
                            @if($enabled) 
                            id="abrirValidar{{ $arc->id }}"
                            @endif>
                                <div class="flex flex-col lg:flex-row gap-3 bg-white rounded-3xl overflow-hidden items-center justify-start border-2 border-graytt-light shadow-tt transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">
                                    <div class="flex justify-center w-full lg:w-auto">
                                        <div class="ml-3 mt-3 mb-3 overflow-hidden relative w-20 h-20 flex-shrink-0 border-2 border-graytt-light rounded-xl">
                                            <img class="rounded-xl w-full h-full object-cover object-center transition duration-50" loading="lazy" src="{{ asset($arc->imagem_acordo) }}">
                                        </div>
                                    </div>
                                    <div class="max-w-46 lg:flex lg:flex-col lg:gap-2 lg:py-2 lg:pl-4 lg:flex-1 truncate">
                                        <p class="text-center lg:text-left mb-2  text-black text-xs lg:text-sm md:text-xs lg:text-base xl:text-lg truncate">Anúncio: {{ $arc->proposta->artigo->nome_artigo }}</p>
                                        <p class=" text-center lg:text-left text-black text-xs lg:text-sm md:text-xs lg:text-base xl:text-lg truncate">Proposta: {{ $arc->anuncio }}</p>
                                    </div>
                                    <div class="max-w-46 lg:flex lg:flex-col lg:gap-2 lg:py-2 lg:border-l lg:border-black lg:pl-4 lg:flex-1 truncate">
                                        <p class="text-center lg:text-left mb-2 text-black text-xs lg:text-sm md:text-xs lg:text-base xl:text-lg text-nowrap ">Encontro: {{ \Carbon\Carbon::parse($arc->data_encontro)->format('d/m/Y')}}</p>
                                        <p class="lg:truncate text-center lg:text-left text-black text-xs lg:text-sm md:text-xs lg:text-base xl:text-lg truncate">{{ $arc->local_encontro }}</p>
                                    </div>
                                    <div class="flex place-content-end w-full lg:w-auto lg:h-20 items-end mr-6">
                                        @if($arc->status_acordo == 1 or $arc->status_acordo == 2 or $arc->status_acordo == 3) <!--em andamento 0-2-->
                                        <p class="mr-2 mb-0.5 text-black text-xs hidden lg:block">Acordo em andamento</p>
                                        <svg class="mb-3 lg:mb-0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" zoomAndPan="magnify" viewBox="0 0 810 809.999993" height="20" preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <path fill="#fff500" d="M 405 0 C 628.675781 0 810 181.324219 810 405 C 810 628.675781 628.675781 810 405 810 C 181.324219 810 0 628.675781 0 405 C 0 181.324219 181.324219 0 405 0 Z M 405 0 " fill-opacity="1" fill-rule="evenodd" />
                                        </svg>
                                        @elseif($arc->status_acordo == 4) <!--concluída-->
                                        <p class="mr-2 mb-0.5 text-black text-xs hidden lg:block">Acordo finalizado</p>
                                        <svg class="mb-3 lg:mb-0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" zoomAndPan="magnify" viewBox="0 0 810 809.999993" height="20" preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <path fill="#00BF63" d="M 405 0 C 628.675781 0 810 181.324219 810 405 C 810 628.675781 628.675781 810 405 810 C 181.324219 810 0 628.675781 0 405 C 0 181.324219 181.324219 0 405 0 Z M 405 0 " fill-opacity="1" fill-rule="evenodd" />
                                        </svg>
                                        @elseif($arc->status_acordo == 5) <!--cancelada-->
                                        <p class="mr-2 mb-0.5 text-black text-xs hidden lg:block">Acordo cancelado</p>
                                        <svg class="mb-3 lg:mb-0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" zoomAndPan="magnify" viewBox="0 0 810 809.999993" height="20" preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <path fill="#ff3131" d="M 405 0 C 628.675781 0 810 181.324219 810 405 C 810 628.675781 628.675781 810 405 810 C 181.324219 810 0 628.675781 0 405 C 0 181.324219 181.324219 0 405 0 Z M 405 0 " fill-opacity="1" fill-rule="evenodd" />
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="mb-7 mt-10 flex flex-col justify-center items-center space-y-4 max-w-3xl w-full mx-auto">
                            <h3 class="mt-7 text-2xl text-center text-black sm:text-4xl" style="font-family: 'Fredoka';">
                                OPS! Nenhum acordo encontrado
                            </h3>
                            <p class="text-center whitespace-pre-line">
                                Volte mais tarde após ter gerado um acordo.
                            </p>
                        </div>
                        @endif
                    </div>

                    <div class="flex gap-5 justify-center mt-8">
                        {{ $acordos->links() }}
                    </div>

                </div>
            </div>
        </div>
        @include('footer')
    </div>

    <!-- Incluir os modais de denunciar anúncio e enviar proposta-->
    @if(isset($acordos))
    @foreach($acordos as $arc)
        @include('modalvalidar')
    @endforeach
    @endif

    @include('notification', ['title' => "Ação realizada com êxito", 'body' => "Seu comprovante chegará por e-mail quando ambas as partes validarem o acordo."])


    @if(session('status') )
    <script>
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    </script>
    @endif

    @include('loading')


</body>

</html>
