<?php
require_once('animal.php');
require_once('Frog.php');
require_once('Ape.php');

// Rilis 0
echo "--- Release 0 --- <br>";
$sheep = new Animal("shaun");

echo "Name : " . $sheep->name . "<br>"; // "shaun"
echo "legs : " . $sheep->legs . "<br>"; // 4
echo "cold blooded : " . $sheep->cold_blooded . "<br><br>"; // "no"

// Rilis 1
echo "--- Release 1 --- <br>";

$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "<br>";
echo "legs : " . $sungokong->legs . "<br>"; // 2
echo "cold blooded : " . $sungokong->cold_blooded . "<br>";
echo "Yell : ";
$sungokong->yell(); // "Auooo"

echo "<br>";

$kodok = new Frog("buduk");
echo "Name : " . $kodok->name . "<br>";
echo "legs : " . $kodok->legs . "<br>"; // 4
echo "cold blooded : " . $kodok->cold_blooded . "<br>";
echo "Jump : ";
$kodok->jump(); // "hop hop"

?>