document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('nome_cliente_search');
    const hiddenIdInput = document.getElementById('customer_id');
    const resultsDiv = document.getElementById('customer_list');

    searchInput.addEventListener('input', function() {
        let query = this.value;
        
        // Se o campo não tiver nada, limpa a lista
        if (query.length < 2) {
            resultsDiv.style.display = 'none';
            return;
        }

        // Faz a requisição para a rota que criamos
        fetch('/search-customers?term=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                resultsDiv.innerHTML = '';
                
                if (data.length > 0) {
                    resultsDiv.style.display = 'block';
                    data.forEach(customer => {
                        // Cria um item na lista de resultados
                        let divItem = document.createElement('a');
                        divItem.className = 'list-group-item list-group-item-action';
                        divItem.innerText = customer.name;
                        divItem.style.cursor = 'pointer';
                        
                        // Ao clicar no item...
                        divItem.onclick = function() {
                            // Preenche o input visível
                            searchInput.value = customer.name;
                            // Preenche o input oculto com o ID real
                            hiddenIdInput.value = customer.id;
                            // Esconde a lista
                            resultsDiv.style.display = 'none';
                        };
                        
                        resultsDiv.appendChild(divItem);
                    });
                } else {
                    resultsDiv.style.display = 'none';
                }
            })
            .catch(error => console.error('Erro ao buscar clientes:', error));
    });

    // Esconde a lista se o usuário clicar fora
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#nome_cliente_search') && !e.target.closest('#customer_list')) {
            resultsDiv.style.display = 'none';
        }
    });
});