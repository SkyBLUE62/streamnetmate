fetch('/api/dashboard', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    }
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Erreur lors de la requête');
      }
      return response.json();
    })
    .then(data => {
        let recettes = document.getElementById('recettes');
        let abonnements = document.getElementById('abonnement');
        let users = document.getElementById('users');
        let chaines = document.getElementById('chaines');
        chaines.innerHTML = data.chaines;
        users.innerHTML = data.users;
        abonnements.innerHTML = data.abonnements;
        recettes.innerHTML = data.orders * 3.99 + " $";

    })
    .catch(error => {
      // Gérez les erreurs
      console.error(error);
    });
