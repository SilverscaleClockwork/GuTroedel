<?php
/**
 * Klasse zum Laden von Dateien.
 * written by Luna Köpke
 */
class File{
    protected $filepath = "";
    
    /**
     * Setze den filepath
     */
    public function __construct(string $path){
        $this->filepath = $path;
    }

    /**
     * Prüfe ob Datei existiert.
     */
    public function exists(){
        return file_exists($this->filepath);
    }

    /**
     * Bekomme text
     */
    public function getText(){
        $fh = fopen($this->filepath, 'r');
        $fc = @fread($fh, filesize($this->filepath));
        fclose($fh);
        return $fc;
    }
}
