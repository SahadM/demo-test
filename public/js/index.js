$('#formMaterielClient').on('submit', (e) => {
    let form = $(e.target);
    let selected_fields = form.serializeArray();
    let notification_field = $('#notification');
    const fields = selected_fields.filter(item => item.value === '');

    if (fields.length) {
        notification_field
            .removeClass('alert-info')
            .addClass('alert-danger')
            .html("Veuillez sélectionner obligatoirement les deux champs !");

        return false;
    }

});

$('button[data-toggle^="collapsing"]').on('click', (evt) => {  
    let currentElement = $( evt.currentTarget);
    let name_collapse = currentElement.attr("data-toggle");

    currentElement
        .closest('tr')
        .nextAll(`tr.${name_collapse}.sub-row.collapse.out.hidden`)
        .slideToggle();

});
