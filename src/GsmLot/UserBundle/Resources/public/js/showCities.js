function showCities() {
    var id_country = $('#fos_user_registration_form_trader_country').val();
    $.ajax({
        url: Routing.generate('show_cities'),
        type: 'POST',
        data: {'id_country': id_country},
        dataType: 'json',
        success: function (json) { // quand la réponse de la requete arrive
            // alert('ca marche  : '+ id_country);
            $('#fos_user_registration_form_trader_city').html('');
            $.each(json, function (index, value) { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"
                $('#fos_user_registration_form_trader_city').append('<option value="' + value.id + '">' + value.nom + '</option>');
            });
        }
    });
}