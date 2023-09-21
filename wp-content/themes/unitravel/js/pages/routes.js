document.addEventListener('DOMContentLoaded', function() {
    // Eliminar actividad
    jQuery('.route-delete').on('click', async function() {
        Swal.fire({
                title: '¿Estás seguro?',
                text: "Deseas eliminar la experiencia turistica!",
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
                        id_route: rowID
                    }

                    let delete_url = customFetch.home_url + "/wp-content/themes/unitravel/includes/form-handlers/delete_route.php";
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