<?php
// Generamos un numero random y lo asignamos $random

$identificador =  rand(1, 50);

$dir_web = "https://pokeapi.co/api/v2/pokemon/$identificador/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $dir_web);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$respuesta = curl_exec($ch);
curl_close($ch);
$valores = json_decode($respuesta, TRUE);

echo "el nombre del pokemon es " . $valores["name"] . " " . $valores["name"];
