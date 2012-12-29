<?php
/**
* logout.php | Archivo de cierre de sesión.
*
* Acá cierras la sesión...
* 
*
*
* @author Zerquix18
* @version 1.0.2
* @link http://zerquix18.com.ar/trackers-php/
* @category CLub Penguin
* @package Trackers de Club Penguin
*
*
*/

session_start();

if( sesion_iniciada() ) {
 
	header("Location: index.php?p=acceso");

}else {
 
	header("Location: index.php?p=acceso");
}

?>
