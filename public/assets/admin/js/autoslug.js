function generateSlug(name) {
    const slug = name.toLowerCase()
        .replace(/[^\w\s-]/g, '') // Remplacer les caractères spéciaux et non-alphanumériques par des tirets (-)
        .replace(/\s+/g, '-') // Remplacer les espaces par des tirets (-)
        .replace(/\+/g, 'plus')
        .trim(); // Supprimer les espaces en début et fin de chaîne

    return slug;
}

let nom = document.getElementById('nom');
let slug = document.getElementById('slug');
let form = document.getElementById('form');

nom.addEventListener('input', () => {
    slug.setAttribute('value', generateSlug(nom.value));
    slug.value = generateSlug(nom.value);
});