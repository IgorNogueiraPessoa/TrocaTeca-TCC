<!--Modal de qrcode anúncio-->
<div id="modalqrcode" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-8">
        
            <div class="w-full max-w-lg rounded-3xl bg-bluett p-6 sm:p-8 shadow-2xl">
                <h1 class="text-2xl sm:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt">QrCode</h1>

                <div class="sm:col-span-2 mt-6 flex flex-col justify-center items-center">
                    <div>
                        <img src="{{ $arc->qr_code }}" alt="QrCode para validação de troca">
                    </div>
                    
                    <p class="text-center">Quando você encontrar com o outro usuário, peça para que ele leia o QrCode, assim finalizando a troca</p>
                </div>

                <!-- Botões de confirmação -->
                <div class="mt-4 flex flex-col sm:flex-row gap-4 sm:gap-8 justify-center">
                    <button id="cancel" onclick="closeQrcodeModal()" class="inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-greentt hover:bg-greentt-dark text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-300">
                        Ok
                    </button>
                </div>
            </div>
        </div>
</div>    

<script>
    const modal = document.getElementById('modalqrcode');

    function closeQrcodeModal(){
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    };
</script>