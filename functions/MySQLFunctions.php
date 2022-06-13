<?php
require_once("FileMgr.php");

function loadSQLScript(mysqli $db, string $path){
    $script = new File($path);
    return $db->prepare($script->getText());
}