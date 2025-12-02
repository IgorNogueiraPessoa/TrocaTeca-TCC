<!-- Map modal for messages -->
    <div id="chatMapModal" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
        <div class="fixed z-50 inset-0 flex items-center justify-center p-2 sm:p-4 md:p-6 lg:p-8">
            <div class="relative w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-3xl bg-bluett p-6 md:p-8 shadow-2xl">
                <div>    
                    <div class="flex mb-5">
                        <h1 class="text-2xl sm:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt">{{ $prop->acordo->local_encontro }}</h1>

                        <button id="closeChatMap" class="absolute top-2 right-2 rotate-45">
                            <img src="{{ asset('image/mais.svg') }}" alt="" width="30">
                        </button>
                    </div>
                    <div>
                        <div id="chatMapContainer" class="rounded-sm" style="height:400px;width:100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>