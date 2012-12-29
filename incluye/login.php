<?php
/**
* login.php | Archivo de Acceso
*
* 
* Aquí accedes...
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
if( sesion_iniciada() ){
	header("Location: index.php");
}else{
	construir_cabecera();
if(!defined("ACTUALIZAR") ) {
define("ACTUALIZAR", false);
}
	if(isset($_POST['enviar-acceso'])) {
	if(empty($_POST['usuario-acceso']) || empty($_POST['clave-acceso'])) {
	zer_error("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>×</button>
<i class='icon-remove'></i><b> &iexcl;Error!</b> No puedes dejar campos vac&iacute;os. </div>");
}else{
	if($_POST['usuario-acceso'] == USUARIO && $_POST['clave-acceso'] == CLAVE) {
$_SESSION['usuario'] = USUARIO;
header("Location: index.php");
		}else { zer_error("
<div class='alert alert-error'>
 <button type='button' class='close' data-dismiss='alert'>×</button>
<i class='icon-remove'></i> <b>&iexcl;Error!</b> El nombre de usuario o contrase&ntilde;a son incorrectos... </div>
");
	}
     }
  }
}
?>
<hr>
<div class="hero-unit"><h1><u><?php if( defined("MENSAJE_ACCESO") ) { echo MENSAJE_ACCESO; }else{ ?>Bienvenido al acceso... <?php } ?></u></h1> <br><br>

<form action="<?php echo $_SERVER['PHP_SELF']. '?p=acceso' ?>" method="post" class="form-horizontal">
<div class="control-group"><label class="control-label" for="inputEmail">
 Nombre de Usuario:</label> <div class="controls"><input type="text" name="usuario-acceso" placeholder="Tu usuario" class="input-medium search-query" id="inputEmail">
 </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="inputPassword">
Contrase&ntilde;a: </label> <div class="controls"> <input type="password" name="clave-acceso" placeholder="Tu clave" class="input-medium search-query"><br>
  </div>
  </div>

<hr><button type="submit" name="enviar-acceso" value="Enviar datos" class="btn btn-primary" data-loading-text="Cargando..." >Enviar </button>
</form>
</div>
<?php construir_pies(); ?>