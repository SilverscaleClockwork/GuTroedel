<?php
/**
 *  Indexing Skript, das Daten automatisch läd.
 */
session_start();
require_once('configuration.php');
require_once("$function_folder/FileMgr.php");
require_once("$function_folder/PageLoader.php");
$GLOBALS["title"] = "GuTrödle";

if(isset($_SERVER["HTTPS"]) && $debug == false){
    echo "Sie sollten HTTPS nutzen";
    exit();
}

/**
 * Informationen von der URL Leiste
 */
$product_id = isset($_GET['pid']) ? $_GET['pid'] : null;
$page = isset($_GET['p']) ? $_GET['p'] : null;

/**
 * Informationen der Session.
 */
$nutzer_id = isset($_SESSION['nutzerid']) ? $_SESSION['nutzerid'] : null;


// TODO: Get Userdata if exists (for login and userinfo page).

/**
 * Logout user
 */
if($page == "logout"){
    session_unset();
    header("Location: " . $_SERVER['PHP_SELF'] . "?p=" . $default_page);
    exit();
}

// Gehe auf hauptseite wenn keine Page angefragt wurde.
if($page == null){
    $page = $default_page;
}

/**
 * Lade Navigationsleiste
 */
$nav = new File("$template_folder/navigation.html");
$GLOBALS["nav"] = $nav->getText();

/**
 * Setze Page Template
 */
$template = new PageLoader($template_folder, "error.php");
if($template->setPage($page) == false){
    $GLOBALS["errno"] = 404;
    $GLOBALS["errmsg"] = "Couldn't find Webpage, probably the page is work in progress or got deleted.";
}

/**
 * Wenn template datei existiert füge template ein.
 */
if($template->exists()){
    $template->incPHP();
}

//echo $_SERVER["PHP_SELF"];
