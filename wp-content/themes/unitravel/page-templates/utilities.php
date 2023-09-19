<?php 
    // Iniciar la sesión si no está iniciada.
    if (!session_id()) {
        session_start();
    }
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/pages/styles.css'; ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">	
<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>		