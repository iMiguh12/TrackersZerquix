<?php
session_start();
/*Trackers de Club Penguin v1.0.1
* trackers.php | Archivo de administración, acá se forman los gets y se incluyen archivos importantes...
*Copyright Zer!
*/
if(! defined("INC") ) { 
define("INC", "incluye"); 
}

if( ZER_TRACKERS ) {
require_once( INC . '/funciones.php');
require_once("./config.php");
$pagina = $_GET['p'];
switch($pagina) {
	case 'acceso':
	require_once(INC. '/login.php');
break;
	case 'logout':
	require_once(INC.'/logout.php');
break;
	default:
require_once( INC. "/actualizar.php");
	}
}
?>