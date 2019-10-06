<?php
function formatarValor($valor) {
	return number_format ( $valor, 2, ',', '.' );
}


function formataValor($valor) {
	return number_format ( $valor, 2, ',', '.' );
}


function formataData($data) {
	list ( $ano, $mes, $dia ) = explode ( "-", $data );
	return $dia . "/" . $mes . "/" . $ano;
}


function removeNaoLetras2($var) {
	// $valor = preg_replace ( "/&([a-z])[a-z]+;/i", "$1", htmlentities ( trim ( $var ) ) );
	$nova_string = preg_replace ( "/[^a-zA-Z0-9]/", " ", $var );
	return $nova_string;
}
function formataDouble($valor) {
	if ($valor == "") {
		$valor = 0;
	} else {
		$valor = $valor;
	}
	// return $english_format_number = number_format($valor,2, ',', '.');
	// number_format($num, 2, ',', '.');
	return number_format ( $valor, 2, ".", "," );

	$format = number_format ( floatval ( 0 ), 2 );
	// string number_format ( float $number , int $decimals , string $dec_point , string $thousands_sep )
}
function formataDoubleTresCasas($valor) {
	if ($valor == "") {
		$valor = 0;
	} else {
		$valor = $valor;
	}
	return $english_format_number = number_format ( $valor, 3, '.', ',' );
}
function formataDoubleSemCasas($valor) {
	if ($valor == "") {
		$valor = 0;
	} else {
		$valor = $valor;
	}
	//return $english_format_number = number_format ( $valor, 0, '.', '' );
	return $dd = number_format( $valor, 0, '.', '' );
}
function formataDoubleDuasCasas($valor) {
	if ($valor == "") {
		$valor = 0;
	} else {
		$valor = $valor;
	}
	//return $english_format_number = number_format ( $valor, 0, '.', '' );
	return $dd = number_format( $valor, 2, '.', '' );
}
function formatarNumeroParaFloat($valor) {
	return number_format ( $valor, 2, '.', ',' );
}
function formatarFloatParaMoeda($valor, $simbolo) {
	return 'R$ ' . number_format ( $valor, 2, ',', '.' );
}
function formatoReal($valor) {
	$valor = ( string ) $valor;
	$regra = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";
	if (preg_match ( $regra, $valor )) {
		return true;
	} else {
		return false;
	}
}
/*
 * function trataTxt($var) {
 * // $var = strtolower($var);
 * //$var = ereg_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âª]", "a", $var );
 * /*$var = preg_replace("[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âª]", "a", $var);
 * $var = preg_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¨ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âª]", "e", $var );
 * $var = preg_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â®]", "i", $var );
 * $var = preg_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â²ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â´ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂµÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº]", "o", $var );
 * $var = preg_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂºÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¹ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â»]", "u", $var );
 * $var = preg_replace ( "/'/", "", $var );
 * $var = preg_replace ( "/ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§/", "c", $var );
 * $v = strtoupper ( $var );
 */
/*
 * $var = str_replace("/ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âª/", "a", $var);
 * $var = str_replace("/ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡/", "a", $var);
 * $var = str_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¨ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âª]", "e", $var );
 * $var = str_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â®]", "i", $var );
 * $var = str_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â²ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â´ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂµÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº]", "o", $var );
 * $var = str_replace ( "[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂºÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¹ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â»]", "u", $var );
 * $var = str_replace ( "/'/", "", $var );
 * $var = str_replace ( "/ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§/", "c", $var );
 * $v = strtoupper ( $var );
 *
 * return $v;
 * }
 */
