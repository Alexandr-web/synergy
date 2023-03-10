<?php
namespace App\Helpers;

use ReallySimpleJWT\Parse;
use ReallySimpleJWT\Decode;
use ReallySimpleJWT\Jwt;

class AuthToken {
  /**
   * Получает token из Cookie
   * @return string
   */
  static function get() {
    if (!array_key_exists('token', $_COOKIE)) {
      return '';
    }

    return $_COOKIE['token'];
  }

  /**
   * Декодирует значение токена
   * @param string $token Значение токена
   * @return string
   */
  static function decode(string $token) {
    if (!$token) {
      return null;
    }

    $jwt = new Jwt($token);
    $parse = new Parse($jwt, new Decode());
    $parsed = $parse->parse();

    return $parsed->getPayload();
  }

  static function getUserId() {
    $token = static::get();

    if (!$token) {
      return '';
    }

    $jwt = new Jwt($token);
    $parse = new Parse($jwt, new Decode());
    $parsed = $parse->parse();

    return $parsed->getPayload()['user_id'];
  }
}