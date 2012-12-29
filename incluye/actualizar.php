<?php
/**
* actualizar.php | Archivo de Inicio
*
* Este archivo actualiza la imagen y twittea los tweets.
*
*
* @author Zerquix18
* @author Superjd10 (Sólo la actualización de la imagen y el envío de tweets sin más funciones)
* @version 1.0.2
* @link http://zerquix18.com.ar/trackers-php/
* @category CLub Penguin
* @see trackers.php
* @package Trackers de Club Penguin
*
*
*/



if(! sesion_iniciada() ) {
	header("Location: index.php?p=acceso");
}
	construir_cabecera();

if(! defined("ACTUALIZAR") ) {
define("ACTUALIZAR", true);
}

function se_envio() {
if( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
	return true;
}
	return false;
}
require_once(INC . '/cpoauth.php'); 

$status = $_POST['estado']; 
$server = $_POST['servidor']; 
$room = $_POST['sala'];

$select = $_POST['select'];
//Si se envia, chaval. ↓↓
if( 'POST' == $_SERVER['REQUEST_METHOD'] ){ 
$online = $_POST['online'];
$tracking = $_POST['trackeando'];
$left = $_POST['sefue'];
$move = $_POST['movio'];
if(file_exists(IMG_BG)) {
$im = imagecreatefrompng('./'.IMG_BG); // c:
$colour = imagecolorallocate($im, 0, 0, 0);
$font = INC. '/tipografia.ttf'; // 
}


require_once("./imagen.php");


$tweet_encontrado = str_replace('%estado%', $status, $tweet_encontrado);
$tweet_encontrado = str_replace('%servidor%', $server, $tweet_encontrado);
$tweet_encontrado = str_replace('%sala%', $room, $tweet_encontrado);
$tweet_se_fue = str_replace('%estado%', $status, $tweet_se_fue);
$tweet_se_fue = str_replace('%servidor%', $server, $tweet_se_fue);
$tweet_se_fue = str_replace('%sala%', $room, $tweet_se_fue);
$tweet_movio = str_replace('%estado%', $status, $tweet_movio);
$tweet_movio = str_replace('%servidor%', $server, $tweet_movio);
$tweet_movio = str_replace('%sala%', $room, $tweet_movio);
$tweet_track = str_replace('%estado%', $status, $tweet_track);
$tweet_track = str_replace('%servidor%', $server, $tweet_track);
$tweet_track = str_replace('%sala%', $room, $tweet_track);

$lostweets = array (
"encontrado" => $tweet_encontrado,
"sefue" => $tweet_se_fue,
"movio" => $tweet_movio,
"track" => $tweet_track 

);

$tweet = new TwitterOAuth($ConsumerKey, $ConsumerSecret, $oAuthToken, $oAuthSecret);

$tweet->post('statuses/update', array('status' =>$lostweets[$select]));

$mensaje_de_salida = "
<div class='alert alert-success'>
	 <button type='button' class='close' data-dismiss='alert'>×</button>
<b> ¡Genial! </b> El Tracker fue actualizado... :) </div>
";

if(file_exists(IMG) and file_exists(IMG_BG)){
echo $mensaje_de_salida;
 }elseif(!file_exists(IMG_BG) && !file_exists(IMG)) {
zer_error( sprintf('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
<i class="icon-remove"></i><b> &iexcl;Error!</b> Los archivos <b>%s</b> y <b>%s</b> no existen... </div>', IMG, IMG_BG) );
}elseif(!file_exists(IMG_BG)) { zer_error( sprintf('
<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
<i class="icon-remove"></i><b> &iexcl;Error!</b> El archivo <b>%s</b> no existe... </div>', IMG_BG ) );

}elseif(! file_exists(IMG)) {
zer_error( sprintf('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
<i class="icon-remove"></i><b> &iexcl;Error!</b> El archivo <b>%s</b> no existe...</div>', IMG ) );
	}
} 
?>
<h2> Actualizar </h2><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" />

<input type="text" name="estado" <?php if( se_envio()  && !empty($_POST['estado']) ) { echo 'value="' . $_POST['estado'] . '"'; } ?> placeholder="Estado..."/><br />

<input type="text" name="servidor" <?php if( se_envio() && !empty($_POST['servidor']) ) { echo 'value="'. $_POST['servidor'] . '"'; } ?> placeholder="Servidor..."><br />

<input type="text" name="sala" <?php if( se_envio() && !empty($_POST['servidor']) ) { echo 'value="'. $_POST['sala'] . '"'; } ?> placeholder="Sala..."/><br />
<br/>
<br/>
<hr>
<br/>
<b> <h2> Twittear </h2></b><br/>
<input type="radio" name="select" value="encontrado" /> Encontrado <br /> 
<input type="radio" name="select" value="track" /> Dej&oacute; el servidor<br />
<input type="radio" name="select" value="sefue" /> Trackeando  <br /> 
<input type="radio" name="select" value="movio" /> Cambi&oacute; de Sala<br />
<hr>
<p><input type="submit" value="Actualizar Tracker" class="btn btn-primary"/></p>
</form>
<hr> 
<?php if( !defined("IMAGEN") or IMAGEN) { ?>
<h3> Imagen </h3> <hr>
<?php if( file_exists(IMG)) { ?>
<p>Aqu&iacute; tienes la imagen, la que actualmente est&aacute;s actualizando... :)</p><br>
<center> <img src="<?php echo IMG; ?>"> </center><br>
<?php } else { ?>
<div class="alert alert-error"><i class='icon-remove'></i> <b>&iexcl;Lo siento!</b> El archivo <b><?php echo IMG; ?></b> no existe... :( </div> <?php } } ?> <br>
<?php
/*************** Función compartirrr ***************************/ /* :3 */
if( !defined("COMPARTIR") or COMPARTIR == TRUE ) { ?>
<h3>Compartir</h3>
<?php if( file_exists( IMG ) ) { ?>
<p>Comparte la imagen pegando este c&oacute;digo <i>HTML</i>...
<div class="well">
	&lt;img src="http://<?php echo $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/' . IMG; ?>"&gt;
</div>
<?php }else{ 
zer_error( sprintf('<div class="alert alert-error"><i class="icon-remove"></i> <b>&iexcl;Lo siento</b> El archivo <b>%s</b> no existe por lo que no podemos compartirlo... :( </div>', IMG) );
} }

	construir_pies();

?>