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

// Encriptar o cifrar string
function cus_encrypt($data) {
    $iv = openssl_random_pseudo_bytes(16);
    $options = 0;
    $encryptedData = openssl_encrypt($data, $_ENV["CHIPER_KEY"], $_ENV["SECRET_KEY"], $options, $_ENV["IV"]);
    return base64_encode($encryptedData);
}

// Desencriptar string
function cus_decrypt($encryptedData) {
    $iv = openssl_random_pseudo_bytes(16);
    $options = 0;
    $decryptedData = openssl_decrypt(base64_decode($encryptedData), $_ENV["CHIPER_KEY"], $_ENV["SECRET_KEY"], $options, $_ENV["IV"]);
    return $decryptedData;
}