<?php

$key = 'A%D*G-KaPdSgVkYp3s6v9y$B?E(H+MbQ';


function encryption($hkid, $key) {
    $cipher = 'aes-256-cbc';
    $encryption_key = base64_decode($key);
    $ivlen=openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted_hkid = openssl_encrypt($hkid, $cipher, $encryption_key, 0, $iv);
    return base64_encode($encrypted_hkid . '::' . $iv);
    }
    
    
    function decryption($hkid, $key) {
    $cipher = 'aes-256-cbc';
    $encryption_key = base64_decode($key);
    list($encrypted_hkid, $iv) = array_pad(explode('::', base64_decode($hkid), 2),2,null);
    return openssl_decrypt($encrypted_hkid, $cipher, $encryption_key, 0, $iv);
    }
?>