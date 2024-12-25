if (localStorage.getItem('id') === null) {
	let url = window.location.protocol + '//' + window.location.hostname + '/profile'
	fetch(url, {
		method: 'POST',
		headers: {
		  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		  'Accept': 'application/json' // Se você espera receber JSON
		  }
	  })
		.then(response => {
		  if (!response.ok) {
			throw new Error(`Erro na requisição: ${response.status}`);
		  }
		  return response.json(); // Converte a resposta para JSON
		})
		.then(data => {
			console.log(data)
		  localStorage.setItem('id', data['id']);
	  })
		.catch(error => {
		  document.body.innerHTML = error
		  console.error('Erro na requisição:', error);
		});
}