<div id="sidebar" class="fixed z-[60] w-screen h-screen left-0 top-0 translate-x-[-150%] bg-shadowtt"><!-- Dá pra colocar uma animaçaõ legal adicionando "transition-transform duration-500" mas fica meio cagado!-->
    <div id="menu-sidebar" class="drop-shadow-2xl bg-white absolute overflow-hidden duration-300 max-w-96 w-full h-screen">
        <style>
            /* toggle icons for custom checkboxes */
            input[type="checkbox"]+label .checked-icon {
                display: none;
            }

            input[type="checkbox"]:checked+label .checked-icon {
                display: inline-block;
            }

            input[type="checkbox"]+label .unchecked-icon {
                display: inline-block;
            }

            input[type="checkbox"]:checked+label .unchecked-icon {
                display: none;
            }

            /* smooth transitions for panels and chevrons */
            .panel {
                max-height: 0;
                overflow: hidden;
                transition: max-height 260ms ease, opacity 200ms ease;
                opacity: 0;
            }

            .panel.open {
                /* large enough to contain content; will expand to content height up to this */
                max-height: 800px;
                opacity: 1;
            }

            /* make chevrons rotate smoothly */
            #menu-sidebar svg {
                transition: transform 220ms ease;
            }
        </style>
        <div class="bg-bluett border-b border-black w-full h-20 flex justify-center items-center">
            <p class="text-white font-fredokatt drop-shadow-tt text-3xl">Filtros</p>
            <span onclick="sidebartt()" class="absolute cursor-pointer right-5">
                <img src="{{ asset('image/mais.svg') }}" alt="" width="30" class="rotate-45">
            </span>
        </div>


        <div class="flex flex-col justify-between">
            <form action="/filter" method="POST">
                @csrf
                <div>
                    <div class="flex flex-col items-start px-5 text-lg mt-4 text-left border-b border-black pb-4">
                        <div id="toggleCategory" class="flex flex-row items-center gap-1">
                            <p class="font-normal text-xl">Categoria</p>
                            <svg class="flex h-6 w-6 flex flex-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div id="category" class="panel border-b border-black hidden pb-4 mt-4 ps-4">
                        <input class="" type="checkbox" name="categoria[]" value="brinquedo" id="brinquedo" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="brinquedo">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Brinquedo
                        </label>

                        <input class="" type="checkbox" name="categoria[]" value="mobilidade" id="mobilidade" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="mobilidade">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Mobilidade
                        </label>

                        <input class="" type="checkbox" name="categoria[]" value="movel" id="movel" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="movel">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Movel
                        </label>

                        <input class="" type="checkbox" name="categoria[]" value="roupa" id="roupa" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="roupa">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Roupa
                        </label>

                        <input class="" type="checkbox" name="categoria[]" value="outro" id="outro" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg" for="outro">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Outro
                        </label>
                    </div>

                    <div class="flex flex-col items-start px-5 text-lg text-left border-b border-black pb-4 mt-4">
                        <div id="toggleCondition" class="flex flex-row items-center gap-1">
                            <p class="font-normal text-xl">Condição</p>
                            <svg class="flex h-6 w-6 flex flex-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div id="condition" class="panel border-b border-black hidden pb-4 mt-4 ps-4">
                        <input class="" type="checkbox" name="condicao[]" value="novo" id="novo" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="novo">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Novo
                        </label>

                        <input class="" type="checkbox" name="condicao[]" value="seminovo" id="seminovo" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="seminovo">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Seminovo
                        </label>

                        <input class="" type="checkbox" name="condicao[]" value="usado" id="usado" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="usado">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Usado
                        </label>

                    </div>


                    <div class="flex flex-col items-start px-5 text-lg text-left border-b border-black pb-4 mt-4">
                        <div id="toggleLocal" class="flex flex-row items-center gap-1">
                            <p class="font-normal text-xl">Localidade</p>
                            <svg class="flex h-6 w-6 flex flex-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div id="local" class="panel border-b border-black hidden pb-4 mt-4 ps-4">
                        <input class="" type="checkbox" name="local[]" value="minha cidade" id="minha_cidade" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="minha_cidade">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Minha cidade
                        </label>

                        <input class="" type="checkbox" name="local[]" value="meu estado" id="meu_estado" hidden />
                        <label class="flex items-center gap-2 cursor-pointer text-lg mb-3" for="meu_estado">
                            <span class="unchecked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square text-bluett" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <span class="checked-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square text-greentt" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                </svg>
                            </span>
                            Meu estado
                        </label>

                    </div>

                </div>

                <div class="w-full flex flex-wrap absolute bottom-0 left-0 mt-6 mb-4">
                    <div class="flex w-full justify-around mt-4 pb-3">
                        <button type="reset" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-pinktt hover:bg-pinktt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                            Limpar Filtros
                        </button>

                        <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-4 py-2 bg-greentt hover:bg-greentt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                            Aplicar
                        </button>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mapping = [{
                            toggle: document.getElementById('toggleCategory'),
                            panel: document.getElementById('category')
                        },
                        {
                            toggle: document.getElementById('toggleCondition'),
                            panel: document.getElementById('condition')
                        },
                        {
                            toggle: document.getElementById('toggleLocal'),
                            panel: document.getElementById('local')
                        },
                    ];

                    function setSvgRotate(toggleEl, rotate) {
                        if (!toggleEl) return;
                        const svg = toggleEl.querySelector('svg');
                        if (!svg) return;
                        if (rotate) svg.classList.add('rotate-180');
                        else svg.classList.remove('rotate-180');
                    }

                    // initialize svg rotation based on panel visibility
                    mapping.forEach(({
                        toggle,
                        panel
                    }) => {
                        if (!toggle) return;
                        const isOpen = panel && !panel.classList.contains('hidden');
                        setSvgRotate(toggle, isOpen);
                    });

                    mapping.forEach(({
                        toggle,
                        panel
                    }) => {
                        if (!toggle) return;
                        toggle.style.cursor = 'pointer';
                        toggle.addEventListener('click', function(e) {
                            // Close other panels and reset their svg rotation
                            mapping.forEach(m => {
                                if (m.panel && m.panel !== panel) {
                                    m.panel.classList.add('hidden');
                                    setSvgRotate(m.toggle, false);
                                }
                            });
                            // Toggle current panel with animation
                            if (!panel) return;
                            if (panel.classList.contains('hidden')) {
                                openPanel(panel, toggle);
                            } else {
                                closePanel(panel, toggle);
                            }
                        });
                    });

                    function openPanel(panel, toggle) {
                        if (!panel) return;
                        // remove hidden so it can measure and expand
                        panel.classList.remove('hidden');
                        // force a frame then add open to trigger transition
                        requestAnimationFrame(() => panel.classList.add('open'));
                        setSvgRotate(toggle, true);
                    }

                    function closePanel(panel, toggle) {
                        if (!panel) return;
                        // remove open to collapse
                        panel.classList.remove('open');
                        setSvgRotate(toggle, false);
                        // after transition ends, set hidden to remove from flow
                        const onEnd = function(e) {
                            if (e.propertyName === 'max-height') {
                                panel.classList.add('hidden');
                                panel.removeEventListener('transitionend', onEnd);
                            }
                        };
                        panel.addEventListener('transitionend', onEnd);
                        // fallback: if transition doesn't fire, ensure hidden after timeout
                        setTimeout(() => {
                            if (!panel.classList.contains('open')) panel.classList.add('hidden');
                        }, 300);
                    }

                    // Clicking outside the sidebar closes all panels and resets rotation
                    document.addEventListener('click', function(e) {
                        const sidebar = document.getElementById('menu-sidebar');
                        if (!sidebar) return;
                        if (!sidebar.contains(e.target)) {
                            mapping.forEach(m => {
                                if (m.panel) m.panel.classList.add('hidden');
                                if (m.toggle) setSvgRotate(m.toggle, false);
                            });
                        }
                    });
                });
            </script>

        </div>
    </div>
</div>