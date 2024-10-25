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

<body class="bg-backgtt" data-authenticated="{{ auth()->check() }}">
    <div class="h-full min-h-screen relative">
        @include('adm.navbar')

        <div class="flex flex-col flex-wrap lg:flex-row place-content-center my-16 mr-0 xl:mr-36">
            <div class="mb-5 lg:mb-0 flex justify-center mx-10">
                <div class="relative">
                    <div class="carousel w-full">
                        <div class="w-96 h-96 overflow-hidden rounded-lg border-2 border-black">
                            @php
                            $i = 1;
                            @endphp
                            @foreach($artigo->imagens as $img)
                            <div id="item-carousel-{{ $i }}" class="first:block h-full hidden duration-700 ease-in-out">
                                <img src="{{ asset($img->endereco_imagem) }}" id="imagem-carousel-{{$i}}" class="h-full object-cover" alt="Imagem do produto" width="500">
                            </div>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </div>
                        <div>
                            @for($p = 1; $p<$i; $p++)
                                <div class="first:flex hidden" id="sequence-{{ $p }}">
                                <button type="button" class="absolute rotate-180 top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="carousel-prev-{{ $p }}">
                                    <span class="inline-flex items-center justify-center w-12 h-12 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31" zoomAndPan="magnify" viewBox="0 0 23.25 45.75" height="61" preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <defs>
                                                <clipPath id="c2d17cf024">
                                                    <path d="M 0 0.59375 L 22.523438 0.59375 L 22.523438 44.914062 L 0 44.914062 Z M 0 0.59375 " clip-rule="nonzero" />
                                                </clipPath>
                                                <clipPath id="64c81866ab">
                                                    <path d="M 1.585938 42.003906 L 2.75 42.003906 L 2.75 43.167969 L 1.585938 43.167969 Z M 1.585938 42.003906 " clip-rule="nonzero" />
                                                </clipPath>
                                                <clipPath id="5161af1ce8">
                                                    <path d="M 2.167969 42.003906 C 1.847656 42.003906 1.585938 42.265625 1.585938 42.585938 C 1.585938 42.90625 1.847656 43.167969 2.167969 43.167969 C 2.488281 43.167969 2.75 42.90625 2.75 42.585938 C 2.75 42.265625 2.488281 42.003906 2.167969 42.003906 Z M 2.167969 42.003906 " clip-rule="nonzero" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#c2d17cf024)">
                                                <path fill="#000000" d="M 22.40625 23.257812 C 22.421875 23.230469 22.4375 23.203125 22.449219 23.175781 C 22.460938 23.144531 22.46875 23.113281 22.480469 23.078125 C 22.488281 23.050781 22.496094 23.023438 22.503906 22.992188 C 22.511719 22.960938 22.511719 22.929688 22.515625 22.898438 C 22.515625 22.867188 22.523438 22.835938 22.523438 22.804688 C 22.523438 22.773438 22.515625 22.746094 22.515625 22.714844 C 22.511719 22.679688 22.507812 22.648438 22.503906 22.617188 C 22.496094 22.589844 22.488281 22.558594 22.480469 22.53125 C 22.46875 22.5 22.460938 22.46875 22.449219 22.4375 C 22.4375 22.40625 22.421875 22.382812 22.40625 22.355469 C 22.394531 22.324219 22.378906 22.292969 22.359375 22.265625 C 22.34375 22.238281 22.320312 22.214844 22.300781 22.1875 C 22.28125 22.167969 22.265625 22.144531 22.246094 22.121094 L 1.785156 1.039062 C 1.40625 0.652344 0.789062 0.644531 0.398438 1.019531 C 0.0117188 1.398438 0.00390625 2.019531 0.378906 2.40625 L 20.179688 22.804688 L 0.378906 43.203125 C 0.00390625 43.59375 0.0117188 44.214844 0.398438 44.589844 C 0.589844 44.777344 0.835938 44.867188 1.082031 44.867188 C 1.335938 44.867188 1.59375 44.769531 1.785156 44.570312 L 22.246094 23.488281 C 22.265625 23.46875 22.28125 23.445312 22.300781 23.421875 C 22.320312 23.394531 22.34375 23.371094 22.359375 23.34375 C 22.378906 23.316406 22.390625 23.285156 22.40625 23.257812 Z M 22.40625 23.257812 " fill-opacity="1" fill-rule="nonzero" />
                                            </g>
                                            <g clip-path="url(#64c81866ab)">
                                                <g clip-path="url(#5161af1ce8)">
                                                    <path fill="#010019" d="M 1.585938 42.003906 L 2.75 42.003906 L 2.75 43.167969 L 1.585938 43.167969 Z M 1.585938 42.003906 " fill-opacity="1" fill-rule="nonzero" />
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" id="carousel-next-{{ $p }}">
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="31" zoomAndPan="magnify" viewBox="0 0 23.25 45.75" height="61" preserveAspectRatio="xMidYMid meet" version="1.0">
                                            <defs>
                                                <clipPath id="c2d17cf024">
                                                    <path d="M 0 0.59375 L 22.523438 0.59375 L 22.523438 44.914062 L 0 44.914062 Z M 0 0.59375 " clip-rule="nonzero" />
                                                </clipPath>
                                                <clipPath id="64c81866ab">
                                                    <path d="M 1.585938 42.003906 L 2.75 42.003906 L 2.75 43.167969 L 1.585938 43.167969 Z M 1.585938 42.003906 " clip-rule="nonzero" />
                                                </clipPath>
                                                <clipPath id="5161af1ce8">
                                                    <path d="M 2.167969 42.003906 C 1.847656 42.003906 1.585938 42.265625 1.585938 42.585938 C 1.585938 42.90625 1.847656 43.167969 2.167969 43.167969 C 2.488281 43.167969 2.75 42.90625 2.75 42.585938 C 2.75 42.265625 2.488281 42.003906 2.167969 42.003906 Z M 2.167969 42.003906 " clip-rule="nonzero" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#c2d17cf024)">
                                                <path fill="#000000" d="M 22.40625 23.257812 C 22.421875 23.230469 22.4375 23.203125 22.449219 23.175781 C 22.460938 23.144531 22.46875 23.113281 22.480469 23.078125 C 22.488281 23.050781 22.496094 23.023438 22.503906 22.992188 C 22.511719 22.960938 22.511719 22.929688 22.515625 22.898438 C 22.515625 22.867188 22.523438 22.835938 22.523438 22.804688 C 22.523438 22.773438 22.515625 22.746094 22.515625 22.714844 C 22.511719 22.679688 22.507812 22.648438 22.503906 22.617188 C 22.496094 22.589844 22.488281 22.558594 22.480469 22.53125 C 22.46875 22.5 22.460938 22.46875 22.449219 22.4375 C 22.4375 22.40625 22.421875 22.382812 22.40625 22.355469 C 22.394531 22.324219 22.378906 22.292969 22.359375 22.265625 C 22.34375 22.238281 22.320312 22.214844 22.300781 22.1875 C 22.28125 22.167969 22.265625 22.144531 22.246094 22.121094 L 1.785156 1.039062 C 1.40625 0.652344 0.789062 0.644531 0.398438 1.019531 C 0.0117188 1.398438 0.00390625 2.019531 0.378906 2.40625 L 20.179688 22.804688 L 0.378906 43.203125 C 0.00390625 43.59375 0.0117188 44.214844 0.398438 44.589844 C 0.589844 44.777344 0.835938 44.867188 1.082031 44.867188 C 1.335938 44.867188 1.59375 44.769531 1.785156 44.570312 L 22.246094 23.488281 C 22.265625 23.46875 22.28125 23.445312 22.300781 23.421875 C 22.320312 23.394531 22.34375 23.371094 22.359375 23.34375 C 22.378906 23.316406 22.390625 23.285156 22.40625 23.257812 Z M 22.40625 23.257812 " fill-opacity="1" fill-rule="nonzero" />
                                            </g>
                                            <g clip-path="url(#64c81866ab)">
                                                <g clip-path="url(#5161af1ce8)">
                                                    <path fill="#010019" d="M 1.585938 42.003906 L 2.75 42.003906 L 2.75 43.167969 L 1.585938 43.167969 Z M 1.585938 42.003906 " fill-opacity="1" fill-rule="nonzero" />
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="flex flex-col lg:flex-wrap lg:flex-row lg:justify-between lg:mx-0 mx-auto">
                <div>
                    <div class="lg:ml-5 flex flex-col max-w-80 w-full mb-4 lg:mb-0">
                        <div class="lg:mb-0 mb-5">
                            <div class="border-b border-black text-4xl font-fredokatt overflow-hidden text-nowrap hover:overflow-x-auto" style="font-family: 'Fredoka';">
                                {{ $artigo->nome_artigo }}
                            </div>
                            <div class="text-lg">
                                @if(isset($artigo->valor_sugerido_artigo))
                                <p class="text-graytt">Valor sugerido: <span class="text-pinktt font-bold">R${{ $artigo->valor_sugerido_artigo }}</span></p>
                                @endif
                                <p class="text-graytt">Artigo publicado por: <span class="text-black underline">{{ $artigo->user->name }} {{ $artigo->user->sobrenome }}</span></p>
                            </div>
                        </div>
                        @if(isset($artigo->preferencia_troca_artigo))
                        <div class="max-w-72 lg:mb-0 mb-5">
                            <p><span class="text-graytt"> Preferência de troca: </span> {{ $artigo->preferencia_troca_artigo }}</p>
                        </div>
                        @endif
                        <div class="min-w-fit">
                            <p> <span class="text-graytt"> Categoria: </span> {{ $artigo->categoria_artigo }} </p>
                            <p> <span class="text-graytt"> Condição: </span> {{ $artigo->condicao_artigo }} </p>
                            <p> <span class="text-graytt"> Tempo de uso: </span> {{ $artigo->tempo_uso_artigo }} </p>
                        </div>



                    </div>



                </div>

            </div>
            <div class="flex items-end h-full gap-3">
                <a href="{{ route('ignore', ['id' => $denun_id]) }}" class="inline-flex px-4 py-2 h-fit justify-center w-full lg:w-auto bg-white border-2 border-black text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">
                    Ignorar
                </a>
                <a href="{{ route('advert', ['id' => $denun_id]) }}" class="inline-flex px-4 py-2 h-fit justify-center w-full lg:w-auto bg-yellowtt-light border-2 border-black text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">
                    Adverter
                </a>
                <a href="{{ route('exclude', ['id' => $denun_id]) }}" class="inline-flex px-4 py-2 h-fit justify-center w-full lg:w-auto bg-redtt border-2 border-black text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">
                    Excluir anuncio
                </a>
                <a href="{{ route('inactivate', ['id' => $denun_id]) }}" class="inline-flex px-4 py-2 h-fit justify-center w-full lg:w-auto bg-black border-2 border-black text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-105 duration-300">
                    Inativar usuário
                </a>
            </div>

        </div>

    </div>

    </div>

    <script>
        //inclusão do modal de denunciar
        document.addEventListener('DOMContentLoaded', function() {
            const isAuthenticated = document.body.getAttribute('data-authenticated') === '1';

            const carrosselCount = {
                {
                    $i
                }
            }; // Assumindo que $i é a quantidade total de carrosséis

            for (let s = 1; s < carrosselCount; s++) {
                const nextBtn = document.getElementById(`carousel-next-${s}`);
                const prevBtn = document.getElementById(`carousel-prev-${s}`);
                const item = document.getElementById(`item-carousel-${s}`);
                const sequence = document.getElementById(`sequence-${s}`);

                nextBtn.addEventListener('click', function() {
                    moveCarousel(s, 1); // Move para o próximo item
                });

                prevBtn.addEventListener('click', function() {
                    moveCarousel(s, -1); // Move para o item anterior
                });
            }

            function moveCarousel(currentIndex, direction) {
                const total = {
                    {
                        $i
                    }
                }; // Total de itens
                let nextIndex = currentIndex + direction;

                // Se for maior que o total, reinicia para o primeiro item
                if (nextIndex >= total) {
                    nextIndex = 1;
                }

                // Se for menor que 1, volta para o último item
                if (nextIndex < 1) {
                    nextIndex = total - 1;
                }

                const currentItem = document.getElementById(`item-carousel-${currentIndex}`);
                const nextItem = document.getElementById(`item-carousel-${nextIndex}`);

                const currentSequence = document.getElementById(`sequence-${currentIndex}`);
                const nextSequence = document.getElementById(`sequence-${nextIndex}`);

                // Oculta o item atual e mostra o próximo
                currentItem.classList.add('hidden');
                currentItem.classList.remove('block');
                currentItem.classList.remove('first:block');
                nextItem.classList.remove('hidden');
                nextItem.classList.add('block');

                // Atualiza a sequência
                currentSequence.classList.add('hidden');
                currentSequence.classList.remove('flex');
                currentSequence.classList.remove('first:block');
                nextSequence.classList.remove('hidden');
                nextSequence.classList.add('flex');
            }


        });
    </script>

</body>

</html>