<?php

//Creamos la función que obtendrá de Coinmarketcap el precio actual de steem.

function SacarPrecio()

{
	$DatosCriptomonedas = file_get_contents("https://api.coinmarketcap.com/v1/ticker/steem/");

	$datos = json_decode($DatosCriptomonedas);

	$criptomoneda = $datos[0]->id;

	$precio = $datos[0]->price_usd;
	// Mensaje por default del bot para informar a los nuevos usuarios de dónde orientarse en cuanto al buen uso de steemit
	$plbs = "El precio actual de $criptomoneda es $precio USD, mantengase informado con el bot latino mas guapo <3
	Recuerde mantenerse al tanto sobre la actualidad de steemit y como generar ingresos con steemit y criptomonedas uniendote a nuestra comunidad: https://steemit.com/@dineroconopcion
	
	Canal de youtube: https://www.youtube.com/user/xTonyRockzx
	
	Discord oficial: https://discord.gg/uz6VEfY
	
	Steemit de tutoriales: https://steemit.com/@dineroconopcion
	
	Steemit de tutoriales: https://steemit.com/@criptoseries";
	//retornamos los datos enviados anteriormente
	return $plbs;


	
}


//Token del bot creado recientemente
$token = "";
//Id del canal en el cual el bot enviará los mensajes, iniciar el id del canal con -100
$idchat = "-100";


//Almacenamos en la variable mensaje los datos proporcionados por la función creada
$mensaje = SacarPrecio();

//Nos enlazamos a la api de telegram con las credenciales de nuestro bot
$url = "https://api.telegram.org/".$token."/sendMessage?chat_id=".$idchat."&text=".urlencode($mensaje);


//Llamamos la url con los datos suministrados
file_get_contents($url);


?>