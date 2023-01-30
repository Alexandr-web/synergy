<?php
namespace App\Helpers;

use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Decode;
use ReallySimpleJWT\Jwt;

class AuthToken {
  public function get() {
    return $_COOKIE['token'];
  }

  static function decode() {
    $token = $_COOKIE['token'];
    $jwt = new Jwt($token);
    $parse = new Parse($jwt, new Decode());
    $parsed = $parse->parse();

    return $parsed->getPayload();
  }
}