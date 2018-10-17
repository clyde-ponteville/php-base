<?php 


echo date('l d F Y').", il est ".date('G\hi \e\t s')." secondes";

echo '<br>Le jour dans 10 jour est: '. date('l d F Y', strtotime('+10 day'));

echo '<br>'.date("l d F Y", strtotime('23 April 1994'));




?>