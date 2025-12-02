@include('sidebar')

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
</style>

<!--sidebar (apenas no celular)-->
<div id="sandwich" class="fixed z-[60] w-screen h-screen left-0 top-0 translate-x-[-150%] bg-shadowtt">
    <div class=" drop-shadow-2xl absolute w-96 overflow-auto h-screen bg-white top-0 left-0 z-[70] duration-300 max-w-96 w-full rounded-lg">
        <div class="bg-bluett border-b border-black w-full h-20 flex place-content-center items-center">
            <p class="h-fit text-white font-fredokatt drop-shadow-tt text-3xl">Menu</p>
            <span onclick="sandwich()" class="absolute cursor-pointer right-5">
                <img src="{{ asset('image/mais.svg') }}" alt="" width="30" class="rotate-45">
            </span>
        </div>
        <div class="flex flex-col ml-6 mt-3 max-w-80">
            <button class="focus:outline-none border-b border-graytt-dark">
                <div id="" class="flex flex-row w-fit items-center mt-5 mb-3" onclick="toggleFiltros()">
                    <svg class="w-8 h-8 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M21 6H19M21 12H16M21 18H16M7 20V13.5612C7 13.3532 7 13.2492 6.97958 13.1497C6.96147 13.0615 6.93151 12.9761 6.89052 12.8958C6.84431 12.8054 6.77934 12.7242 6.64939 12.5617L3.35061 8.43826C3.22066 8.27583 3.15569 8.19461 3.10948 8.10417C3.06849 8.02393 3.03853 7.93852 3.02042 7.85026C3 7.75078 3 7.64677 3 7.43875V5.6C3 5.03995 3 4.75992 3.10899 4.54601C3.20487 4.35785 3.35785 4.20487 3.54601 4.10899C3.75992 4 4.03995 4 4.6 4H13.4C13.9601 4 14.2401 4 14.454 4.10899C14.6422 4.20487 14.7951 4.35785 14.891 4.54601C15 4.75992 15 5.03995 15 5.6V7.43875C15 7.64677 15 7.75078 14.9796 7.85026C14.9615 7.93852 14.9315 8.02393 14.8905 8.10417C14.8443 8.19461 14.7793 8.27583 14.6494 8.43826L11.3506 12.5617C11.2207 12.7242 11.1557 12.8054 11.1095 12.8958C11.0685 12.9761 11.0385 13.0615 11.0204 13.1497C11 13.2492 11 13.3532 11 13.5612V17L7 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span class="truncate underline-animation">Filtros</span>
                    <svg class="flex h-4 w-4 flex flex-row" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
                <form action="/filter" method="POST">
                    @csrf
                    <div id="filtros" class="overflow-hidden duration-300 max-h-0">
                        <div class="flex flex-col items-start px-4 text-lg mt-3 text-left">
                            <p class="font-semibold">Categoria:</p>
                            <input class="" type="checkbox" name="categoria[]" value="brinquedo" id="m_brinquedo" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_brinquedo">
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

                            <input class="" type="checkbox" name="categoria[]" value="mobilidade" id="m_mobilidade" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_mobilidade">
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

                            <input class="" type="checkbox" name="categoria[]" value="movel" id="m_movel" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_movel">
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

                            <input class="" type="checkbox" name="categoria[]" value="roupa" id="m_roupa" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_roupa">
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

                            <input class="" type="checkbox" name="categoria[]" value="outro" id="m_outro" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_outro">
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
                            <hr class="h-px w-full bg-black border-2 border-black mb-4 mt-4">
                        </div>

                        <div class="flex flex-col items-start px-4 text-lg text-left">
                            <p class="font-semibold">Condição:</p>
                            <input class="" type="checkbox" name="condicao[]" value="novo" id="m_novo" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_novo">
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

                            <input class="" type="checkbox" name="condicao[]" value="seminovo" id="m_seminovo" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_seminovo">
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

                            <input class="" type="checkbox" name="condicao[]" value="usado" id="m_usado" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_usado">
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
                            <hr class="h-px w-full bg-black border-2 border-black mb-4 mt-4">
                        </div>


                        <div class="flex flex-col items-start px-4 text-lg text-left mb-5">
                            <p class="font-semibold">Localidade:</p>
                            <input class="" type="checkbox" name="local[]" value="minha cidade" id="m_minha_cidade" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_minha_cidade">
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

                            <input class="" type="checkbox" name="local[]" value="meu estado" id="m_meu_estado" hidden />
                            <label class="flex items-center gap-2 cursor-pointer text-lg mt-1" for="m_meu_estado">
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
                            <hr class="h-px w-full bg-black border-2 border-black mb-2 mt-4">
                        </div>
                        <div class="flex w-full justify-around pb-3">
                            <button type="reset" class="inline-flex items-center justify-center w-fit sm:w-auto px-4 py-2 bg-pinktt hover:bg-pinktt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                                Limpar Filtros
                            </button>
                            <button type="submit" class="inline-flex items-center justify-center w-fit sm:w-auto px-4 py-2 bg-greentt hover:bg-greentt-dark shadow-tt text-white text-xs sm:text-sm md:text-base lg:text-lg font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                                Aplicar
                            </button>
                        </div>
                    </div>
                </form>
            
            <a href="{{ route('meusartigos') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><svg class="h-8 w-8 mr-3" version="1.0" xmlns="http://www.w3.org/2000/svg" width="256.000000pt" height="256.000000pt" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                            <path d="M560 2537 c-51 -27 -90 -90 -90 -145 0 -49 36 -118 71 -139 25 -15 29 -22 24 -43 -4 -14 -6 -54 -6 -90 0 -51 7 -77 31 -126 l31 -63 -68 -68 c-68 -68 -125 -160 -148 -237 -10 -33 -18 -42 -45 -49 -19 -5 -42 -14 -51 -21 -23 -16 -286 -311 -299 -336 -20 -38 -12 -80 24 -116 32 -32 38 -34 105 -34 l71 0 0 -477 c0 -444 2 -481 19 -519 36 -79 -32 -74 1051 -74 1083 0 1015 -5 1051 74 17 38 19 75 19 519 l0 477 71 0 c67 0 73 2 105 34 36 36 44 78 24 116 -21 40 -283 326 -313 343 -17 9 -42 17 -55 17 -20 0 -22 4 -16 23 12 38 7 179 -8 237 -9 32 -12 65 -7 76 4 11 41 49 82 84 111 93 141 160 112 257 -35 117 -174 175 -285 118 -16 -8 -59 -50 -96 -92 -37 -43 -74 -82 -82 -87 -9 -5 -52 -2 -110 9 -83 16 -106 17 -172 6 -41 -7 -84 -13 -95 -14 -35 -4 -28 30 14 68 48 44 65 90 56 151 -11 77 -88 144 -164 144 -46 0 -109 -29 -134 -61 l-22 -28 -65 20 c-91 30 -240 30 -330 1 l-65 -21 -27 30 c-56 61 -135 75 -208 36z m134 -86 c10 -11 25 -35 34 -53 20 -40 33 -40 122 -2 114 48 259 44 378 -11 29 -13 59 -22 68 -18 8 3 22 23 31 45 18 44 38 58 84 58 46 0 79 -34 79 -80 0 -41 -26 -71 -75 -87 -26 -9 -30 -14 -28 -44 1 -19 7 -56 14 -84 17 -72 -6 -146 -67 -214 -25 -28 -49 -51 -53 -51 -4 0 -5 16 -3 36 10 84 -69 187 -165 215 -174 51 -353 -57 -341 -206 2 -25 0 -45 -3 -45 -19 0 -92 91 -109 137 -24 65 -25 107 -4 168 20 60 12 79 -36 94 -22 6 -44 20 -50 31 -17 32 -12 82 12 107 28 30 87 32 112 4z m1516 -156 c36 -18 60 -62 60 -107 0 -28 -13 -45 -99 -128 -112 -107 -124 -134 -101 -222 7 -27 10 -51 8 -53 -2 -2 -82 74 -178 170 -165 165 -171 173 -134 164 21 -5 51 -12 67 -15 53 -12 110 20 178 102 87 104 131 124 199 89z m-367 -403 c228 -228 238 -240 235 -273 l-3 -34 -210 -3 -210 -2 -17 57 c-22 74 -85 172 -155 239 l-55 53 26 53 c14 29 29 67 32 85 6 32 20 41 89 56 11 3 22 5 25 6 3 0 112 -106 243 -237z m-863 149 c0 -30 -4 -40 -20 -44 -23 -6 -28 -45 -8 -65 18 -18 133 -16 148 3 15 19 5 65 -15 65 -11 0 -15 11 -15 40 0 44 7 47 50 25 96 -50 93 -163 -5 -209 -37 -18 -116 -23 -157 -11 -41 13 -86 54 -98 90 -14 44 7 95 53 124 50 32 67 28 67 -18z m-275 -191 c3 -6 -2 -22 -13 -38 -35 -49 -72 -130 -83 -182 l-11 -50 -58 0 -59 0 9 30 c17 59 66 136 123 192 57 57 80 68 92 48z m697 -17 c64 -54 118 -128 148 -202 l20 -51 -59 0 c-59 0 -71 7 -71 45 0 29 -42 126 -75 174 -32 46 -32 57 -3 60 3 1 21 -11 40 -26z m-377 -77 c97 1 131 5 178 22 l58 21 29 -41 c29 -40 70 -135 70 -163 0 -13 -48 -15 -336 -15 l-336 0 7 37 c8 43 37 104 71 150 l24 32 58 -21 c47 -18 79 -22 177 -22z m1313 -417 c82 -92 132 -157 130 -167 -3 -16 -81 -17 -1188 -17 -1115 0 -1185 1 -1188 17 -2 11 46 73 130 167 l133 150 925 0 925 0 133 -150z m-78 -743 c0 -261 -3 -481 -6 -490 -6 -14 -101 -16 -974 -16 -873 0 -968 2 -974 16 -3 9 -6 229 -6 490 l0 474 980 0 980 0 0 -474z" />
                            <path d="M822 2288 c-17 -17 -15 -83 2 -98 42 -34 90 20 70 78 -10 30 -50 4 -72 20z" />
                            <path d="M1162 2288 c-7 -7 -12 -28 -12 -48 0 -41 14 -60 47 -60 26 0 43 27 43 67 0 34 -16 53 -45 53 -12 0 -26 -5 -33 -12z" />
                            <path d="M1649 531 c-23 -18 -24 -25 -24 -145 0 -180 -13 -171 249 -171 203 0 205 0 230 24 25 24 26 28 26 146 0 173 12 165 -252 165 -188 0 -208 -2 -229 -19z m401 -146 l0 -85 -170 0 -170 0 0 85 0 85 170 0 170 0 0 -85z" />
                        </g>
                    </svg>
                    <p class="underline-animation">Meus Artigo</p>
                </ul>
            </a>
            <a href="{{ route('meusacordos') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><svg class="w-8 h-8 mr-3" fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 31.424 31.423" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path d="M29.415,16.271l1.911-4.874c0.198-0.505,0.09-1.063-0.275-1.428l-9.495-9.494c-0.256-0.257-0.602-0.383-0.955-0.373 c-0.26,0.008-0.523,0.09-0.759,0.248l-4.129,2.796l-4.13-2.796c-0.235-0.158-0.5-0.239-0.759-0.248 c-0.354-0.01-0.699,0.116-0.955,0.373L0.373,9.969c-0.365,0.366-0.473,0.923-0.275,1.428l1.911,4.874l-0.768,0.768 c-1.497,1.497-1.663,3.767-0.37,5.059c0.59,0.59,1.404,0.9,2.295,0.873c-0.024,0.859,0.261,1.685,0.869,2.292 c0.59,0.59,1.406,0.899,2.296,0.873c0.182-0.004,0.363-0.023,0.543-0.057c0.073,0.686,0.355,1.328,0.852,1.824 c0.589,0.589,1.405,0.898,2.295,0.873c0.216-0.006,0.433-0.033,0.647-0.078c0.085,0.658,0.364,1.271,0.843,1.75 c0.589,0.588,1.405,0.897,2.297,0.873c0.656-0.021,1.31-0.237,1.901-0.592c0.592,0.354,1.248,0.572,1.904,0.592 c0.891,0.025,1.707-0.284,2.296-0.873c0.479-0.479,0.757-1.092,0.843-1.75c0.214,0.045,0.431,0.072,0.647,0.078 c0.891,0.025,1.705-0.284,2.295-0.873c0.497-0.497,0.777-1.14,0.852-1.824c0.181,0.033,0.361,0.053,0.543,0.057 c0.891,0.026,1.707-0.282,2.296-0.873c0.608-0.608,0.895-1.433,0.869-2.292c0.891,0.027,1.705-0.283,2.295-0.873 c1.293-1.292,1.127-3.562-0.37-5.059L29.415,16.271z M29.558,21.103c-0.353,0.353-0.833,0.516-1.343,0.501 c-0.613-0.019-1.264-0.294-1.783-0.814l-2.681-2.679c-0.092-0.092-0.244-0.089-0.341,0.008c-0.098,0.097-0.103,0.25-0.009,0.342 l2.68,2.681c0.95,0.949,1.089,2.35,0.312,3.126c-0.352,0.353-0.833,0.517-1.342,0.501c-0.613-0.019-1.265-0.294-1.784-0.813 l-2.68-2.68c-0.092-0.092-0.245-0.088-0.342,0.009s-0.102,0.25-0.009,0.342l2.153,2.154c0.95,0.95,1.089,2.349,0.312,3.125 c-0.353,0.353-0.833,0.516-1.342,0.502c-0.613-0.02-1.266-0.294-1.785-0.814l-2.153-2.153c-0.044-0.044-0.104-0.068-0.169-0.067 c-0.065,0.002-0.126,0.029-0.173,0.076c-0.097,0.096-0.101,0.25-0.009,0.342l1.533,1.534c0.95,0.949,1.09,2.349,0.312,3.126 c-0.353,0.352-0.833,0.517-1.342,0.501c-0.613-0.018-1.266-0.294-1.784-0.813l-1.701-1.7l-4.982-4.979l-5.319-5.319l-2.42-6.173 l9.495-9.495l5.807,3.931l5.894,5.894L26.4,15.13l2.846,2.847C30.196,18.925,30.335,20.326,29.558,21.103z"></path>
                            </g>
                        </g>
                    </svg>
                    <p class="underline-animation">Meus Acordos</p>
                </ul>
            </a>
            <a href="{{ route('mep') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><svg class="w-8 h-8 mr-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Communication / Chat_Dots">
                                <path id="Vector" d="M5.59961 19.9203L7.12357 18.7012L7.13478 18.6926C7.45249 18.4384 7.61281 18.3101 7.79168 18.2188C7.95216 18.1368 8.12328 18.0771 8.2998 18.0408C8.49877 18 8.70603 18 9.12207 18H17.8031C18.921 18 19.4806 18 19.908 17.7822C20.2843 17.5905 20.5905 17.2842 20.7822 16.9079C21 16.4805 21 15.9215 21 14.8036V7.19691C21 6.07899 21 5.5192 20.7822 5.0918C20.5905 4.71547 20.2837 4.40973 19.9074 4.21799C19.4796 4 18.9203 4 17.8002 4H6.2002C5.08009 4 4.51962 4 4.0918 4.21799C3.71547 4.40973 3.40973 4.71547 3.21799 5.0918C3 5.51962 3 6.08009 3 7.2002V18.6712C3 19.7369 3 20.2696 3.21846 20.5433C3.40845 20.7813 3.69644 20.9198 4.00098 20.9195C4.35115 20.9191 4.76744 20.5861 5.59961 19.9203Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg>
                    <p class="underline-animation">Mensagens e Propostas</p>
                </ul>
            </a>
            <a href="{{ route('about') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><img src="{{ asset('image/T.svg') }}" class="w-8 h-8 mr-3">
                    <p class="underline-animation">Quem Somos</p>
                </ul>
            </a>
            <!-- Exibir apenas para usuários não autenticados -->
            @guest
            <a href="{{ route('register') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><svg class="w-8 h-8 mr-3" fill="#000000" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                        </g>
                    </svg>
                    <p class="underline-animation">Logar-se ou Cadastrar-se</p>
                </ul>
            </a>
            @endguest
            <!-- Exibir somente para usuários autenticados -->
            @auth
            <a href="{{ route('myaccount') }}">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200"><svg class="w-8 h-8 mr-3" fill="#000000" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                        </g>
                    </svg>
                    <p class="underline-animation">Ver Perfil</p>
                </ul>
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <ul class="w-full border-b border-graytt-dark flex flex-row py-5 items-center hover:bg-gray-200">
                    <svg class="h-8 w-8 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" />
                    </svg>
                    <p class="underline-animation">Sair da Conta</p>
                </ul>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
            @endauth
        </div>
    </div>
