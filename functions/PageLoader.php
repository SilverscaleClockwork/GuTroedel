<?php
require_once("FileMgr.php");

/**
 * PageLoader ladet seiten von Dateien.
 * written by Luna Köpke
 */
class PageLoader extends File{
    private string $default_page;
    private string $folder_path;
    
    /**
     * set folder and default page.
     */
    public function __construct(string $folder, string $default_page){
        $this->default_page = $default_page;
        $this->folder_path = $folder;
        $this->filepath = $this->folder_path . "/$default_page";
    }

    /**
     * Set page name of load page.
     */
    public function setPage(string $page_name){
        $success = true;
        $this->filepath = $this->folder_path . "/$page_name";
        
        // falls roher dateiname nicht existiert versuche es mit dateiendung '.php'
        if(file_exists($this->filepath) == false){        
            $this->filepath = $this->filepath . ".php";
        }

        // falls dateiname nicht existiert versuche es mit der dateiendung '.php'
        if(file_exists($this->filepath) == false){
            $this->filepath = $this->folder_path . "/$page_name.html";
        }

        // falls keine datei gefunden  wird zeige error. 
        if(file_exists($this->filepath) == false){
            $this->filepath = $this->folder_path . "/" . $this->default_page;
            $success = false;
        }
        return $success;
    }
    
    /**
     * Include PHP file.
     */
    public function incPHP(){
        include_once($this->filepath);
    }
};
