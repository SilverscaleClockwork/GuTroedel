<?php
/**
 * This file includes the entire Login algorithm.
 * written by Luna Köpke
 */

 /**
  * Generiert einen passwort hash für leicht sicheren "handshake".
  */
 function gen_hash(string $password, string $salt){
     return hash("sha256", "$password$salt");
 }
 
 /**
  * Generiert einen Salt als Nonce.
  */
  function gen_salt(){
      return random_bytes(16);
  }