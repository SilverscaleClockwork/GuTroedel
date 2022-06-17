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
    // TODO: move url to https with Location header.
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
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
/**
 * Informationen der Session.
 */
$nutzer_id = isset($_SESSION['nutzerid']) ? $_SESSION['nutzerid'] : null;


/**
 * Initialise login manager
 */

$loginmgr = new LoginManager(
    new File($sql_folder . '/create_user_script.sql'),
    new File($sql_folder . '/create_nutzer_script.sql'),
    new File($sql_folder . '/check_user_script.sql'),
    new File($sql_folder . '/check_nutzer_script.sql'),
    new File($sql_folder . '/get_user_by_id.sql')
);

/*
 * Initialisiere Template engine.
 */
$template = new PageLoader($template_folder, "error.php");

// if errmsg already exists, show error page and exit
if(!empty($GLOBALS['errmsg'])){
    $template->incPHP();
    exit();
}

$db = new mysqli($mysql_hostname, $mysql_user, $mysql_hostname, $mysql_password);
$GLOBALS['db'] = $db;

// try to login
if(isset($_POST['login']) && $_POST['login'] == 1){
    $loginmgr->login($db, $email, $password);
}

// try to register
if(isset($_POST['register']) && $_POST['register'] == 1){
    $loginmgr->register($db, $email, $password, $vorname, $nachname, $telephone);
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
