$('#formMateriel').on('submit', (e) => {
    let form = $(e.target);
    let selected_fields = form.serializeArray();
    let error_message = '';
    selected_fields.forEach((element) => {
        switch(element.name) {
            case 'nom':
                if (element.value === '' || /[A-Za-z]+/.test(element.value) === false) 
                    error_message += `Le champ ${element.name} est vide ou le format n'est pas valide !<br>`;
                break;
            case 'prix':
                let prix_field = parseInt(element.value);
                if (prix_field < 0 || isNaN(prix_field))
                    error_message += `Le champ ${element.name} est vide ou la valeur est inferieur à 0 !<br>`;
                break;
        }
    });

    let notification_field = $('#notification');
    if(error_message.length) {
        notification_field
        .removeClass('alert-info')
        .addClass('alert-danger')
        .html(error_message);

        return false;
    }

});

