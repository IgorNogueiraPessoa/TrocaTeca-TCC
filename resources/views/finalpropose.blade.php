@vite('resources/css/app.css')

<!--Modal de nova proposta-->
<div id="finalContainer" class="fixed z-[60] w-screen h-screen left-0 top-0 hidden bg-shadowtt">
  @foreach($propostas as $prop)
  <form action="/acordo/create/{{ $prop->id }}" method="post" enctype="multipart/form-data">
    @endforeach
    @csrf
    <div class="fixed inset-0 flex items-center justify-center p-4 sm:p-8">
      <div class="w-full max-w-4xl rounded-3xl bg-bluett p-6 sm:p-8 shadow-2xl">
        <h1 class="text-2xl sm:text-4xl font-bold text-center text-white font-fredokatt drop-shadow-tt">Proposta Final</h1> <!--Título de aviso-->

        <!--Foto do Artigo-->
        <div class="flex flex-col sm:flex-row sm:items-center sm:place-content-center">
          <div>
            <p class="block text-sm font-semibold leading-6 text-white mt-6">Foto do Artigo:</p>

            <label for="imagem-final">
              <div class="add-img-final bg-white w-full sm:h-72 sm:w-72 t-2 mr-8 rounded-xl border border-graytt-light shadow-tt flex flex-col flex-wrap justify-center items-center">
                <img src="" class="hidden h-full object-cover">
                <div class="placeholder-img mt-2 mb-2 flex flex-col justify-center items-center transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-[1.05] duration-300">
                  <img src="{{asset('image/mais.svg')}}" alt="" width="100">
                  <p class="text-graytt text-xs text-center mt-2">Foto do artigo (Obrigatório)</p>
                </div>
              </div>
            </label>
            <input type="file" name="imagem_final" id="imagem-final" class="hidden" accept="image/*" required>
          </div>

          <div class="w-full">
            <!--Nome do artigo-->
            <label for="nome_art_fi" class="block text-sm font-semibold leading-6 text-white mt-4">Nome do Artigo:</label>
            <input type="text" name="nome_art_fi" id="nome_art_fi" autocomplete="organization" required class="shadow-tt block w-full rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">


            <!--Categoria-->
            <label for="catepropo_fi" class="block text-sm font-semibold leading-6 text-white mt-4">Categoria:</label>
            <div class="inset-y-0 left-0 flex items-center">
              <select id="catepropo_fi" name="catepropo_fi" required class="custom-select shadow-tt block w-48 rounded-xl border border-graytt-light px-3.5 py-2 text-graytt-dark  shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="" disabled selected>Selecionar</option>
                <option value="Brinquedo">Brinquedo</option>
                <option value="Mobilidade">Mobilidade</option>
                <option value="Móvel">Móvel</option>
                <option value="Roupa">Roupa</option>
                <option value="Outro">Outro</option>
              </select>
            </div>

            <!--data de recebimento-->
            <label for="datae_fi" class="block text-sm font-semibold leading-6 text-white mt-4">Data de Recebimento:</label>
            <input type="date" name="datae_fi" id="datae_fi" autocomplete="organization" required class="shadow-tt block w-48 rounded-xl border text-graytt-dark  border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">


            <!--Ponto de encontro-->
            <label for="pontoe_fi" class="block text-sm font-semibold leading-6 text-white mt-4">Ponto de Encontro:</label>
            <div class="relative">
              <input type="text" name="pontoe_fi" id="pontoe_fi" autocomplete="organization" required class="shadow-tt block w-full md:w-80 rounded-xl border border-graytt-light px-3.5 py-2 shadow-sm ring-1 border border-graytt ring-inset ring-graytt placeholder:text-graytt-dark focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
              <input type="hidden" name="pontoe_place_id" id="pontoe_place_id">
              <input type="hidden" name="pontoe_lat" id="pontoe_lat">
              <input type="hidden" name="pontoe_lon" id="pontoe_lon">
              <div id="pontoe_suggestions" class="absolute left-0 right-0 mt-1 z-40 bg-white rounded-lg shadow-tt max-h-40 overflow-auto hidden"></div>
            </div>
          </div>
        </div>

        <!--botões de confirmação-->
        <div class="mt-4 flex gap-3 justify-end">
          <button type="button" id="cancelFinalButton" class="inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-pinktt hover:bg-pinktt-dark text-white text-sm font-medium rounded-2xl mr-5 transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-110 duration-300">
            Cancelar
          </button>

          <button type="submit" class="mr-3 inline-flex items-center px-4 py-2 justify-center w-full sm:w-auto shadow-tt bg-greentt hover:bg-greentt-dark text-white text-sm font-medium rounded-2xl transition ease-in-out delay-100  hover:-translate-y-1 hover:scale-110 duration-300">
            Confirmar
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