/*
 * function trataTxt($string) {
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¤]/", "a", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™ÃƒÂ¯Ã‚Â¿Ã‚Â½ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¾]/", "A", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¨ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âª]/", "e", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â°ÃƒÆ’Ã†â€™Ãƒâ€¹Ã¢â‚¬Â ÃƒÆ’Ã†â€™Ãƒâ€¦Ã‚Â ]/", "E", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¬]/", "i", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™ÃƒÂ¯Ã‚Â¿Ã‚Â½ÃƒÆ’Ã†â€™Ãƒâ€¦Ã¢â‚¬â„¢]/", "I", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â²ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â´ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂµÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¶]/", "o", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã¯Â¿Â½ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“]/", "O", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚ÂºÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¹ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¼]/", "u", $string);
 * $string = preg_replace("/[ÃƒÆ’Ã†â€™Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â‚¬Å¾Ã‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€¦Ã¢â‚¬Å“]/", "U", $string);
 * $string = preg_replace("/ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§/", "c", $string);
 * $string = preg_replace("/ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¡/", "C", $string);
 * $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
 * $string = preg_replace("/ /", "_", $string);
 * $string = strtoupper($string);
 * return $string;
 * }
 */
function tiraAcento($url) {
	$from = "ÃƒÆ’Ã¢â€šÂ¬ÃƒÆ’Ã¯Â¿Â½ÃƒÆ’Ã†â€™ÃƒÆ’Ã¢â‚¬Å¡ÃƒÆ’Ã¢â‚¬Â°ÃƒÆ’Ã…Â ÃƒÆ’Ã¯Â¿Â½ÃƒÆ’Ã¢â‚¬Å“ÃƒÆ’Ã¢â‚¬Â¢ÃƒÆ’Ã¢â‚¬ï¿½ÃƒÆ’Ã…Â¡ÃƒÆ’Ã…â€œÃƒÆ’Ã¢â‚¬Â¡ÃƒÆ’Ã‚Â ÃƒÆ’Ã‚Â¡ÃƒÆ’Ã‚Â£ÃƒÆ’Ã‚Â¢ÃƒÆ’Ã‚Â©ÃƒÆ’Ã‚ÂªÃƒÆ’Ã‚Â­ÃƒÆ’Ã‚Â³ÃƒÆ’Ã‚ÂµÃƒÆ’Ã‚Â´ÃƒÆ’Ã‚ÂºÃƒÆ’Ã‚Â¼ÃƒÆ’Ã‚Â§'";
	$to = "aaaaeeiooouucaaaaeeiooouuc ";

	$rull = strtr ( $url, $from, $to );
	return strtoupper ( $rull );
}
function tirarAcentos($string) {
	return preg_replace ( array (
			"/(ÃƒÆ’Ã‚Â¡|ÃƒÆ’Ã‚Â |ÃƒÆ’Ã‚Â£|ÃƒÆ’Ã‚Â¢|ÃƒÆ’Ã‚Â¤)/",
			"/(ÃƒÆ’Ã¯Â¿Â½|ÃƒÆ’Ã¢â€šÂ¬|ÃƒÆ’Ã†â€™|ÃƒÆ’Ã¢â‚¬Å¡|ÃƒÆ’Ã¢â‚¬Å¾)/",
			"/(ÃƒÆ’Ã‚Â©|ÃƒÆ’Ã‚Â¨|ÃƒÆ’Ã‚Âª|ÃƒÆ’Ã‚Â«)/",
			"/(ÃƒÆ’Ã¢â‚¬Â°|ÃƒÆ’Ã‹â€ |ÃƒÆ’Ã…Â |ÃƒÆ’Ã¢â‚¬Â¹)/",
			"/(ÃƒÆ’Ã‚Â­|ÃƒÆ’Ã‚Â¬|ÃƒÆ’Ã‚Â®|ÃƒÆ’Ã‚Â¯)/",
			"/(ÃƒÆ’Ã¯Â¿Â½|ÃƒÆ’Ã…â€™|ÃƒÆ’Ã…Â½|ÃƒÆ’Ã¯Â¿Â½)/",
			"/(ÃƒÆ’Ã‚Â³|ÃƒÆ’Ã‚Â²|ÃƒÆ’Ã‚Âµ|ÃƒÆ’Ã‚Â´|ÃƒÆ’Ã‚Â¶)/",
			"/(ÃƒÆ’Ã¢â‚¬Å“|ÃƒÆ’Ã¢â‚¬â„¢|ÃƒÆ’Ã¢â‚¬Â¢|ÃƒÆ’Ã¢â‚¬ï¿½|ÃƒÆ’Ã¢â‚¬â€œ)/",
			"/(ÃƒÆ’Ã‚Âº|ÃƒÆ’Ã‚Â¹|ÃƒÆ’Ã‚Â»|ÃƒÆ’Ã‚Â¼)/",
			"/(ÃƒÆ’Ã…Â¡|ÃƒÆ’Ã¢â€žÂ¢|ÃƒÆ’Ã¢â‚¬Âº|ÃƒÆ’Ã…â€œ)/",
			"/(ÃƒÆ’Ã‚Â±)/",
			"/(ÃƒÆ’Ã¢â‚¬Ëœ)/"
	), explode ( " ", "a A e E i I o O u U n N" ), $string );
	return $string;
	// echo tirarAcentos ( $string );
}
function trataTxt($var) {
	$from = 'ÃƒÆ’Ã¢â€šÂ¬ÃƒÆ’Ã¯Â¿Â½ÃƒÆ’Ã†â€™ÃƒÆ’Ã¢â‚¬Å¡ÃƒÆ’Ã¢â‚¬Â°ÃƒÆ’Ã…Â ÃƒÆ’Ã¯Â¿Â½ÃƒÆ’Ã¢â‚¬Å“ÃƒÆ’Ã¢â‚¬Â¢ÃƒÆ’Ã¢â‚¬ï¿½ÃƒÆ’Ã…Â¡ÃƒÆ’Ã…â€œÃƒÆ’Ã¢â‚¬Â¡ÃƒÆ’Ã‚Â ÃƒÆ’Ã‚Â¡ÃƒÆ’Ã‚Â£ÃƒÆ’Ã‚Â¢ÃƒÆ’Ã‚Â©ÃƒÆ’Ã‚ÂªÃƒÆ’Ã‚Â­ÃƒÆ’Ã‚Â³ÃƒÆ’Ã‚ÂµÃƒÆ’Ã‚Â´ÃƒÆ’Ã‚ÂºÃƒÆ’Ã‚Â¼ÃƒÆ’Ã‚Â§ ';
	$to = 'aaaaeeiooouucaaaaeeiooouuc-';

	$rull = strtr ( $var, $from, $to );
	return strtoupper ( $rull );
}
// echo "Texto com acento:" . "ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â© ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âº";
// echo "<br>";
// echo "Texto sem acento:" . trataTxt("ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¡ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â© ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â³ ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Âº");
function formata_data($data) {
	list ( $ano, $mes, $dia ) = explode ( "-", $data );
	return $dia . "/" . $mes . "/" . $ano;
}

