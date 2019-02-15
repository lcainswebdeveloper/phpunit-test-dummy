<?php
namespace App;

class Email {
    protected static $email;

    public function __construct($email) {
        static::$email = $email;
    }

    public static function fromString($email, bool $returnClass = true){
        if (!static::isValidFormat($email)) throw new \InvalidArgumentException;
        
        return ($returnClass) ? new static($email) : $email;
    }

    public static function isValidFormat($email) {
        return !(!strstr($email,"@") || !strstr($email,"."));
    }
}