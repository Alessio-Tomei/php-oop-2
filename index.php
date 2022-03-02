<!-- 
Cinema multisala.
Dovrete essere in grado di gestire le sale, gli spettacoli e le specifiche del film con relativi attori.
Attenzione, esistono due tipi di sala, quella normale e quella con poltrone immersive, con l’unica aggiunta 
di dover tener traccia degli effetti speciali utilizzabili durante la proiezione 
(es: una sala potrebbe avere vibrazione, fumo, acqua, un’altra solo vibrazione).
-->

<!-- 
1) Recupera l’elenco delle sale con relative informazioni, facendo particolare attenzione 
    alle informazioni aggiuntive per le sale immersive.
2) Recuperare la capienza totale del cinema considerando tutte le sale a disposizione.
3) Stabilito un giorno e un film, recuperare quante proiezioni totali di quel film ci saranno.
4) Stabilito un giorno, recupera l’orario di fine dell’ultimo spettacolo.
BONUS
5) gestire con logica un’eccezione try/catch in un punto qualsiasi del vostro codice.
6) Stabilito un film, una sala, un’ora di inizio e un numero di proiezioni, calcolare automaticamente 
    gli orari degli spettacoli, considerando che tra uno spettacolo e l’altro devono passare 15 min.
7) Stabilito un giorno, recuperare l’elenco dei film in proiezione con relativi attori, 
    i quali dovranno essere stampati con iniziale del nome e cognome “N. Cognome”. 
-->


<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once __DIR__.'/classes/Movie.php';
require_once __DIR__.'/classes/Hall.php';
require_once __DIR__.'/classes/SpecialHall.php';
require_once __DIR__.'/classes/Show.php';


$films = [
    new Movie('Tutti pazzi per Milan', 'commedia', 130, 'it'),
    new Movie('Massaronetor', 'azione', 150, 'it'),
    new Movie('Bernardini spaziale', 'commedia', 90, 'it'),
    new Movie('Il signore degli Osnago', 'fantasy', 185, 'it'),
];

$sale = [
    new Hall(1, 300, 0, false, false),
    new Hall(2, 350, 0, true, false),
    new Hall(3, 250, 0, true, false),
    new Hall(4, 400, 0, true, true),
    new SpecialHall(5, 50, 1, true, true, true, true, false),
    new SpecialHall(6, 30, 1, true, true, true, true, true),
];

$spettacoli = [
    new Show ($films[0], $sale[1], '20:00', '2022/03/10', $sale[1]->getInfo()[1]),
    new Show ($films[0], $sale[1], '22:00', '2022/03/10', $sale[1]->getInfo()[1]),
    new Show ($films[0], $sale[1], '20:00', '2022/03/20', $sale[1]->getInfo()[1]),
    new Show ($films[2], $sale[3], '20:00', '2022/03/20', $sale[3]->getInfo()[1]),
    new Show ($films[3], $sale[5], '20:00', '2022/03/20', $sale[5]->getInfo()[1]),
];

// var_dump($films);
// var_dump($sale);
// var_dump($spettacoli);

echo "milestone 1:";
foreach ($sale as $sala) {
    var_dump($sala);
}

echo "milestone 2:";

$sum1 = 0;
foreach ($sale as $sala) {
    $sum1 += $sala->getInfo()[1];
}
echo "<p>Posti totali: $sum1</P>";

echo "milestone 3:";

$qDay = '2022/03/10';
$qMovie = 'Tutti pazzi per Milan';
$sum2 = 0;
foreach ($spettacoli as $spettacolo) {
    if ($spettacolo->getInfo()[0]->getInfo()[0] == $qMovie && $spettacolo->getInfo()[3] == $qDay) {
        $sum2++;
    }
}
echo "<p>Proiezioni totali di $qMovie il $qDay: $sum2</P>";

echo "milestone 4:";

$lastShow = date_create_from_format('Y/m/d H:i', $qDay . '00:00');
foreach ($spettacoli as $spettacolo) {
    if ($spettacolo->getInfo()[3] == $qDay ) {
        $tempDate = date_create_from_format('Y/m/d H:i', $qDay . $spettacolo->getInfo()[2]);
        $tempDate->modify('+' . $spettacolo->getInfo()[0]->getInfo()[2] . ' minutes');
        if ($lastShow < $tempDate) {
            $lastShow = $tempDate;
        } 
    }
}
echo "<p>Orario ultimo spettacolo del $qDay: " . date_format($lastShow, 'Y/m/d H:i') . "</P>";

?>
