

function getCookie(name) {
    const cookieString = document.cookie;
    const cookies = cookieString.split('; ');

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].split('=');
        if (cookie[0] === name) {
            return cookie[1];
        }
    }

    return null;
}


const token = getCookie('api-token');
console.log(token);

function addFavorite(id) {

    if (token != null) {
        fetch('/api/favorites/create/' + id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json',
            }
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error: ' + response.status);
                }
            })
            .then(data => {
                let star_outline = document.getElementById('star_outline_'+id);
                star_outline.setAttribute('onclick','deleteFavorite(\''+id+'\')');
                star_outline.setAttribute("id", "star_"+id);
                star_outline.classList.remove("mdi-star-outline");
                star_outline.classList.add("mdi-star");
                console.log(data);

            })
            .catch(error => {
                console.log('Error:', error);
            });
    }

}

function deleteFavorite(id) {

    if (token != null) {
        fetch('/api/favorites/delete/' + id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token,
                'Accept': 'application/json',
            }
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error: ' + response.status);
                }
            })
            .then(data => {
                let star = document.getElementById('star_'+id);
                star.classList.remove("mdi-star");
                star.classList.add("mdi-star-outline");
                star.setAttribute('onclick','addFavorite(\''+id+'\')');
                star.setAttribute("id", "star_outline_"+id);
                console.log(data);
            })
            .catch(error => {
                console.log('Error:', error);
            });
    }

}


