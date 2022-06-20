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
      return base64_encode(random_bytes(12));
  }

  /**
   * This class is there to login and register into the service.
   */
  class LoginManager{
    private $create_password_script;
    private $create_user_script;
    private $check_password_script;
    private $check_user_script;
    private $get_password_by_id;
    private $userid;

    // set all scripts
    public function __construct(
        File $create_password_script, 
        File $create_user_script, 
        File $check_password_script, 
        File $check_user_script,
        File $get_password_by_id)
    {
        $this->create_password_script = $create_password_script;
        $this->create_user_script = $create_user_script;
        $this->check_password_script = $check_password_script;
        $this->check_user_script = $check_user_script;
        $this->get_password_by_id = $get_password_by_id;
    }

    public function login(mysqli $db, string $email, string $password){
        // TODO: get password 
        $stmt = $db->prepare($this->check_user_script->getText());
        // stop if error
        if(!$stmt)
            return false;

        $stmt->bind_param("s", $email);
        $stmt->execute();
        // get the userid
        $result = $stmt->get_result();
        $this->userid = $result->fetch_column();

        $stmt = $db->prepare($this->get_password_by_id->getText());
        $stmt->bind_param("i", $this->userid);
        $stmt->execute();
        $result = $stmt->get_result();
        [$oldhash, $salt] = $result->fetch_all(MYSQLI_NUM)[0];
        $hash = gen_hash($password, $salt);
        
        // did login fail?
        if($hash != $oldhash){
            $this->userid = null;
            return false;
        }

        return $this->userid;
    }

    public function register(mysqli $db, string $email, string $password, string $forename, string $lastname){
        // generate hash and salt.
        $salt = gen_salt();
        $hash = gen_hash($password, $salt);
        $super_user = 0;

        // save password.
        $stmt = $db->prepare($this->create_password_script->getText());
        // stop if error.
        if(!$stmt)
            return false;

        $stmt->bind_param("ssi", $salt, $hash, $super_user);
        $stmt->execute();

        // check if password exists
        $stmt = $db->prepare($this->check_password_script->getText());
        if(!$stmt)
            return false;
        $stmt->bind_param("ss", $hash, $salt);
        $stmt->execute();

        // get userid
        $result = $stmt->get_result();

        $result = $result->fetch_all(MYSQLI_NUM);
        $this->userid = $result[count($result) - 1][0];

        // save user
        $stmt = $db->prepare($this->create_user_script->getText());
        // stop if error
        if(!$stmt)
            return false;

        $stmt->bind_param("issss", $this->userid, $email, $forename, $lastname, $telefon);
        $stmt->execute();

        return $this->userid;
    }

    public function setUserid($id){
        $this->userid = $id;
    }

    public function getUserid(){
        return $this->userid;
    }
  }
