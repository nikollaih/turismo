document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los elementos con la clase 'collaborator-select'
    jQuery('#activity-location-select').on('change', function() {
        $value = jQuery(this).val();

        if($value == "other") {
            jQuery("#activity-location-input").show();
            jQuery("#activity-location-input").prop("required", true);
        }
        else {
            jQuery("#activity-location-input").hide();
            jQuery("#activity-location-input").removeAttr("required");
        }
    })

    // Eliminar actividad
    jQuery('.activity-delete').on('click', async function() {
        Swal.fire({
                title: '¿Estás seguro?',
                text: "Deseas eliminar la actividad!",
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
                        id_activity: rowID
                    }

                    let delete_url = customFetch.home_url + "/wp-content/themes/unitravel/includes/form-handlers/delete_activity.php";
                    let response = await do_post(delete_url, data);
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
})