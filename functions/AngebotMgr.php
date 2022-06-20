<?php
class AngebotsManager{
    public function search(mysqli $db, string $text){
        return  [[]];
    }

    public function getByID(mysqli $db, $id){
        return [];
    }

    public function getByUserid(mysqli $db, $userid){
        return [[]];
    }

    /**
     * @param tags -- Array an tags
     */
    public function create(mysqli $db, string $waren_name, $tags, string $description, string $zustand, string $preis){
        return false;
    }
}
?>
