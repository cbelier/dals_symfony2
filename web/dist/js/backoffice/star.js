/**
 * Created by Charlie on 22/02/2017.
 */
$(document).ready(listener());

//On initialise la variable tabStars
var tabStars = '';

function listener() {

    //Si on clique sur le bouton ajouté, on appelle la fonction ajoutStarAjax
    $('.insertionStar').on('click', function(){
        if ($('#Appbundle_Celebrity_lastNameCelebrity').val()=="" && $('#Appbundle_Celebrity_firstNameCelebrity').val()==""){
            alert("Les champs sont vides");
        }
        else {
            ajoutStarAjax($(this));
        }
    });

    //Si on clique sur la poubelle, on appelle la fonction supprimerStarAjax
    $(document).on('click', '.supprimerStar', function () {
        if(confirm('Voulez-vous vraiment supprimer cette ligne ?')) supprimerStarAjax($(this));
    });

    $(document).on('focusout', '.inputStar td input', modifierStarAjax);

    $(document).on('dblclick', '.inputStar td input', function () {
        $(this).prop('readonly', '');
    });

}

function ajoutStarAjax() {

    //On récupère les sélecteurs des inputs
    var lastNameSelector = $('#Appbundle_Celebrity_lastNameCelebrity');
    var firstNameSelector = $('#Appbundle_Celebrity_firstNameCelebrity');

    //On attribut leur valeur
    var lastName = lastNameSelector.val();
    var firstName = firstNameSelector.val();

    lastNameSelector.val('');
    firstNameSelector.val('');

    $.ajax({
        url: Routing.generate('createStarAjax'),
        data: {
            firstName: firstName,
            lastName: lastName
        },
        dataType: 'json',
        success: ajouterUneLigneDuTableauStar
    })
}

function modifierStarAjax() {
    $.ajax({
        url: Routing.generate('updateStarAjax'),
        data: {
            id: $(this).data('id'),
            type: $(this).data('type'),
            value: $(this).val()
        },
        dataType: 'json',
        success: updateDeLaLigneDuTableauStar
    });

}

function supprimerStarAjax(e) {

    $.ajax({
        url: Routing.generate('deleteStarAjax'),
        data: {
            id: e.data('id')
        },
        dataType: 'json',
        success: suppressionDeLaLigneDuTableauStar
    })
}

//Si tout se passe bien, on va supprimer la ligne du tableau correspondante
function suppressionDeLaLigneDuTableauStar(id) {
    $('.ligne' + id).fadeOut("speed", function() {
        $(this).remove();
    });
    //On remplace la listes par une nouvelle qui contient les stars correspondantes
}

function updateDeLaLigneDuTableauStar(id) {
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

//Si tout se passe bien, on va créer une listgroup
function ajouterUneLigneDuTableauStar(value) {

    tabStars = '<tr class="inputStar ligne' + value.id + '"><td>' + value.id + '</td>';

    tabStars += '<td data-search="' + value.lastnameCelebrity +'"><input type="text" data-id="' + value.id + '" data-type="lastName" value="' + value.lastnameCelebrity + '" readonly="true"></td>';

    tabStars += '<td data-search="' + value.firstnameCelebrity +'"><input type="text" data-id="' + value.id + '" data-type="firstName" value="' + value.firstnameCelebrity + '" readonly="true"></td>';

    tabStars += '<td class="supprimerStar" data-id="' + value.id + '"><i class="fa fa-trash-o" aria-hidden="true"></i></td></tr>';


    $('.tableBodyStar').append(tabStars).hide().fadeIn(2000);
    //On remplace la listes par une nouvelle qui contient les stars correspondantes


}

