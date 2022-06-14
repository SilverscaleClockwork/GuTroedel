<?php
/**
 *  Indexing Skript, das Daten automatisch läd.
 */
session_start();
require_once('configuration.php');
require_once("$function_folder/FileMgr.php");
require_once("$function_folder/PageLoader.php");
require_once("$function_folder/login.php");
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

$GLOBALS['errno'] = isset($_GET['errno']) ? $_GET['errno'] : null;
$GLOBALS['errmsg'] = isset($_GET['errmsg']) ? $_GET['errmsg'] : null;
    
/**
 * Post variablen
 */
$password = isset($_POST['password']) ? $_POST['password'] : null;
$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : null;
$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

/**
 * Informationen der Session.
 */
$nutzer_id = isset($_SESSION['nutzerid']) ? $_SESSION['nutzerid'] : null;

/*
 * Initialisiere Template engine.
 */
$template = new PageLoader($template_folder, "error.php");

// if errmsg already exists, show error page and exit
if(!empty($GLOBALS['errmsg'])){
    $template->incPHP();
    exit();
}

// TODO: Get Userdata if exists (for login and userinfo page).

if(isset($_POST['login']) && $_POST['login'] == 1){
    // TODO: login
    // TODO: get user from email and get salt
    $salt = "test";
    gen_hash($password, $salt);
}

if(isset($_POST['register']) && $_POST['register'] == 1){
    // TODO: register
    // TODO: check if user already exists and if it does give out an error.
    $salt = gen_salt();
    gen_hash($password, $salt);
    // TODO: create user and nutzer entry in database
}

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
