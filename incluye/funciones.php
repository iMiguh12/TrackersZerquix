<?php
/**
* actualizar.php | Archivo de functiones.
*
*
* Este archivo tiene el cuerpo del documento y las funciones adicionales...
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


function titulo($a = 'Trackers by Zer') {
$titulo = EL_TITULO;
if(isset($titulo) && $titulo != "TITULO ACÁ") {
  return $titulo;
}elseif($titulo = "TITULO ACÁ" or !isset($titulo)) {
  return $a;
}
}

	function construir_cabecera() {
?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
<meta http-equiv="Content-Type" content="text/html; charset= UTF-8">
<meta name="Robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> <?php echo titulo(); ?>  </title>
<style type="text/css">
body {
padding-top: 60px; 
}
</style>
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap-combined.min.css" rel="stylesheet">
	</head>
<body>
    <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><?php echo titulo(); ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/index.php">Inicio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php if( sesion_iniciada() ) {
?>
<p class="pull-left">&iexcl;Hola <b><?php echo $_SESSION['usuario']; ?></b>!</p>
<ul class="pager">
  <li class="next">
	<a href="index.php?p=logout"> Cerrar sesi&oacute;n &rarr; </a>
  </li>
</ul>
<?php
	}
} function construir_pies() {
?>

<?php copyright(); ?></div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>
</script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-popover.js"></script>
<script src="//twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
	</body>
	</html>
<?php
}
function zer_error($texto) {
if( is_null($texto) ) {
    $returnar = false;
	return $returnar;
}else{
	echo $texto;
}
}
/* Para futuras versiones */
$cp = "#ClubPenguin";

$r = rand(1, 100);
/* / Para futuras versiones */


function sesion_iniciada() { 
if(isset($_SESSION['usuario'])) {

return true;

}else{

return false;

}

}

function copyright() {
?><hr>
<footer>
<a href="//zerquix18.com.ar/trackers-php/" target="_blank">&copy; Trackers de Club Penguin</a>
<?php if( ACTUALIZAR ) { ?>
<p class="pull-right"><b>Versi&oacute;n 1.0.2</b></p>
<?php } ?> </footer>
<?php } ?>