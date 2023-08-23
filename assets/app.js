/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';


const $ = require('jquery');
global.$ = global.jQuery = $;


$(function () {
    const listeg = document.querySelectorAll('.map__image g');
    // lorsqu'on survol
    $('.map__image g').on('mouseover ', function () {
        var image = this;

        listeg.forEach(element => {
            element.classList.remove('ghover');
        });
        image.classList.add('ghover');
    });
    /* Lorsqu'on clique sur une commune , un popup nous affiche les information concernant cette commune */
    $('.map__image g').on('click ', function () {
        var titre = $(this).attr('id');

        const cliquer = this;
        var urll = "/services/datas/commune/" + titre;
        $.ajax({
            type: "post",
            url: urll,
            data: {
                "id": titre
            }
        }).done(function (data) {

            if (data.code == 200) {

                listeg.forEach(element => {
                    element.classList.remove('gclick');
                });
                cliquer.classList.add('gclick');
                //on cherche la zone de contenu
                const content = document.querySelector('#variable');
                //on recupere le input ajaxx
                content.innerHTML = data.content;
            }
        })

    });


    /* creation de la fonction qui affiche les date_ech en fonction de la date_run */
    $('#daterun').on('change', function () {
        var id = $(this).val();

        $.ajax({
            type: "post",
            url: "/services/lesdates",
            data: {
                "daterunid": id
            }
        }).done(function (data) {
            if (data.code == 400) {
                alert("Veuillez choisir une date_run valide");
                $('#dateech').empty().append('<option >Selectionnez une date_run</option>');

            }
            if (data.code == 200) {
                $('#dateech').empty();
                // tableau des date_ech correspondant  à la date run choisie
                var liste = data.dateech;
                //on parcourt notre liste et on les ajoute à notre Select option
                for (const [key, value] of Object.entries(liste)) {
                    $('#dateech').append('<option value="' + key + '"> ' + value + '</option>');
                }

            }
        })
    });

    const liste = document.querySelectorAll('g');
    /* Actualisation des données en fonction du formulaire */
    $('#form').on('submit', function (e) {
        e.preventDefault();
        var choix = $('#choix_souhait').val();
        var daterun = $('#daterun').val();
        var dateech = $('#dateech').val();
        $.ajax({
            type: "post",
            url: "/services/misajour",
            data: {
                "choix": choix,
                "daterun": daterun,
                "dateech": dateech
            }
        }).done(function (data) {
            if (data.code == 400) {
                alert("Veuillez remplir tous les champs");
            }
            if (data.code == 200) {
                liste.forEach(element => {
                    element.classList.remove('gclick');
                });
                for (const [key, value] of Object.entries(liste)) {
                    for (const [kc, vc] of Object.entries(data.couleurs)) {
                        if (kc == key) {
                            value.style.fill = vc;
                        }
                    }
                }

                //on cherche la zone de contenu
                const content = document.querySelector('#variable');
                //on recupere le input ajaxx
                content.innerHTML = data.content;
            }
        })

    })

});