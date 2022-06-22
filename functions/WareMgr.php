<?php 

class  WareManager {
    private $create_ware_script;
    function function __construct(File $create_ware_script){
        $this->create_ware_script = $create_ware_script;
    }
    private function create(mysqli $db, string $name, string $description, string $zustand){
        $stmt = $db->prepare($create_ware_script->getText());
        $stmt->bind_params("sss", $name, $description, $zustand);
        return $stmt->execute();
    }
}