function formata_data2($data) {
	$data = strtotime ( $dataMovimentoV [$i] );
	return $da [$i] = date ( 'd-m-Y', $data );
}
function formata_data_db($data) {
	list ( $dia, $mes, $ano ) = explode ( "/", $data );
	return $ano . "-" . $mes . "-" . $dia;
}
function retorna_mes($mes) {
	switch ($mes) {
		case "01" :
			return "Janeiro";
		case "02" :
			return "Fevereiro";
		case "03" :
			return "Marco";
		case "04" :
			return "Abril";
		case "05" :
			return "Maio";
		case "06" :
			return "Junho";
		case "07" :
			return "Julho";
		case "08" :
			return "Agosto";
		case "09" :
			return "Setembro";
		case "10" :
			return "Outubro";
		case "11" :
			return "Novembro";
		case "12" :
			return "Dezembro";
	}
	// $dataatual = date("d")." de ".retorna_mes(date("m"))." de ".date("Y");
	return $dataatual;
}
function data_extenso() {
	$datax = date ( "d" ) . " de " . retorna_mes ( date ( "m" ) ) . " de " . date ( "Y" );
	return $datax;
}
function hora() {
	$hora = date ( "H:i:s" );
	return $hora;
}
function data() {
	$data = date ( "Y-m-d" );
	return $data;
}
function formata_hora($horaentrega) {
	$pontos = array (
			",",
			".",
			"'",
			":"
	);
	$result = str_replace ( $pontos, "", $horaentrega );
	// return $result;
	// $horaentrega = explode(":",$horaentrega);
	$min = substr ( $result, 0, 2 );
	$seg = substr ( $result, 2, 4 );
	$horaentrega = $min . ":" . $seg;
	return $horaentrega;
}
/*
 * function tiraCarcteres($valor){
 * $pontos = '.';
 * $virgula = ',';
 * $result = str_replace($pontos, "", $valor);
 * $result2 = str_replace($virgula, ".", $result);
 * return $result2;
 * }
 */
