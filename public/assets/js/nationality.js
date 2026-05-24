const selectPais = document.getElementById('pais');

fetch('https://restcountries.com/v3.1/all')
    .then(response => response.json())
    .then(data => {
        // Ordena por nome
        data.sort((a, b) => a.name.common.localeCompare(b.name.common));

        // Limpa o select (Mantendo a opção "Selecione")
        selectPais.innerHTML = '<option value="" disabled selected>Selecione o seu país</option>';

        data.forEach(pais => {
            const option = document.createElement('option');
            // CORREÇÃO: Use cca2 (código ISO) para o valor, não 'n'
            option.value = pais.cca2; 
            // Opcional: Adicionar o código ao lado do nome (ex: Portugal (PT))
            option.textContent = `${pais.name.common} (${pais.cca2})`;
            selectPais.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Erro ao carregar os países:', error);
        selectPais.innerHTML = '<option value="">Erro ao carregar países</option>';
    });
