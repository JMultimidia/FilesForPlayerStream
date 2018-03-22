<?php
header('Access-Control-Allow-Origin: *');
require __DIR__ . "/../sistema/config/config.php";
if (isset($_GET['radio'])) {
	$amigavel = $_GET['radio'];
	$sql      = $mysqli->query( "SELECT id_associado, nome_associado, amigavel, servidor1, status FROM radios WHERE amigavel='$amigavel' AND status='sim'" );
	$i        = $sql->fetch_assoc();
//$ip = "radios.jmhost.com.br:8042";
//$ip = substr("$i[servidor]", 0, -5);
	$ip   = substr( $i['servidor1'], 7 );
	$port = substr( $i['servidor1'], ( strlen( $i['servidor1'] ) - 4 ), strlen( $i['servidor1'] ) );
	$fp   = @fsockopen( $ip, $port, $errno, $errstr, 1 );
	if ( $fp ) {
		fputs( $fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n" );
		while ( ! feof( $fp ) ) {
			$info = fgets( $fp );
		}
		$info  = str_replace( '</body></html>', "", $info );
		$split = explode( ',', $info );
		if ( empty( $split[6] ) ) {
			echo "$i[nome_associado]"; // Displays when sever is online but no song title
		} else {
			$title = str_replace( '\'', '`', $split[6] );
			$title = str_replace( ',', ' ', $title );
			echo "Tocando: $title! "; // Displays song
		}
	}
}