function tiraCaracteres($valor) {
	$pontos = array (
			",",
			".",
			"'",
			""
	);
	$result = str_replace ( $pontos, "", $valor );
	return $result;
}
function subDatas($datae, $datar) {
	// Datas no formato mm/dd/aaaa
	// echo $datar = formata_data($datar);
	// echo $datae = formata_data($datae);
	$data1 = strtotime ( $datar );
	$data2 = strtotime ( $datae );
	// $dat1 = strtotime("2005-04-06");
	// $dat2 = strtotime("2005-04-09");
	$intervalo = (($data2 - $data1) / 86400) + 1; // transformaÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£o do timestamp em dias
	return $intervalo;
}
function diffDate($d1, $d2, $type = '', $sep = '-') {
	$d1 = explode ( $sep, $d1 );
	$d2 = explode ( $sep, $d2 );
	switch ($type) {
		case 'A' :
			$X = 31536000;
			break;
		case 'M' :
			$X = 2592000;
			break;
		case 'D' :
			$X = 86400;
			break;
		case 'H' :
			$X = 3600;
			break;
		case 'MI' :
			$X = 60;
			break;
		default :
			$X = 1;
	}
	// floor($data1) = mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]);
	// floor($data2) = mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]);
	$data1 = mktime ( $d2 [1], $d2 [2], $d2 [0] );
	$data2 = mktime ( $d1 [1], $d1 [2], $d1 [0] );
	$dias = ($data1 - $data2) / $X;
	// return floor( ( ( mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]) ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ mktime(0, 0, 0, $d1[1], $d1[2], $d1[0] ) ) / $X ) );
	// mktime($hour, $minute, $second, $month, $day, $year, $is_dst)
	return $dias;
}
/*
 * Calcular diferenÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§a em Minutos (3ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro MI).
 * <?php
 * $d1 = "2011-01-01";
 * $d2 = "2011-02-01";
 * echo diffDate($d1,$d2,'MI');
 * ?>
 * Calcular diferenÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§a entre Anos (3ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro A).
 * <?php
 * $d1 = "2010-01-01";
 * $d2 = "2011-01-01";
 * echo diffDate($d1,$d2,'A');
 * ?>
 * Calcular diferenÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§a em Horas (3ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro H).
 * <?php
 * $d1 = "2011-01-01";
 * $d2 = "2011-02-01";
 * echo diffDate($d1,$d2,'H');
 * ?>
 * Calcular diferenÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§a em Dias com separador ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã¢â‚¬Å“/ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬ÃƒÂ¯Ã‚Â¿Ã‚Â½ (3ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro D e 4ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro / ).
 * <?php
 * $d1 = "2011/01/01";
 * $d2 = "2011/02/01";
 * echo diffDate($d1,$d2,'D',"/");
 * ?>
 * Calcular diferenÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§a em Segundos (omitindo o 3ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº e 4ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Âº parÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢metro ).
 * <?php
 * $d1 = "2011-01-01";
 * $d2 = "2011-02-01";
 * echo diffDate($d1,$d2);
 * ?>
 */

// SaudaÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£o - by Jurandir Monteiro Prestes - jmprestes@bol.com.br
/*
 * $hora_atual=date("H");
 * if ($hora_atual>=5&$hora_atual<=11) {
 * echo "Bom dia!";
 * }
 * if ($hora_atual>=12&$hora_atual<=17) {
 * echo "Boa tarde!";
 * }
 * if ($hora_atual>=18&$hora_atual<=23) {
 * echo "Boa noite!";
 * }
 * if ($hora_atual>=0&$hora_atual<=4) {
 * echo "Boa noite!";
 * }
 */
function verificaPermissao($nivel) {
	$permite = "nao";
	if ($nivel == "Administrador" || $nivel == "Suporte") {
		$permite = "sim";
	}
	return $permite;
}
function verificaPermissaoChamado($nivel) {
	$permite = "nao";
	if ($nivel == "Administrador" || $nivel == "Suporte" || $nivel == "Usuario") {
		$permite = "sim";
	}
	return $permite;
}
function diferencaDatas($dataAtual, $dataChamado) {
	$data1 = new DateTime ( $dataAtual );
	$data2 = new DateTime ( $dataChamado );

	$intervalo = $data1->diff ( $data2 );
	// return $intervalo;
	// return $diferenca = $intervalo->d;
	return $intervalo;

	// echo "Intervalo ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â© de {$intervalo->y} anos, {$intervalo->m} meses e {$intervalo->d} dias";
	// echo "Intervalo ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â© de {$intervalo->y} anos, {$intervalo->m} meses e {$intervalo->d} dias";
}
function reduzData($diff) {
	/*
	 * Duas datas devem ser fornecidas
	 */

	// $diff = 1;
	$date = data ();
	$timestamp1 = strtotime ( $date );
	$timestamp2 = strtotime ( '-' . $diff . ' day', $timestamp1 );
	// echo $timestamp1;
	// Resultado: 592597800
	// echo $timestamp2;
	// Resultado: 592684200
	// echo date ( 'd/m/Y H:i:s', $timestamp1 );
	// Resultado: 11/10/1988 18:30:00
	// echo "<br/>".date ( 'd/m/Y H:i:s', $timestamp2 );
	// Resultado: 12/10/1988 18:30:00

	$dd = date ( 'd/m/Y', $timestamp2 );
	$dd = formata_data_db ( $dd );
	return $dd;
}
function removeAcentos($string, $slug = false) {
	// $string = strtoupper($string);
	// CÃƒÆ’Ã‚Â³digo ASCII das vogais
	$ascii ['a'] = range ( 224, 230 );
	$ascii ['e'] = range ( 232, 235 );
	$ascii ['i'] = range ( 236, 239 );
	$ascii ['o'] = array_merge ( range ( 242, 246 ), array (
			240,
			248
	) );
	$ascii ['u'] = range ( 249, 252 );
	// CÃƒÆ’Ã‚Â³digo ASCII dos outros caracteres
	$ascii ['b'] = array (
			223
	);
	$ascii ['c'] = array (
			231
	);
	$ascii ['d'] = array (
			208
	);
	$ascii ['n'] = array (
			241
	);
	$ascii ['y'] = array (
			253,
			255
	);
	foreach ( $ascii as $key => $item ) {
		$acentos = '';
		foreach ( $item as $codigo )
			$acentos .= chr ( $codigo );
		$troca [$key] = '/[' . $acentos . ']/i';
	}
	$string = preg_replace ( array_values ( $troca ), array_keys ( $troca ), $string );
	// Slug?
	if ($slug) {
		// Troca tudo que nÃƒÆ’Ã‚Â£o for letra ou nÃƒÆ’Ã‚Âºmero por um caractere ($slug)
		$string = preg_replace ( '/[^a-z0-9]/i', $slug, $string );
		// Tira os caracteres ($slug) repetidos
		$string = preg_replace ( '/' . $slug . '{2,}/i', $slug, $string );
		$string = trim ( $string, $slug );
	}
	return strtoupper ( $string );
}

