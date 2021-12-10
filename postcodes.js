function formatResult(state) {
    console.log(state);
    console.log(state.code_postal);
    console.log(state.nom_de_la_commune);
    return '<option value='+ state.code_postal + ' - ' + state.nom_de_la_commune + '>'+ state.code_postal + ' - ' + state.nom_de_la_commune + '</option>';
    //return state.code_postal + ' - ' + state.nom_de_la_commune;

}

function formatSelct(state) {
    console.log(state.code_postal);
    console.log(state.nom_de_la_commune);
    return '<option value='+ state.code_postal + ' - ' + state.nom_de_la_commune + '>'+ state.code_postal + ' / ' + state.nom_de_la_commune + '</option>';
}

function init_postcodeBlock_fr(blockId, address_table_id) {
     var city_field_td = cj(address_table_id + ' #address_'+blockId+'_city').parent();
     var postalcode_field_td = cj(address_table_id + ' #address_'+blockId+'_postal_code').parent();
     //postalcode_field_td.detach();
     city_field_td.parent().prepend(postalcode_field_td);
     var first_row = city_field_td.parent().parent().parent().parent().parent();
     first_row.before(zipcodes_getRowHtml_fr(blockId));
    
     /*---Barre de recherche ---*/
    cj('#zipcode_lookup').select2({
        minimumInputLength: 2,
        placeholder: 'Un code postal ou une ville',
        theme: "classic",
        ajax: {
            dataType: 'json',
            quietMillis: 250,
            url: function (term) {
                let totalResult = -1;
                let baseUrl = "https://datanova.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal";
                let queryUrl = baseUrl +"&q=" + term + "&rows=" + totalResult + "&facet=code_commune_insee&facet=nom_de_la_commune&facet=code_postal&facet=ligne_5";
                return queryUrl; 
            },
            data: function (term, page) {
                return {
                    q: term,
                    page: page 
                };
            },
            results: function (data, page) {
                var resultsData = [];
                resultsData = _.chain(data.records).pluck('fields').filter(function(i, item){ 
                    return !item.chain;              
                }); 
                let data2 = resultsData._wrapped
                return { results: data2}
            },
            cache: true
        },
        initSelection: function(element, callback) {
            // the input tag has a value attribute preloaded that points to a preselected repository's id
            // this function resolves that id attribute to an object that select2 can render
            // using its formatResult renderer - that way the repository name is shown preselected
            // var id = $(element).val();
            // if (id !== "") {
            //     $.ajax("https://api.github.com/repositories/" + id, {
            //         dataType: "json"
            //     }).done(function(data) { callback(data); });
            // }
            console.log(element);
            console.log(callback);
        },
        formatResult: formatResult,
        formatSelection: formatSelct,
        dropdownCssClass: "bigdrop",
        escapeMarkup: function (state) { return state; }
    });



    //zipcodes_addOnChange_fr(blockId, zipcodesfr);

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
    html = html + 'Postcode lookup french 22<br>';
    html = html + '<input id="zipcode_lookup" style="width:100%" type="text">';
    html = html + '</td>';
    html = html + '</tr>';
    return html;
}


// function zipcodes_addOnChange_fr(blockId) {
//     cj('#zipcode_lookup').change(function (e) {
//         zipcodes_fill_fr(blockId);
//     });
// }

// function zipcodes_fill_fr(blockId) {
//     var zipcode = cj('#zipcode_lookup').val();
//     console.log(zipcode);
//     const words = zipcode.split("-");
// //  var tirer = "-";
// //  splitString(zipcode, tirer);
//     cj('#address_' + blockId + '_postal_code').val(words[0]);
//     cj('#address_' + blockId + '_city').val(words[1]);
// }

/**
 *
 * remove all lookup widgets
 */
// function zipcodes_reset() {
//     cj('.zipcodes_input_row').remove();
// }