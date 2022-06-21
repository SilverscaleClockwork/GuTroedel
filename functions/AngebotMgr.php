<?php

require_once('FileMgr.php');

class AngebotsManager{
    private $search_script;
    private $get_by_userid_script;
    private $get_by_id_script;
    
    public function __construct(
        File $search_script,
        File $get_by_userid_script,
        File $get_by_id_script
    ){
        $this->search_script = $search_script;
        $this->get_by_userid_script = $get_by_userid_script;
        $this->get_by_id_script = $get_by_id_script;
    }

    // Search user via text.
    public function search(mysqli $db, string $text){
        $db->prepare($this->search_script->getText());
        $db->bind_params("s", $text);
        // get all results (Angebote)
        $result = $db->get_result();
        return $result->fetch_all();
    }

    // Get one by ID.
    public function getByID(mysqli $db, $id){
        $db->prepare($this->get_by_id_script->getText());
        $db->bind_params("i", $id);
        // get result with only one entry
        $result = $db->get_result();
        return $result->fetch_all()[0];
    }

    // Get one by userid.
    public function getByUserid(mysqli $db, $userid){
        $db->prepare($this->get_by_userid_script->getText());
        $db->bind_params("i", $userid);
        // get all results.
        $result = $db->get_result();
        return $result->fetch_all();
    }

    /**
     * @param tags -- Array an tags
     */
    public function create(mysqli $db, string $waren_name, $tags, string $description, string $zustand, string $preis, string $userid){
        // TODO: somehow create entry
        return false;
    }
}
?>
