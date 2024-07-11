function get(path) {
    /**
     * Substitui o documento pelo retornado pelo get.
     */
    console.log(path)
    const url = path;

    const options = {
        method: 'GET',
        headers: {
            'Content-Type': 'text/html',
        },
    };

    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status}`);
            }
            return response.text();
        })
        .then(data => {
            document.documentElement.innerHTML = data
        })
        .catch(error => {
            console.error('Erro:', error.message);
        });
}