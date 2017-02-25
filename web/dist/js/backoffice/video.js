
/**
 * Created by Charlie on 26/02/2017.
 */
$(document).ready(listener());

//On initialise la variable tabStars
var tabVideo = '';

function listener() {

    //Si on clique sur la poubelle, on appelle la fonction supprimerStarAjax
    $(document).on('click', '.supprimerVideo', function () {
        if(confirm('Voulez-vous vraiment supprimer cette ligne ?')) supprimerVideoAjax($(this));
    });

    $(document).on('focusout', '.inputVideo td input', modifierStarAjax);

    $(document).on('dblclick', '.inputVideo td input', function () {
        $(this).prop('readonly', '');
    });

}


function modifierStarAjax() {
    $.ajax({
        url: Routing.generate('updateVideoAjax'),
        data: {
            id: $(this).data('id'),
            type: $(this).data('type'),
            value: $(this).val()
        },
        dataType: 'json',
        success: updateDeLaLigneDuTableauVideo
    });

}

function supprimerVideoAjax(e) {

    $.ajax({
        url: Routing.generate('deleteVideoAjax'),
        data: {
            id: e.data('id')
        },
        dataType: 'json',
        success: suppressionDeLaLigneDuTableauVideo
    })
}

//Si tout se passe bien, on va supprimer la ligne du tableau correspondante
function suppressionDeLaLigneDuTableauVideo(id) {
    $('.ligne' + id).fadeOut("speed", function() {
        $(this).remove();
    });
    //On remplace la listes par une nouvelle qui contient les stars correspondantes
}

function updateDeLaLigneDuTableauVideo(id) {
    $('.ligne' + id).css({
        backgroundColor: "#00FF00",
        transition: 'color 1s ease-in',
        '-webkit-transition' : 'color 1s ease-in'
    });

    //Pensez à faire l'update du typesearch

    setTimeout(function(){
        $('.ligne' + id).css("backgroundColor", "#FFF");
    }, 1000);
}