function convertem($term) {

	$palavra = strtr(strtoupper($term),"ÃƒÂ ÃƒÂ¡ÃƒÂ¢ÃƒÂ£ÃƒÂ¤ÃƒÂ¥ÃƒÂ¦ÃƒÂ§ÃƒÂ¨ÃƒÂ©ÃƒÂªÃƒÂ«ÃƒÂ¬ÃƒÂ­ÃƒÂ®ÃƒÂ¯ÃƒÂ°ÃƒÂ±ÃƒÂ²ÃƒÂ³ÃƒÂ´ÃƒÂµÃƒÂ¶ÃƒÂ·ÃƒÂ¸ÃƒÂ¹ÃƒÂ¼ÃƒÂºÃƒÂ¾ÃƒÂ¿","Ãƒâ‚¬Ãƒï¿½Ãƒâ€šÃƒÆ’Ãƒâ€žÃƒâ€¦Ãƒâ€ Ãƒâ€¡ÃƒË†Ãƒâ€°ÃƒÅ Ãƒâ€¹ÃƒÅ’Ãƒï¿½ÃƒÅ½Ãƒï¿½Ãƒï¿½Ãƒâ€˜Ãƒâ€™Ãƒâ€œÃƒâ€�Ãƒâ€¢Ãƒâ€“Ãƒâ€”ÃƒËœÃƒâ„¢ÃƒÅ“ÃƒÅ¡ÃƒÅ¾ÃƒÅ¸");

	return $palavra;
 
}

function atualizarEstoque($codProduto) {
	require_once("includes/conexao.php");
	pg_query ($conexaoao, "begin");
	
	$sqlConsulta = 'SELECT codproduto, SUM(qntestoque) AS qntestoque FROM grades WHERE codproduto = '.$codProduto.' GROUP BY codproduto';
				
	$resultConsulta = pg_query ($conexaoao, $sqlConsulta );
	
	$linhas = pg_num_rows ($resultConsulta );
	
	$rs = pg_fetch_array($resultConsulta);
							
	$idProd = $rs['codproduto'];
	$qntestoque = $rs['qntestoque'];
	
	$encontrador = false;
	if ($linhas > 0) {
		
		$sqlAtualEst = 'UPDATE estoques SET qntestoque = '.$qntestoque.' WHERE codproduto  = '.$idProd;
				
		$resultAtualEst = pg_query ($conexaoao, $sqlAtualEst );
		
		$regAtualEst = pg_affected_rows($resultAtualEst);
		
		if ($regAtualEst > 0){
			pg_query($conexaoao, "commit");
			pg_close($conexaoao);
			$encontrador = true;
		} 	
		
	}
	return $encontrador;
}