</div>

<!--navbar (todo o site em geral
)-->
<nav id="navbar" class="w-full fixed z-40">
    <div class="flex w-full py-2.5 px-7 md:ps-20 md:pe-7 bg-bluett align-item-center place-content-normal md:place-content-evenly items-center">

        <svg xmlns="http://www.w3.org/2000/svg" width="45" fill="currentColor" class="md:hidden block cursor-pointer" viewBox="0 0 16 16" onclick="sandwich()">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
        </svg>

        <a href="{{ route('index') }}" class="m-auto md:m-0">
            <img src="{{ asset('image/logo.png') }}" alt="Logo do TrocaTeca" width="120" class="hidden md:block">
            <img src="{{ asset('image/logo-full.png') }}" alt="Logo do TrocaTeca" width="120" class="md:hidden block">
        </a>
        <form action="{{ route('search') }}" method="get" class="w-96 rounded-full bg-white items-center ps-5 hidden md:flex">
            <input type="text" name="search" id="pesquisa" class="h-10 w-full outline-0 border-0 ring-0">
            <button type="submit" class="flex items-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
        <div class="sm:ml-6 hidden md:block relative">
            <!-- Exibir apenas para usuários não autenticados -->
            @guest
            <p class="">
                <a href="{{ route('login') }}" class="underline-animation font-bold">Logar</a> ou
                <a href="{{ route('register') }}" class="underline-animation font-bold">Cadastrar-se</a>
            </p>
            @endguest

            <!-- Exibir somente para usuários autenticados -->
            @auth
            <p class="relative">
            <div class="w-16 h-16 cursor-pointer" onclick="menupopup()">
                <svg fill="#FFFFFF" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M 27.9999 51.9063 C 41.0546 51.9063 51.9063 41.0781 51.9063 28 C 51.9063 14.9453 41.0312 4.0937 27.9765 4.0937 C 14.8983 4.0937 4.0937 14.9453 4.0937 28 C 4.0937 41.0781 14.9218 51.9063 27.9999 51.9063 Z M 27.9999 35.9922 C 20.9452 35.9922 15.5077 38.5 13.1405 41.3125 C 9.9999 37.7968 8.1014 33.1328 8.1014 28 C 8.1014 16.9609 16.9140 8.0781 27.9765 8.0781 C 39.0155 8.0781 47.8983 16.9609 47.9219 28 C 47.9219 33.1563 46.0234 37.8203 42.8593 41.3359 C 40.4921 38.5234 35.0546 35.9922 27.9999 35.9922 Z M 27.9999 32.0078 C 32.4999 32.0547 36.0390 28.2109 36.0390 23.1719 C 36.0390 18.4375 32.4765 14.5 27.9999 14.5 C 23.4999 14.5 19.9140 18.4375 19.9609 23.1719 C 19.9843 28.2109 23.4765 31.9609 27.9999 32.0078 Z"></path>
                    </g>
                </svg>
                <!-- Menu Pop-up -->
                <div id="menupop" class="flex flex-col absolute hidden justify-center bg-bluett w-56 px-3 py-2 z-50 bottom-[-150px] left-[-190px] border-black border rounded-b-lg rounded-l-lg">
                    <button id="openProfileButton" type="button" class="mb-3 p-3 bg-white border-black border rounded-xl hover:bg-graytt-light text-black text-md font-medium rounded-2xl">
                        Ver Perfil
                    </button>
                    <button id="openLogoutButton" type="button" class="bg-white p-3 border-black border rounded-xl hover:bg-graytt-light text-black text-md font-medium rounded-2xl">
                        Sair da conta
                    </button>
                </div>

                <!-- Logout Form -->
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
            </div>
            <!-- Ou qualquer outra informação que você deseja mostrar para usuários autenticados -->
            </p>
            @endauth
        </div>

    </div>
    <div class="flex place-content-evenly w-full p-2 border-b h-10 items-center border-black bg-white">

        <ul class="md:underline-animation hidden md:block cursor-pointer" onclick="sidebartt()">Filtros</ul>
        <ul class="md:underline-animation hidden md:block"><a href="{{ route('meusartigos') }}">Meus Artigos</a></ul>
        <ul class="md:underline-animation hidden md:block"><a href="{{ route('meusacordos') }}">Meus Acordos</a></ul>
        <ul class="md:underline-animation hidden md:block"><a href="{{ route('mep') }}">Mensagens e Propostas</a></ul>
        <ul class="md:underline-animation hidden md:block"><a href="{{ route('about') }}">Quem Somos</a></ul>

        <form action="{{ route('search') }}" method="get" class="md:hidden">
            <div class="w-96 rounded-full flex bg-white items-center ps-5 md:hidden border-2 h-8">
                <input type="text" name="search" onsubmit="event.preventDefault(); document.getElementById('searchbar').submit();" id="pesquisa" class="h-7 w-full outline-0">
                <button>
                    <span class="flex items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </button>
            </div>
        </form>

    </div>
