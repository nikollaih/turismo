document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los elementos con la clase 'collaborator-select'
    jQuery('.collaborator-select').on('change',async function() {
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
        console.log("response: ", response)
    });
});