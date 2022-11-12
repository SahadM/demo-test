$('#formMaterielClient').on('submit', (e) => {
    let form = $(e.target);
    let selected_fields = form.serializeArray();

    const fields = selected_fields.filter(item => item.value === '');

    let notification_field = $('#notification');
    if (fields.length) {       
        notification_field
            .removeClass('alert-info')
            .addClass('alert-danger')
            .html("Veuillez sélectionner obligatoirement les deux champs !");

        return false;
    } 
    else {
        notification_field
            .removeClass('alert-danger')
            .addClass('alert-success')
            .html("OK on est bon !");

        return false;
    }

});