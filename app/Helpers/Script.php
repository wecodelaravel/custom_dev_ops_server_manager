<?php
namespace App\Helpers;

class Script
{

    public function __construct()
    {
        $this->script_crypt_cipher_method = 'AES-256-CBC';
        $this->script_crypt_iv = "1234567812345678";
    }

 
    public static function script_encrypt($text) {
        global $__SCRIPT_ENCRYPTION_KEY__;
        return openssl_encrypt($text, SCRIPT_CRYPT_CIPHER_METHOD, $__SCRIPT_ENCRYPTION_KEY__, 0, SCRIPT_CRYPT_IV);
    }

    public static function script_decrypt($encryptedtext) {
        global $__SCRIPT_ENCRYPTION_KEY__;
        return openssl_decrypt($encryptedtext, SCRIPT_CRYPT_CIPHER_METHOD, $__SCRIPT_ENCRYPTION_KEY__, 0, SCRIPT_CRYPT_IV);
    }
}
