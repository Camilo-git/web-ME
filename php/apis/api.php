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

// agregamos el nombre del pokemon
echo "el nombre del pokemon es " . $valores["name"] . " " . $valores["name"];
echo "<br>";
// agregamos la imagen del pokemoncon mas tamaño
echo "<img src='" . $valores["sprites"]["other"]["official-artwork"]["front_default"] . "'>";
echo "<br>";
// agregamos el tipo del pokemon
echo "el tipo del pokemon es " . $valores["types"][0]["type"]["name"];
echo "<br>";
// agregamos el peso del pokemon
echo "el peso del pokemon es " . $valores["weight"];
echo "<br>";
// agregamos la altura del pokemon
echo "la altura del pokemon es " . $valores["height"];
echo "<br>";
// agregamos la habilidad del pokemon
echo "la habilidad del pokemon es " . $valores["abilities"][0]["ability"]["name"];
echo "<br>";
// agregamos el id del pokemon
echo "el id del pokemon es " . $valores["id"];
echo "<br>";