</nav>

<div id="pt-navbar"></div>

<script>
    var pt_navbar = document.getElementById("pt-navbar");
    var navbar = document.getElementById('navbar');

    pt_navbar.style.paddingTop = navbar.offsetHeight + "px";

    window.addEventListener('resize', screenResize);

    window.onload = function() {
        screenResize()
    }

    function sidebartt() {
        document.body.classList.toggle('overflow-hidden');
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('translate-x-[-150%]');
    }

    function sandwich() {
        document.body.classList.toggle('overflow-hidden');
        var sandwich = document.getElementById('sandwich');
        sandwich.classList.toggle('translate-x-[-150%]');
    }

    function screenResize() {
        pt_navbar.style.paddingTop = navbar.offsetHeight + "px";
    }

    //menu flutuante
    function menupopup() {
        var menupop = document.getElementById("menupop");
        menupop.classList.toggle('hidden');
    }

    //menupop
    document.getElementById('openProfileButton').addEventListener('click', function() {
        window.location.href = '{{ url("/myaccount") }}';
    });

    document.getElementById('openLogoutButton').addEventListener('click', function() {
        if (confirm('Você tem certeza que deseja sair?')) {
            document.getElementById('logout-form').submit();
        }
    });

    function toggleFiltros() {
        var filter = document.getElementById('filtros');

        filter.classList.toggle('max-h-fit');
        filter.classList.toggle('max-h-0');
    };
</script>