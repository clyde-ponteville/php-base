<?php
echo '<h2>Fonction le carré d\'un nombre</h2>';
function square($nbr) {
    return  "Le carré de ". $nbr." est : ". $nbr * $nbr;
}
echo square(8);


echo '<h2>Aire rectangle</h2>';
function airRect($longeur, $largeur) {
    return  "L'air du rectangle est : ".$longeur * $largeur. " cm²";
}
echo airRect(8, 2);

?>