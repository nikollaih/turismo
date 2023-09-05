<?php
// Función para establecer un mensaje flash.
function set_flash_message($key, $message) {
    $_SESSION[$key] = $message;
}

// Función para obtener y eliminar un mensaje flash.
function get_flash_message($key) {
    $message = isset($_SESSION[$key]) ? $_SESSION[$key] : '';
    unset($_SESSION[$key]);
    return $message;
}