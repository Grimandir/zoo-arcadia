$(document).ready(function() {
    // Animation de défilement pour la navigation entre les sections
    $('a.nav-link').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        }
    });

    // Afficher un message de confirmation pour les actions de modification et de suppression
    $('.btn-danger').on('click', function(event) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
            event.preventDefault();
        }
    });

    // Afficher les formulaires dynamiquement
    $('form[action*="add_"], form[action*="edit_"]').hide();
    $('button[data-toggle="form"]').on('click', function() {
        var target = $(this).data('target');
        $(target).toggle();
    });
});

