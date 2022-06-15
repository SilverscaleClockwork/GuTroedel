<?php
/**
 * This file includes the entire Login algorithm.
 * written by Luna Köpke
 */

require_once('FileMgr.php');
require_once('MySQLFunctions.php');

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

  /**
   * This class is there to login and register into the service.
   */
  class LoginManager{
    private $create_password_script;
    private $create_user_script;
    private $check_password_script;
    private $check_user_script;
    private $userid;

    // set all scripts
    public function __construct(File $create_password_script, File $create_user_script, File $check_password_script, File $check_user_script)
    {
        $this->create_password_script = $create_password_script;
        $this->create_user_script = $create_user_script;
        $this->check_password_script = $check_password_script;
        $this->check_user_script = $check_user_script;
    }

    public function login(mysqli $db, string $email, string $password){
        // TODO: get password 
        $salt = "test";
        gen_hash($password, $salt);
        // check hashes
    }

    public function register(mysqli $db, string $email, string $password, string $forename, string $lastname){
        // generate hash and salt.
        $salt = gen_salt();
        $hash = gen_hash($password, $salt);

        // save password.
        $stmt = $db->prepare($this->create_password_script->getText());
        // stop if error.
        if(!$stmt)
            return false;

        $stmt->bind_param("ssi", $hash, $salt, 0);
        $stmt->execute();

        // TODO: insert email forename and lastname
    }

    public function setUserid($id){
        $this->userid = $id;
    }

    public function getUserid(){
        return $this->userid;
    }
  }