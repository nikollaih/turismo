document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los elementos con la clase 'collaborator-select'
    jQuery('.collaborator-select').on('change', async function() {
        jQuery("#custom-loading-overlay").css("display", "flex");
        // Obtener el valor seleccionado
        const selectedValue = jQuery(this).val();
        // Encontrar el elemento 'tr' padre del botón que se hizo clic
        let rowID = jQuery(this).closest('tr').attr('id');

        let data = {
            user_id: rowID,
            new_role: selectedValue
        }

        let change_rol_url = customFetch.home_url + "/wp-content/themes/unitravel/includes/form-handlers/change_role_collaborator.php";
        let response = await do_post(change_rol_url, data);
        jQuery("#custom-loading-overlay").css("display", "none");

        let alert_title = (response.status) ? "!Exito¡" : "!Error¡";
        let alert_type = (response.status) ? "success" : "error";
        Swal.fire({
            title: alert_title, 
            text: response?.message, 
            icon: alert_type,
            confirmButtonText: "Aceptar"
        }).then(() => {
            if(!response.status)
                window.location.reload();
        })
    });

    // Eliminar colaborador(a)
    jQuery('.collaborator-delete').on('click', async function() {
        Swal.fire({
                title: '¿Estás seguro?',
                text: "Deseas eliminar el usuario!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    jQuery("#custom-loading-overlay").css("display", "flex");
                    // Encontrar el elemento 'tr' padre del botón que se hizo clic
                    let row = jQuery(this).closest('tr');
                    let rowID = row.attr('id');

                    let data = {
                        user_id: rowID
                    }

                    let change_rol_url = customFetch.home_url + "/wp-content/themes/unitravel/includes/form-handlers/delete_collaborator.php";
                    let response = await do_post(change_rol_url, data);
                    jQuery("#custom-loading-overlay").css("display", "none");

                    let alert_title = (response.status) ? "!Exito¡" : "!Error¡";
                    let alert_type = (response.status) ? "success" : "error";
                    Swal.fire({
                        title: alert_title, 
                        text: response?.message, 
                        icon: alert_type,
                        confirmButtonText: "Aceptar"
                    }).then(() => {
                        if(response.status)
                            row.remove();

                        jQuery("#custom-loading-overlay").css("display", "none");
                    })
                }
          })
    });
});