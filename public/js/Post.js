function post(path, data) {
    /**
     * path desde a raiz do server (começado por '/')
     */
    const url = path;

    const data = data;

    const options = {
        method: 'POST',
        body: JSON.stringify(data),
    };

    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na requisição: ${response.status}`);
            }
        })
        .catch(error => {
            console.error('Erro:', error.message);
        });
    
}