<script lang="Javascript">
  let paiimg2 = '.add-img-final';
  let img2 = document.querySelector(paiimg2 + ' img');
  let placeholder2 = document.querySelector(paiimg2 + ' .placeholder-img');
  let inputArquivo2 = document.querySelector("#imagem-final");

  inputArquivo2.onchange = function() { //Função para atualizar a interface do usuário quando um arquivo é selecionado.

    if (inputArquivo2.files.length > 0) { //Verifica se há um arquivo selecionado.
      img2.src = URL.createObjectURL(inputArquivo2.files[0]); // Cria uma URL temporária para o arquivo selecionado e atualiza a imagem.
      img2.classList.remove('hidden');

      placeholder2.classList.add('hidden');
    }

  };

  const requestOptions = {
    method: "GET",
    redirect: "follow"
  };

  // Using Photon (no API key required) for free autocomplete

  // Autocomplete logic for #pontoe_fi using Mapbox Geocoding API
  (function() {
    const input = document.getElementById('pontoe_fi');
    const suggestions = document.getElementById('pontoe_suggestions');
    const placeIdInput = document.getElementById('pontoe_place_id');
    let debounceTimer = null;

    function clearSuggestions() {
      suggestions.innerHTML = '';
      suggestions.classList.add('hidden');
    }

    function renderSuggestions(items) {
      suggestions.innerHTML = '';
      if (!items || items.length === 0) {
        clearSuggestions();
        return;
      }
      items.forEach(item => {
        const el = document.createElement('div');
        el.className = 'p-2 hover:bg-gray-100 cursor-pointer text-sm';
        el.textContent = item.description || item.label || item.formatted_address || item.place_name || '';
        el.dataset.placeId = item.place_id || item.placeId || '';
        if (item.lat) el.dataset.lat = item.lat;
        if (item.lon) el.dataset.lon = item.lon;
        el.addEventListener('click', () => {
          input.value = el.textContent;
          if (placeIdInput) placeIdInput.value = el.dataset.placeId;
          const latInput = document.getElementById('pontoe_lat');
          const lonInput = document.getElementById('pontoe_lon');
          if (latInput && el.dataset.lat) latInput.value = el.dataset.lat;
          if (lonInput && el.dataset.lon) lonInput.value = el.dataset.lon;
          clearSuggestions();
        });
        suggestions.appendChild(el);
      });
      suggestions.classList.remove('hidden');
    }

    async function fetchSuggestions(q) {
      if (!q || q.length < 2) {
        clearSuggestions();
        return;
      }

      // Photon (komoot) public API - free, based on OpenStreetMap
      const url = `https://photon.komoot.io/api/?q=${encodeURIComponent(q)}&limit=6`;
      try {
        const res = await fetch(url, requestOptions);
        if (!res.ok) {
          const errText = await res.text().catch(() => '(no body)');
          console.error('Photon request failed', res.status, errText, url);
          clearSuggestions();
          return;
        }
        const data = await res.json();
        let features = data.features || [];
        // Filter to Brazil and prefer street/neighbourhood types
        features = features.filter(f => {
          const p = f.properties || {};
          const country = (p.country || '').toString().toLowerCase();
          const countryCode = (p.countrycode || p.country_code || '').toString().toLowerCase();
          const isBrazil = country.includes('brazil') || countryCode === 'br';

          const osmKey = (p.osm_key || '').toString().toLowerCase();
          const osmValue = (p.osm_value || '').toString().toLowerCase();
          const usefulTypes = ['street', 'road', 'residential', 'neighbourhood', 'suburb', 'quarter', 'locality', 'village', 'hamlet'];
          const isUsefulType = usefulTypes.some(t => osmValue.includes(t) || osmKey.includes(t));

          const hasCityOrState = !!(p.city || p.state || p.county || p.suburb || p.road || p.street);

          return isBrazil && (isUsefulType || hasCityOrState);
        });

        const items = features.map(f => {
          const p = f.properties || {};
          const parts = [];
          if (p.name) parts.push(p.name);
          if (p.road) parts.push(p.road);
          if (p.suburb) parts.push(p.suburb);
          if (p.city) parts.push(p.city);
          if (p.state) parts.push(p.state);
          if (p.country) parts.push(p.country);
          const desc = parts.filter(Boolean).join(', ');
          const placeId = (p.osm_type && p.osm_id) ? `${p.osm_type}:${p.osm_id}` : (f.id || p.id || '');
          const coords = (f.geometry && Array.isArray(f.geometry.coordinates)) ? f.geometry.coordinates : null; // [lon, lat]
          return {
            description: desc || p.label || p.name || '',
            place_id: placeId,
            lon: coords ? coords[0] : null,
            lat: coords ? coords[1] : null
          };
        });
        renderSuggestions(items);
      } catch (e) {
        console.error('Autocomplete error', e);
        clearSuggestions();
      }
    }

    input.addEventListener('input', (ev) => {
      const q = ev.target.value;
      if (placeIdInput) placeIdInput.value = '';
      if (debounceTimer) clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => fetchSuggestions(q), 300);
    });

    // Close suggestions when clicking outside
    document.addEventListener('click', (ev) => {
      if (!suggestions.contains(ev.target) && ev.target !== input) {
        clearSuggestions();
      }
    });
  })();
</script>