function movimentaEstoque($codMovimento, $tipoMovimento, $codProduto, $grade, $quantidade, $e_s, $codigoUsuario) {
	$host = "localhost";
	$port = '5432';
	$user = "postgres";
	$pass = "p4v800dx";
	$d_b  = "olimpo";
	
	
	$conexao = pg_connect("host=$host dbname=$d_b port=$port user=$user password=$pass");
	
	//pg_query ($conexaoao, "begin");

	$estoqueMovimentado = false;
	if ($e_s == 'S'){
		//Diminue o estoque da grade
		$sqlEstGrade = "UPDATE grades SET qntestoque = qntestoque - $quantidade WHERE codproduto = $codProduto AND trim(grade) = '$grade'";
		
		$resultEstGrade = pg_query ($conexao, $sqlEstGrade );
		
		$regEstGrade = pg_affected_rows($resultEstGrade);
		
		if ($regEstGrade > 0){
			//Soma o estoque total
			$sqlConsulta = 'SELECT codproduto, SUM(qntestoque) AS qntestoque FROM grades WHERE codproduto = '.$codProduto.' GROUP BY codproduto';
				
			$resultConsulta = pg_query ($conexao, $sqlConsulta );
			
			$linhas2 = pg_num_rows ($resultConsulta );
			
			$rs = pg_fetch_array($resultConsulta);
									
			$idProd = $rs['codproduto'];
			$qntestoque = $rs['qntestoque'];
			
			if ($linhas > 0) {
				//Atualiza estoque total
				$sqlAtualEst = 'UPDATE estoques SET qntestoque = '.$qntestoque.' WHERE codproduto  = '.$idProd;
						
				$resultAtualEst = pg_query ($conexao, $sqlAtualEst );
				
				$regAtualEst = pg_affected_rows($resultAtualEst);
				
				if ($regAtualEst > 0){
					
					//Gravar Kardex
					$dataKardex = date('Y-m-d');
					
					$sqlKardex = "insert into kardex (codmovimento,tipomovimento,codproduto,datakardex,qntmov,e_s,usuario,grade) values ('$codMovimento','$tipoMovimento','$codProduto','$dataKardex','$quantidade','$e_s','$codigoUsuario','$grade')";
					
					$resultKardex = pg_query($conexao, $sqlKardex);
					
					$regKardex = pg_affected_rows($resultKardex);
					
					if ($regKardex > 0){
						pg_query($conexao, "commit");
						pg_close($conexao);
						$estoqueMovimentado = true;
					} else {
						pg_query($conexao, "rollback");
						pg_close($conexao);						
					}
				} else {
					pg_query($conexao, "rollback");
					pg_close($conexao);
				}	
				
			} else {
				pg_query($conexao, "rollback");
				pg_close($conexao);
			}

		} else {
			pg_query($conexao, "rollback");
			pg_close($conexao);			
		}
		
	} elseif ($e_s == 'E') {
		//soma o estoque da grade
		$sqlEstGrade = "UPDATE grades SET qntestoque = qntestoque + $quantidade WHERE codproduto = $codProduto AND trim(grade) = '$grade'";
		
		$resultEstGrade = pg_query ($conexao, $sqlEstGrade );
		
		$regEstGrade = pg_affected_rows($resultEstGrade);
		
		if ($regEstGrade > 0){
			//Soma o estoque total
			$sqlConsulta = 'SELECT codproduto, SUM(qntestoque) AS qntestoque FROM grades WHERE codproduto = '.$codProduto.' GROUP BY codproduto';
				
			$resultConsulta = pg_query ($conexao, $sqlConsulta );
			
			$linhas = pg_num_rows ($resultConsulta );
			
			$rs = pg_fetch_array($resultConsulta);
									
			$idProd = $rs['codproduto'];
			$qntestoque = $rs['qntestoque'];
			
			if ($linhas > 0) {
				//Atualiza estoque total
				$sqlAtualEst = 'UPDATE estoques SET qntestoque = '.$qntestoque.' WHERE codproduto  = '.$idProd;
						
				$resultAtualEst = pg_query ($conexao, $sqlAtualEst );
				
				$regAtualEst = pg_affected_rows($resultAtualEst);
				
				if ($regAtualEst > 0){
					
					//Gravar Kardex
					$dataKardex = date('Y-m-d');
					
					$sqlKardex = "insert into kardex (codmovimento,tipomovimento,codproduto,datakardex,qntmov,e_s,usuario,cancel,grade) values ('$codMovimento','$tipoMovimento','$codProduto','$dataKardex','$quantidade','$e_s','$codigoUsuario','false','$grade')";
					
					$resultKardex = pg_query($conexao, $sqlKardex);
					
					$regKardex = pg_affected_rows($resultKardex);
					
					if ($regKardex > 0){
						pg_query($conexao, "commit");
						pg_close($conexao);
						$estoqueMovimentado = true;
					} else {
						pg_query($conexao, "rollback");
						pg_close($conexao);						
					}
				} else {
					pg_query($conexao, "rollback");
					pg_close($conexao);
				}	
				
			} else {
				pg_query($conexao, "rollback");
				pg_close($conexao);
			}

		} else {
			pg_query($conexao, "rollback");
			pg_close($conexao);			
		}
		
	}

	return $estoqueMovimentado;
}

?>