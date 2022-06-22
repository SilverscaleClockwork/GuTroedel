<?php 

class  WareManager {
    private $create_ware_script;
    private $delete_ware_script;

    function function __construct(
        File $create_ware_script, 
        File $delete_ware_script
        ){
        $this->create_ware_script = $create_ware_script;
        $this->delete_ware_script = $delete_ware_script;
    }

    // Erstelle eine Ware mit Zustand, Name und Beschreibung
    private function create(mysqli $db, string $name, string $description, string $zustand){
        $stmt = $db->prepare($create_ware_script->getText());
        $stmt->bind_params("sss", $name, $description, $zustand);
        return $stmt->execute();
    }

    // Lösche eine Ware
    private function delete(mysqli $db, $id){
        $stmt = $db->prepare($this->delete_ware_script->getText());
        $stmt->bind_params("i", $id);
        return $stmt->execute();
    }
}