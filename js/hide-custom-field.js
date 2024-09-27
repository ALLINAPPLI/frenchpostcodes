(function($) {
    console.log('HIDE CUSTOM FIELD');
    /*
    * masquer le bloc Saisie adresse france dans summary contact
     */
    const customFieldApiBanSummary = document.querySelector('#contact-summary .Champs_saisie_adresse_France');
    if(customFieldApiBanSummary) {
        customFieldApiBanSummary.style.display = 'none';
    }

    /*
    * masquer le bloc Saisie adresse france dans formulaire édition de contact de type individu
     */
    const customFieldApiBanEditFormContact = document.querySelector('#customData_Individual #Champs_saisie_adresse_France');
    if(customFieldApiBanEditFormContact) {
        customFieldApiBanEditFormContact.style.display = 'none';
    }

    /*
    * masquer le bloc Saisie adresse france dans formulaire édition de contact de type organisation
     */
    const customFieldApiBanEditFormContactOrga = document.querySelector('#customData_Organization #Champs_saisie_adresse_France');
    if(customFieldApiBanEditFormContactOrga) {
        customFieldApiBanEditFormContactOrga.style.display = 'none';
    }

})(CRM.$ || cj);