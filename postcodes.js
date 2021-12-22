function formatResult(state) {
    let state1 = state.properties;
    return '<div>' + state1.city + ' - ' + state1.postcode + ' - ' + state1.name + ' - ' + state1.context + '</div>';
}

function formatSelection(state) {
    let state1 = state.properties;
    return '<div>' + state1.city + ' / ' + state1.postcode + ' / ' + state1.name + ' / ' + state1.context + '</div>';
}

function formatNoResult() {
    return 'Aucun Résultat';
}

function formatRecherche() {
    return 'Rechercher une adresse , une ville ou un code postal';
}

function formatAjaxErreur() {
    return 'Erreur de chargement des données';
}

function formatInputSearch() {
    return 'Entrer une ville ou un code postal';
}

function zipcodes_addOnChange_fr(blockId) {
    cj('#zipcode_lookup').change(function (e) {
        zipcodes_fill_fr(blockId);
    });
}

function functionId(state) {
    let state1 = state.properties;
    return state1.city + ' / ' + state1.postcode + ' / ' + state1.name + ' / ' + state1.context + ' / ' + state1.x + ' / ' + state1.y; 
}

function zipcodes_fill_fr(blockId) {
    var zipcode = cj('#zipcode_lookup').val();
    console.log(zipcode);
    const words = zipcode.split("/");
    let ville = words[0].trim();
    let codePost = words[2].trim();
    if (ville == codePost) {
        cj('#address_' + blockId + '_street_address').val("");
    }else{
        cj('#address_' + blockId + '_street_address').val(words[2]);
    }
    cj('#address_' + blockId + '_postal_code').val(words[1]);
    cj('#address_' + blockId + '_city').val(words[0]);
}

function init_postcodeBlock_fr(blockId, address_table_id) {
    var city_field_td = cj(address_table_id + ' #address_'+blockId+'_city').parent();
    var postalcode_field_td = cj(address_table_id + ' #address_'+blockId+'_postal_code').parent();
    city_field_td.parent().prepend(postalcode_field_td);
    var first_row = city_field_td.parent().parent().parent().parent().parent();
    first_row.before(zipcodes_getRowHtml_fr(blockId));
    
    /*---Barre de recherche ---*/
    cj('#zipcode_lookup').select2({
        minimumInputLength: 2,
        placeholder: 'Un code postal ou une ville',
        theme: "classic",
        closeOnSelect: true,
        multiple: false,
        ajax: {
            dataType: 'json',
            quietMillis: 250,
            cache: true,
            url: function (term) {
                let baseUrl = "https://api-adresse.data.gouv.fr/search/"
                let queryUrl = baseUrl +"?q=" + term + "&autocomplete=1";
                return queryUrl; 
            },
            data: function (term, page) {
                return {
                    q: term,
                    page: page 
                };
            },
            results: function (data) {
                var data1 = data.features;
                data1.forEach(obj => {
                    Object.entries(obj).forEach(([key, value]) => {
                        //console.log(obj.properties);
                    });
                });
                let data2 = data1;
                return { results: data2 }
            },
            
        },
        formatSearching	: formatRecherche,
        /** formatResult : Option pour le rendue des resultat */
        formatResult: formatResult,
        /** formatSelection : Option pour voir le resultat sélectionner */
        formatSelection: formatSelection,
        formatNoMatches: formatNoResult,
        formatAjaxError: formatAjaxErreur,
        formatInputTooShort: formatInputSearch,
        dropdownCssClass: "bigdrop",
        /** Id : option OBLIGATOIRE pour pouvoir selectionner une valeur  */
        id: functionId,
        escapeMarkup: function (html) { return html; },
        
    });
    zipcodes_addOnChange_fr(blockId);

     /*----- affichage de la section déroulante ---*/
    
    cj('#address_' + blockId + '_country_id').change(function(e) {
        var housenr_td = cj('#address_'+blockId+'_street_number').parent();
        var street_name_td = cj('#address_'+blockId+'_street_name').parent();
        if ((cj('#address_' + blockId + '_country_id').val()) == 1076) {
            if (typeof processAddressFields == 'function' && cj('#addressElements_'+blockId).length < 0) {
                processAddressFields('addressElements', blockId, 1);
                cj('#addressElements_' + blockId).show();
                cj('#streetAddress_' + blockId).hide();
            }
            cj(street_name_td).after(cj(housenr_td));
            cj('#zipcodes_input_row_'+blockId).removeClass('hiddenElement');
        } else {
            cj(housenr_td).after(cj(street_name_td));
            cj('#zipcodes_input_row_'+blockId).addClass('hiddenElement');
        }
    });

    cj('#address_' + blockId + '_country_id').trigger('change');
}

function zipcodes_getRowHtml_fr(blockId) {
    var html = '<tr class="zipcodes_input_row" id="zipcodes_input_row_'+blockId+'">';
    html = html + '<td>';
    html = html + 'Recherche de Codes Postaux et villes francaises<br>';
    html = html + '<input id="zipcode_lookup" style="width:100%" type="text">';
    html = html + '</td>';
    html = html + '</tr>';
    return html;
}

function zipcodes_reset() {
    cj('.zipcodes_input_row').remove();
}