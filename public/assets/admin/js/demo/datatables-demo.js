$(document).ready(function() {
    var dataTable = $('#dataTable').DataTable({
      searching: false,   // Désactiver la barre de recherche
      paging: true,       // Activer la pagination
      dom: '<"pagination-left"l>ftr<"clear">',  // Définir le positionnement de la pagination
      language: {
        paginate: {
          previous: "&#8592;",  // Personnaliser le texte pour le bouton précédent
          next: "&#8594;"       // Personnaliser le texte pour le bouton suivant
        }
      }
    });

    dataTable.on('init', function() {
      $('#dataTable tfoot').hide(); // Masquer le tfoot après l'initialisation du DataTable
    });
  });
