<?php

$hostname = "localhost";
$bancodedados = "os";
$usuario = "root";
$senha = "@assai2019";
$ip = '10.3.63.254';

$url = 'http://'.$ip.'/os';

define('HOME', $url);
define('THEME', 'modulos');

define('INCLUDE_PATH', HOME.'/themes/'.THEME);
define('REQUIRE_PATH','themes/'.THEME);

$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'principal' : $getUrl);
$Url = explode('/', $setUrl);

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>