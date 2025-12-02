<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrocaTeca</title>
    <link rel="shortcut icon" href="{{ asset('image/t.png') }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-backgtt">
    <div class="bg-backgtt h-screen max-h-screen bg-repeat bg-[length:870px_654px] bg-[url('/public/image/bg-icons.png')] bg-auto h-full relative overflow-hidden">

        <div class="w-full z-40">

            <div class="flex w-full h-[12vh] py-2.5 px-5 bg-bluett place-content-between items-center border-b border-black">

                <div class="flex items-center">

                    <a href="{{ route('mep') }}">
                        <div class="w-10 h-10 mr-4">
                            <svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M23.505 0c0.271 0 0.549 0.107 0.757 0.316 0.417 0.417 0.417 1.098 0 1.515l-14.258 14.264 14.050 14.050c0.417 0.417 0.417 1.098 0 1.515s-1.098 0.417-1.515 0l-14.807-14.807c-0.417-0.417-0.417-1.098 0-1.515l15.015-15.022c0.208-0.208 0.486-0.316 0.757-0.316z"></path>
                                </g>
                            </svg>
                        </div>
                    </a>

                    @foreach($propostas as $prop)
                    @if($prop->user->id == Auth()->user()->id)


                        @if($prop->artigo->user->imagem_usuario)
                        <div class="w-16 h-16 mr-3 rounded-full overflow-hidden flex justify-center items-center">
                            <img class="object-cover h-full" src="{{ asset($prop->artigo->user->imagem_usuario) }}" alt="">
                        </div>

                        @else
                        <div class="w-16 h-16 mr-3">
                            <svg fill="#000000" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 35.9922 C 20.9452 35.9922 15.5077 38.5 13.1405 41.3125 C 9.9999 37.7968 8.1014 33.1328 8.1014 28 C 8.1014 16.9609 16.9140 8.0781 27.9765 8.0781 C 39.0155 8.0781 47.8983 16.9609 47.9219 28 C 47.9219 33.1563 46.0234 37.8203 42.8593 41.3359 C 40.4921 38.5234 35.0546 35.9922 27.9999 35.9922 Z M 27.9999 32.0078 C 32.4999 32.0547 36.0390 28.2109 36.0390 23.1719 C 36.0390 18.4375 32.4765 14.5 27.9999 14.5 C 23.4999 14.5 19.9140 18.4375 19.9609 23.1719 C 19.9843 28.2109 23.4765 31.9609 27.9999 32.0078 Z"></path>
                                </g>
                            </svg>
                        </div>
                        @endif

                        <div>
                            <span class="text-3xl">{{$prop->artigo->user->name}}</span>
                        </div>


                    @else
                        @if($prop->user->imagem_usuario)

                        <div class="w-16 h-16 mr-3 rounded-full overflow-hidden flex justify-center items-center">
                            <img class="object-cover h-full" src="{{ asset($prop->user->imagem_usuario) }}" alt="">
                        </div>

                        @else
                        <div class="w-16 h-16 mr-3">
                            <svg fill="#000000" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 35.9922 C 20.9452 35.9922 15.5077 38.5 13.1405 41.3125 C 9.9999 37.7968 8.1014 33.1328 8.1014 28 C 8.1014 16.9609 16.9140 8.0781 27.9765 8.0781 C 39.0155 8.0781 47.8983 16.9609 47.9219 28 C 47.9219 33.1563 46.0234 37.8203 42.8593 41.3359 C 40.4921 38.5234 35.0546 35.9922 27.9999 35.9922 Z M 27.9999 32.0078 C 32.4999 32.0547 36.0390 28.2109 36.0390 23.1719 C 36.0390 18.4375 32.4765 14.5 27.9999 14.5 C 23.4999 14.5 19.9140 18.4375 19.9609 23.1719 C 19.9843 28.2109 23.4765 31.9609 27.9999 32.0078 Z"></path>
                                </g>
                            </svg>
                        </div>
                        @endif

                        <div>
                            <span class="text-3xl">{{$prop->user->name}}</span>
                        </div>

                    @endif
                    @endforeach

                </div>

                <div class="h-10 w-10 flex cursor-pointer relative" onclick="menuflutuante()">
                    <svg fill="#000000" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M13,16c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,14.346,13,16z" id="XMLID_294_"></path>
                            <path d="M13,26c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,24.346,13,26z" id="XMLID_295_"></path>
                            <path d="M13,6c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,4.346,13,6z" id="XMLID_297_"></path>
                        </g>
                    </svg>
                    <div id="menuflu" class="flex flex-col absolute hidden justify-center bg-bluett w-56 px-3 py-2 bottom-[-170px] left-[-205px] border-black border rounded-b-lg rounded-l-lg">
                        <button id="openGiveupButton" type="button" class="mb-3 p-3 bg-white border-black border rounded-xl hover:bg-graytt-light text-black text-md font-medium rounded-2xl">
                            Desistir da troca
                        </button>

                        <button id="openDenunButton" type="button" class="last:mb-0 mb-3 bg-white p-3 border-black border rounded-xl hover:bg-graytt-light text-black text-md font-medium rounded-2xl">
                            Denunciar conversa
                        </button>

                        @if($prop->user->id == Auth()->user()->id && $prop->status_proposta != 2 && !isset($prop->acordo))
                        <button id="openFinalButton" type="button" class="last:mb-0 mb-3 bg-white p-3 border-black border rounded-xl hover:bg-graytt-light text-black text-md font-medium rounded-2xl">
                            Enviar proposta final
                        </button>
                        @endif
                    </div>
                </div>

            </div>

        </div>

        <div class="h-[78vh] py-2">
            <div id="mensagens" class="flex flex-col h-full px-3 pb-2 overflow-y-scroll">
                @include('messages')
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full z-50" id="footer">

            <form action="/sendmessage/{{$id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-bluett border-t border-black py-2.5 px-7 md:ps-20 md:pe-7 h-[10vh]">
                    <div class="flex w-full align-item-center place-content-between items-center">
                        <input type="text" name="mensagem" 
                        @if($prop->status_proposta == 0)
                        placeholder="Proposta em aprovação..." disabled
                        @elseif(isset($prop->acordo) && $prop->acordo->status_acordo == 0)
                        placeholder="Acordo em aprovação..." disabled
                        @elseif($prop->status_proposta == 2)
                        placeholder="Troca finalizada" disabled
                        @else
                        placeholder="Digite sua mensagem"
                        @endif class="w-full h-10 pl-3 rounded-xl truncate" autofocus>

                        <button type="submit" class="ml-8" 
                        @if($prop->status_proposta == 0)
                        disabled
                        @elseif(isset($prop->acordo) && $prop->acordo->status_acordo == 0)
                        disabled
                        @elseif($prop->status_proposta == 2)
                        disabled
                        @endif
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" zoomAndPan="magnify" viewBox="0 0 66 66" preserveAspectRatio="xMidYMid meet" version="1.0">
                                <defs>
                                    <clipPath id="34d675a8fd">
                                        <path d="M 0 0 L 65.25 0 L 65.25 65.25 L 0 65.25 Z M 0 0 " clip-rule="nonzero" />
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#34d675a8fd)">
                                    <path fill="#ffffff" d="M 27.191406 15.390625 L 27.429688 15.398438 C 28.246094 15.445312 28.996094 15.734375 29.679688 16.261719 L 45.660156 30.777344 C 46.574219 31.644531 47.007812 32.707031 46.957031 33.972656 C 46.855469 35.230469 46.296875 36.234375 45.285156 36.988281 L 27.316406 49.730469 C 26.773438 50.105469 26.0625 50.3125 25.1875 50.347656 C 23.59375 50.285156 22.410156 49.570312 21.644531 48.203125 C 20.996094 46.839844 21.042969 45.523438 21.785156 44.253906 C 22.3125 43.554688 22.675781 43.171875 22.871094 43.097656 L 36.613281 33.347656 L 24.503906 22.339844 C 24.316406 22.242188 24.003906 21.816406 23.566406 21.0625 C 22.980469 19.710938 23.089844 18.398438 23.898438 17.125 C 24.738281 15.988281 25.835938 15.410156 27.191406 15.390625 M 32.875 0.00390625 L 29.855469 0.191406 C 25.90625 0.585938 22.265625 1.5625 18.929688 3.121094 C 17.261719 3.898438 15.671875 4.824219 14.15625 5.894531 C 13.285156 6.265625 11.203125 8.183594 7.90625 11.644531 C 7.117188 12.269531 5.621094 14.597656 3.417969 18.632812 C 2.636719 20.300781 2.003906 22.046875 1.515625 23.867188 C 0.503906 27.5625 0.144531 31.457031 0.433594 35.542969 C 1.21875 43.742188 4.710938 50.773438 10.910156 56.640625 C 12.273438 57.890625 13.722656 59.007812 15.261719 59.992188 L 17.636719 61.367188 C 19.265625 62.214844 20.980469 62.929688 22.78125 63.511719 C 26.175781 64.800781 30.34375 65.300781 35.285156 65.011719 C 43.289062 64.625 50.503906 61.132812 56.9375 54.539062 C 59.4375 51.816406 61.40625 48.738281 62.835938 45.308594 C 63.550781 43.59375 64.132812 41.789062 64.582031 39.898438 C 65.050781 38.472656 65.339844 36.03125 65.449219 32.578125 C 65.34375 28.476562 64.660156 24.679688 63.390625 21.191406 C 62.757812 19.449219 61.976562 17.78125 61.054688 16.1875 C 58.484375 12.34375 56.769531 10.128906 55.90625 9.542969 C 53.183594 6.820312 50.15625 4.679688 46.820312 3.121094 C 42.515625 1.425781 39.839844 0.585938 38.796875 0.59375 C 36.898438 0.253906 34.925781 0.0546875 32.875 0.00390625 Z M 32.875 0.00390625 " fill-opacity="1" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </button>

                        <label for="anexo" class="ml-8 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" zoomAndPan="magnify" viewBox="0 0 67.5 66" preserveAspectRatio="xMidYMid meet" version="1.0">
                                <g clip-path="url(#e7162953ae)">
                                    <path fill="#ffffff" d="M 49.722656 55.59375 C 49.574219 55.804688 49.164062 55.972656 48.625 55.992188 C 48.574219 56.023438 48.511719 56.023438 48.375 56.023438 L 19.921875 56.023438 C 17.789062 56.023438 15.621094 55.992188 13.488281 55.972656 C 12.507812 55.972656 11.507812 55.9375 10.53125 55.9375 C 9.617188 55.9375 8.710938 56.117188 7.765625 56.023438 C 7.730469 56.023438 7.710938 56.023438 7.648438 55.992188 C 7.578125 55.992188 7.480469 55.972656 7.386719 55.90625 C 6.796875 55.527344 8.019531 54.613281 8.238281 54.332031 C 8.890625 53.511719 16.085938 43.429688 16.1875 43.3125 C 17.15625 41.867188 18.480469 41.050781 19.859375 41.050781 C 21.898438 41.050781 22.929688 43.214844 24.539062 44.121094 C 26.640625 45.351562 28.019531 43.710938 29.058594 42.050781 C 29.761719 40.949219 30.480469 39.820312 31.171875 38.6875 C 31.582031 38.03125 32.011719 37.339844 32.421875 36.648438 C 32.925781 35.859375 33.421875 35.078125 33.929688 34.265625 L 34.933594 32.628906 C 35.03125 32.5 35.09375 32.410156 35.160156 32.28125 C 35.535156 31.742188 35.964844 31.398438 36.3125 31.398438 C 36.636719 31.398438 37.015625 31.742188 37.359375 32.3125 C 40.875 38.601562 44.421875 44.972656 47.871094 51.15625 L 49.542969 54.179688 C 49.691406 54.394531 49.757812 54.644531 49.824219 54.835938 C 49.855469 55.085938 49.886719 55.394531 49.722656 55.59375 Z M 16.871094 16.519531 C 20.992188 16.488281 24.324219 19.808594 24.324219 23.960938 C 24.324219 28.074219 21.058594 31.375 16.9375 31.398438 C 12.820312 31.398438 9.5 28.042969 9.5 23.960938 C 9.5 19.871094 12.789062 16.550781 16.871094 16.519531 Z M 52.800781 30.960938 C 43.488281 30.960938 35.933594 23.414062 35.933594 14.097656 C 35.933594 11.945312 36.339844 9.890625 37.070312 8.003906 L 7.417969 8.003906 C 6.757812 8.003906 6.105469 8.066406 5.476562 8.164062 C 2.363281 8.664062 0.0429688 11.273438 0.0429688 14.351562 C 0.0429688 28.980469 0.0117188 43.59375 0.0429688 58.191406 C 0.0429688 61.867188 3.246094 65.097656 6.921875 65.132812 L 50.265625 65.132812 C 51.550781 65.132812 52.710938 64.722656 53.714844 63.972656 C 55.632812 62.5 56.484375 60.484375 56.484375 58.105469 C 56.515625 50.847656 56.515625 43.5625 56.515625 36.269531 L 56.515625 30.550781 C 55.320312 30.816406 54.078125 30.960938 52.800781 30.960938 " fill-opacity="1" fill-rule="nonzero" />
                                </g>
                                <g clip-path="url(#875f43e762)">
                                    <path fill="#ffffff" d="M 60.546875 12.757812 L 58.898438 14.320312 C 58.773438 14.441406 58.578125 14.4375 58.453125 14.316406 L 54.96875 10.773438 C 54.769531 10.574219 54.421875 10.714844 54.421875 10.996094 L 54.421875 23.25 C 54.421875 23.425781 54.285156 23.566406 54.109375 23.566406 L 51.777344 23.566406 C 51.605469 23.566406 51.460938 23.425781 51.460938 23.25 L 51.460938 10.609375 C 51.460938 10.328125 51.121094 10.183594 50.921875 10.378906 L 46.871094 14.394531 C 46.738281 14.523438 46.523438 14.515625 46.402344 14.367188 L 45.023438 12.652344 C 44.925781 12.523438 44.933594 12.34375 45.050781 12.230469 L 52.570312 4.71875 C 52.691406 4.597656 52.894531 4.597656 53.015625 4.71875 L 60.554688 12.304688 C 60.679688 12.429688 60.675781 12.636719 60.546875 12.757812 Z M 52.800781 0.257812 C 45.160156 0.257812 38.960938 6.453125 38.960938 14.097656 C 38.960938 21.742188 45.160156 27.9375 52.800781 27.9375 C 60.445312 27.9375 66.640625 21.742188 66.640625 14.097656 C 66.640625 6.453125 60.445312 0.257812 52.800781 0.257812 " fill-opacity="1" fill-rule="nonzero" />
                                </g>
                            </svg>
                            </svg>
                        </label>
                        <input type="file" name="anexo" id="anexo" class="hidden" accept="image/*"
                        @if($prop->status_proposta == 0)
                        disabled
                        @elseif(isset($prop->acordo) && $prop->acordo->status_acordo == 0)
                        disabled
                        @elseif($prop->status_proposta == 2)
                        disabled
                        @endif
                        >

                        @if($prop->acordo && $prop->acordo->pontoe_lat && $prop->acordo->pontoe_lon)
                        <button type="button" class="ml-6 cursor-pointer" onclick="openChatMap('{{ $prop->acordo->pontoe_lat }}','{{ $prop->acordo->pontoe_lon }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path fill="#ffffff" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                        </button>
                        @endif
                    </div>

                    @if ($errors->any())
                    <div class="mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
                
            </form>

        </div>

    </div>

    @include ('giveuptrade')
    @include ('reportchatm')
    @include ('finalpropose')
    @include ('map')

    <script lang="Javascript">

        //Começando chat pelo ponto mais baixo
        setTimeout(function() {
            scrollToBottom();
        }, 500);
        function scrollToBottom(){
            const chat = document.getElementById('mensagens');
            chat.scrollTop = chat.scrollHeight;
        }

        //modal de desistir da troca
        document.addEventListener('DOMContentLoaded', function() {
            const openGiveupButton = document.getElementById('openGiveupButton');
            const modalGiveup = document.getElementById('modalGiveup');

            openGiveupButton.addEventListener('click', function(e) {
                e.preventDefault();
                modalGiveup.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });

            document.getElementById('cancelGiveupButton').addEventListener('click', function() {
                modalGiveup.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        });

        //modal de denunciar conversa
        document.addEventListener('DOMContentLoaded', function() {
            const openDenunButton = document.getElementById('openDenunButton');
            const DenunContainer = document.getElementById('DenunContainer');

            openDenunButton.addEventListener('click', function(e) {
                e.preventDefault();
                DenunContainer.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });

            document.getElementById('cancelDenunButton').addEventListener('click', function() {
                DenunContainer.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const openFinalButton = document.getElementById('openFinalButton');
            const FinalContainer = document.getElementById('finalContainer');

            openFinalButton.addEventListener('click', function(e) {
                e.preventDefault();
                FinalContainer.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });

            document.getElementById('cancelFinalButton').addEventListener('click', function() {
                FinalContainer.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });
        });

        //menu flutuante
        function menuflutuante() {
            var menuflu = document.getElementById("menuflu");
            menuflu.classList.toggle('hidden');
        }

        //Chat ao vivo
        $(document).ready(function(){
            run();
        })
            var timerI = null;
            var timerR = false;

            function stop(){
                if(timerR){
                    clearTimeout(timerI);
                    timerR = false;
                }
            }

            function run(){
                stop();
                list();
            }
            function list(){
                $.ajax({
                    url:"../menssagens/<?php print $prop->id; ?>",
                    success: function(textStatus){
                        $("#mensagens").html(textStatus);
                    }
                })
                timerI = setTimeout("list()", 3000);
                timerR = true;
            }

            // Map modal handler for message links
            (function(){
                let map, marker;
                function openChatMap(lat, lon) {
                    const modal = document.getElementById('chatMapModal');
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                    setTimeout(() => {
                        if (!map) {
                            map = L.map('chatMapContainer').setView([lat, lon], 16);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; OpenStreetMap contributors'
                            }).addTo(map);
                            marker = L.marker([lat, lon]).addTo(map);
                        } else {
                            map.setView([lat, lon], 16);
                            if (marker) marker.setLatLng([lat, lon]);
                            else marker = L.marker([lat, lon]).addTo(map);
                        }
                        map.invalidateSize();
                    }, 100);
                }

                function closeChatMap() {
                    const modal = document.getElementById('chatMapModal');
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }

                document.addEventListener('click', function(e){
                    const t = e.target.closest && e.target.closest('.message-map');
                    if (t) {
                        e.preventDefault();
                        const lat = parseFloat(t.dataset.lat);
                        const lon = parseFloat(t.dataset.lon);
                        if (!isNaN(lat) && !isNaN(lon)) openChatMap(lat, lon);
                    }
                });

                document.getElementById('closeChatMap').addEventListener('click', closeChatMap);
                document.getElementById('chatMapModal').addEventListener('click', function(e){
                    if (e.target.id === 'chatMapModal') closeChatMap();
                });

                // Expose to global scope so inline onclick handlers can call them
                window.openChatMap = openChatMap;
                window.closeChatMap = closeChatMap;
            })();
    </script>
</body>

</html>