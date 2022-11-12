$('#formClient').on('submit', (e) => {
    let form = $(e.target);
    let selected_fields = form.serializeArray();
    let error_message = '';
    selected_fields.forEach((element) => {
        switch(element.name) {
            case 'nom':             
            case 'prenom':
            case 'ville':
                if (element.value === '' || /[A-Za-z]+/.test(element.value) === false) 
                    error_message += `Le champ ${element.name} est vide ou le format n'est pas valide !<br>`;
                break;
            case 'email':
                if (element.value === '' || /^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/.test(element.value) === false) 
                    error_message += `Le champ ${element.name} est vide ou le format n'est pas valide !<br>`;
                break;
            case 'code_postal':
                if (element.value === '' || /^[0-9]{5}$/.test(element.value) === false) 
                    error_message += `Le champ ${element.name} est vide ou le format n'est pas valide !<br>`;
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

    return false;

});