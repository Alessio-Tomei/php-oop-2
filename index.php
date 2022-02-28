<!-- 
Cinema multisala.
Dovrete essere in grado di gestire le sale, gli spettacoli e le specifiche del film con relativi attori.
Attenzione, esistono due tipi di sala, quella normale e quella con poltrone immersive, con l’unica aggiunta 
di dover tener traccia degli effetti speciali utilizzabili durante la proiezione 
(es: una sala potrebbe avere vibrazione, fumo, acqua, un’altra solo vibrazione).
-->


<?php
require_once __DIR__.'/classes/Movie.php';
require_once __DIR__.'/classes/Hall.php';
require_once __DIR__.'/classes/SpecialHall.php';
require_once __DIR__.'/classes/Show.php';




$film = new Movie('Tutti pazzi per Milan', 'commedia', '2022', 'it');
$sala = new Hall(1, 300, 0, true, false);
$sala4D = new SpecialHall(4, 15, 1, true, true, true, true, false);
$spettacolo = new Show (45, $sala4D->getinfo()[0], '20:00', '2022/02/30', $sala4D->getinfo()[1]);

$spettacolo->setReservation(3);

var_dump($film);
var_dump($sala);
var_dump($sala4D);
var_dump($spettacolo);
?>
